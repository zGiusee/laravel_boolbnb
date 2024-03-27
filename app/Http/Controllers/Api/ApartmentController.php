<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{
    public function search($query)
    {
        // Definisco il client che farà la chiamata per recuperare longitudine e latitudine
        $httpClient = new \GuzzleHttp\Client(['verify' => false]);

        // Aggiungo la key per la chiamata
        $key = '?key=GYNVgmRpr8c30c7h1MAQEOzsy73GA9Hz';

        // Definisco la url per fare la chiamata API
        $searchApiUrl = 'https://api.tomtom.com/search/2/search/';

        // Definisco la variabile per il formato per la chiamata API
        $format = '.json';

        // Ora componiamo la richiesta GET
        $response = $httpClient->get($searchApiUrl . $query . $format . $key);

        // Ora recuperò l'array (json) e lo trasformo in array associativo
        $results = json_decode($response->getBody(), true);

        // Recupero l'array dei risultati
        $results = $results['results'];

        // && $results[0]['address']['freeformAddress'] == $query
        if (!empty($results)) {

            // Recupero dall'array latitudine e Longitudine
            $latitude = $results[0]['position']['lat'];
            $longitude = $results[0]['position']['lon'];

            $radius = '20';
            // Query per recuperare gli appartamenti entro il raggio specificato
            $query = DB::table('apartments')
                ->select('*')
                ->selectRaw(
                    '( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance',
                    [$latitude, $longitude, $latitude]
                )
                ->having('distance', '<', $radius)
                ->orderBy('distance')
                ->get();

            $apartments = $query;

            // // Definisco la url per fare la chiamata API
            // $nearbySearchApiUrl = 'https://api.tomtom.com/search/2/nearbySearch/';

            // // Definisco il limite che dovra ritornarmi
            // $limit = '&limit=100';

            // // Definisco la lingua
            // $language = '&language=it-IT';

            // // Definisco il raggio di ricerca
            // $radius = '&radius=5000';

            // // Ora componiamo la richiesta GET
            // $responseNearby = $httpClient->get($nearbySearchApiUrl . $format . $key . $lat . $lon . $limit . $radius . $language);

            // // Ora recuperò l'array (json) e lo trasformo in array associativo
            // $resultsNearby = json_decode($responseNearby->getBody(), true);

            // // Recupero l'array dei risultati
            // $resultsNearby = $resultsNearby['results'];

            // $apartments = [];


            // foreach ($resultsNearby as $elem) {
            //     $near_apartment = Apartment::where('address', 'LIKE', "%{$elem['address']['streetName']}%")->get();

            //     if (count($near_apartment) > 0) {

            //         $apartments[] = $near_apartment;
            //     }
            // }

            return response()->json([
                'succes' => true,
                'results' => $apartments,
            ]);
        } else {

            return response()->json([
                'succes' => false,
                'results' => 'The apartment address does not exist!',
            ]);
        }
    }
}
