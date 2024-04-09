<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{

    private function getCoordinates($query)
    {
        // Definisco il client che farà la chiamata per recuperare longitudine e latitudine
        $httpClient = new \GuzzleHttp\Client(['verify' => false]);

        // Aggiungo la key per la chiamata
        // $key = env('VITE_TOMTOM_APIKEY');
        $key = '?key=GYNVgmRpr8c30c7h1MAQEOzsy73GA9Hz';

        // Definisco la url per fare la chiamata API
        $searchApiUrl = 'https://api.tomtom.com/search/2/geocode/';

        // Definisco la variabile per il formato per la chiamata API
        $format = '.json';

        // Ora componiamo la richiesta GET
        $response = $httpClient->get($searchApiUrl . $query . $format . $key);

        // Ora recuperò l'array (json) e lo trasformo in array associativo
        $results = json_decode($response->getBody(), true);

        // Recupero l'array dei risultati
        $results = $results['results'];

        // Recupero dall'array latitudine e Longitudine
        $latitude = $results[0]['position']['lat'];
        $longitude = $results[0]['position']['lon'];

        return compact('latitude', 'longitude');
    }
    public function search(Request $request)
    {

        if ($request->has('query')) {

            $query = $request->query('query');
        }

        if ($request->has('radius')) {

            $radius = $request->query('radius');
        }

        // Recupero dall'array latitudine e Longitudine
        $coordinates = $this->getCoordinates($query);

        // Query per recuperare gli appartamenti entro il raggio specificato senza il get() per far si che si possano aggiungere filtri
        $query = DB::table('apartments')
            ->select('*')
            ->selectRaw(
                '( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance',
                [$coordinates['latitude'], $coordinates['longitude'], $coordinates['latitude']]
            )
            ->having('distance', '<', $radius)
            ->orderBy('distance');


        // Effettuo il controllo: se la richiesta contiene il parametro ? allora applico il filtro
        if ($request->has('beds')) {

            $beds = $request->query('beds');
            $query->where('beds', '>=', $beds);
        }

        // Effettuo il controllo: se la richiesta contiene il parametro ? allora applico il filtro
        if ($request->has('rooms')) {
            $rooms = $request->query('rooms');
            $query->where('rooms', '>=', $rooms);
        }

        // Effettuo il controllo: se la richiesta contiene il parametro ? allora applico il filtro
        if ($request->has('bathrooms')) {

            $bathrooms = $request->query('bathrooms');
            $query->where('bathrooms', '>=', $bathrooms);
        }

        // Effettuo il controllo: se la richiesta contiene il parametro ? allora applico il filtro
        if ($request->has('square_meters')) {

            $square_meters = $request->query('square_meters');
            $query->where('square_meters', '>=', $square_meters);
        }

        // Effettuo il controllo: se la richiesta contiene il parametro 'services' con gli ID dei servizi
        if ($request->has('services')) {
            $serviceIds = $request->query('services');

            // Splitta la stringa degli ID dei servizi in un array
            $serviceIdsArray = preg_split('/\s*,\s*|\s+/', $serviceIds);

            // Creo una sottoquery per recuperare gli ID degli appartamenti che hanno tutti i servizi richiesti
            $subQuery = DB::table('apartment_service')
                ->select('apartment_id')
                ->whereIn('service_id', $serviceIdsArray)
                ->groupBy('apartment_id')
                ->havingRaw('COUNT(DISTINCT service_id) = ?', [count($serviceIdsArray)]);

            // Applico la sottoquery alla query principale per filtrare gli appartamenti
            $query->whereIn('id', $subQuery);
        }

        // Applico il contenuto della query con i filtri usando anche il ->get() perché non è stato specificato prima
        $apartments = $query->where('visible', true)->paginate(12);

        return response()->json([
            'succes' => true,
            'results' => $apartments,
        ]);
    }
    public function index()
    {
        $apartments = Apartment::where('visible', true)->paginate(12);

        if (!empty($apartments)) {
            return response()->json([
                'success' => true,
                'results' => $apartments
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Error'
            ]);
        }
    }
    public function sponsorized()
    {
        $apartments = DB::table('apartments')
            ->select(
                'apartments.id',
                'apartments.user_id',
                'apartments.title',
                'apartments.visible',
                'apartments.rooms',
                'apartments.beds',
                'apartments.bathrooms',
                'apartments.address',
                'apartments.latitude',
                'apartments.longitude',
                'apartments.slug',
                'apartments.cover_img',
                'apartment_subscription.apartment_id',
                'apartment_subscription.subscription_id',
                'apartment_subscription.starting_time',
                'apartment_subscription.ending_time'
            )
            ->join('apartment_subscription', 'apartments.id', '=', 'apartment_subscription.apartment_id')
            ->join('subscriptions', 'subscriptions.id', '=', 'apartment_subscription.subscription_id')
            ->where('apartment_subscription.ending_time', '>', now())
            ->where('visible', true)
            ->paginate(12);


        if (!empty($apartments)) {
            return response()->json([
                'success' => true,
                'results' => $apartments
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Error'
            ]);
        }
    }
    public function show($slug)
    {
        // Cerca il progetto nel database utilizzando lo slug fornito come parametro
        $apartment = Apartment::with('services')->where('slug', $slug)->first();
        $user_id = $apartment['user_id'];
        $user = User::where('id', $user_id)
            ->select('users.name', 'users.surname')
            ->get();

        // Restituisce una risposta JSON con il progetto trovato (se presente) e una flag di successo impostata su true
        return response()->json([
            'success'   => true,
            'apartment' => $apartment,
            'user' => $user,
        ]);
    }
}
