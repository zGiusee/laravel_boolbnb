<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{
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
