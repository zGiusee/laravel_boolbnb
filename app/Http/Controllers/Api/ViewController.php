<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'ip' => 'required',
            'date' => 'required',
            'apartment_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'succes' => false,
                'errors' => $validator->errors()
            ]);
        }

        // Condizione per non creare duplicati
        $existing_view = View::where('ip', $data['ip'])
            ->where('date', $data['date'])
            ->where('apartment_id', $data['apartment_id'])
            ->first();

        // Effettuo il controllo
        if (!$existing_view) {
            $new_view = new View();
            $new_view->fill($data);
            $new_view->save();

            return response()->json([
                'succes' => true
            ]);
        } else {
            return response()->json([
                'succes' => false
            ]);
        }
    }

    public function getIP()
    {
        $httpClient = new \GuzzleHttp\Client(['verify' => false]);

        // Ora componiamo la richiesta GET
        $response = $httpClient->get('https://ipinfo.io/json');

        // Ora recuperò l'array (json) e lo trasformo in array associativo
        $results = json_decode($response->getBody(), true);

        // Recupero l'array dei risultati
        $ip = $results['ip'];

        return response()->json([
            'succes' => true,
            'result' => $ip
        ]);
    }
}
