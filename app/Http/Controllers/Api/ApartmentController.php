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

        if (empty($results)) {

            return response()->json([
                'succes' => false,
                'results' => 'The apartment address does not exist!',
            ]);
        }

        // Recupero dall'array latitudine e Longitudine
        $latitude = $results[0]['position']['lat'];
        $longitude = $results[0]['position']['lon'];

        return compact('latitude', 'longitude');
    }
    public function search($query)
    {

        // Recupero dall'array latitudine e Longitudine
        $coordinates = $this->getCoordinates($query);

        $radius = '20';
        // Query per recuperare gli appartamenti entro il raggio specificato
        $query = DB::table('apartments')
            ->select('*')
            ->selectRaw(
                '( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance',
                [$coordinates['latitude'], $coordinates['longitude'], $coordinates['latitude']]
            )
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->get();


        // $query = Apartment::where('beds', '=', '6')->get();

        $apartments = $query;

        return response()->json([
            'succes' => true,
            'results' => $apartments,
        ]);
    }
}
