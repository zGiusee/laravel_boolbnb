<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{

    private function getCoordinates($query)
    {
        // Definisco il client che farà la chiamata per recuperare longitudine e latitudine
        $httpClient = new \GuzzleHttp\Client(['verify' => false]);

        // Aggiungo la key per la chiamata
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

        // if (empty($results) || $results == null) {

        //     return response()->json([
        //         'succes' => false,
        //         'results' => 'The apartment address does not exist!',
        //     ]);
        // }

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

        // Applico il contenuto della query con i filtri usando anche il ->get() perché non è stato specificato prima
        $apartments = $query->get();

        return response()->json([
            'succes' => true,
            'results' => $apartments,
        ]);
    }
    public function index()
    {
        $apartments = Apartment::paginate(12);


        if (!empty($apartments)) {
            return response()->json([
                'success' => true,
                'results' => $apartments
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => $apartments
            ]);
        }
    }
    public function show($slug)
    {
        // Cerca il progetto nel database utilizzando lo slug fornito come parametro
        $apartment = Apartment::with('services')->where('slug', $slug)->first();

        // Restituisce una risposta JSON con il progetto trovato (se presente) e una flag di successo impostata su true
        return response()->json([
            'success'   => true,
            'apartment' => $apartment
        ]);
    }
}
