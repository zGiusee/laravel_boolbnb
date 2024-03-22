<?php

namespace App\Http\Controllers\User;

use App\Models\Apartment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sidebar_links = config('sidebar_links');

        return view('user.apartments.index', compact('sidebar_links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Ottiene i link per la barra laterale dal file di configurazione
        $sidebar_links = config('sidebar_links');

        return view('user.apartments.create', compact('sidebar_links'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApartmentRequest $request)
    {
        //Ottieni tutti i dati inviati dalla richiesta
        $form_data = $request->all();

        //Creazione di una nuova istanza del modello apartment
        $new_apartment = new Apartment();

        //Compilazione dell'istanza di Apartment con i dati del modulo
        $new_apartment->fill($form_data);

        // Definisco il client che faà la chiamata per recuperare longitudine e latitudine
        $httpClient = new \GuzzleHttp\Client(['verify' => false]);

        // Definisco la url per fare la chiamata API
        $url = 'https://api.tomtom.com/search/2/geocode/';

        // Definisco la query con l'indirizzo dato dall'utente
        $query = $new_apartment->address;

        // Aggiungo la key per la chiamata
        $key = '?key=GYNVgmRpr8c30c7h1MAQEOzsy73GA9Hz';

        // Definisco la variabile per il formato per la chiamata API
        $format = '.json';

        // Ora componiamo la richiesta GET
        $response = $httpClient->get($url . $query . $format . $key);

        // Ora recuperò l'array (json) e lo trasformo in array associativo
        $results = json_decode($response->getBody(), true);

        // Recupero l'array dei risultati
        $results = $results['results'][0];

        // Recupero dall'array latitudine e Longitudine
        $lat = $results['position']['lat'];
        $lon = $results['position']['lon'];

        // Applico i valori all'appartamento
        $new_apartment->latitude = $lat;
        $new_apartment->longitude = $lon;

        //Generazione slug per l'appartmento basato sul titolo fornito
        $slug = Str::slug($form_data['title'], '-');
        $new_apartment->slug = $slug;

        // Applico l'id dell'utente all'appartamento creato
        $new_apartment->user_id = Auth::user()->id;

        //Salvataggio dell'appartamento nel database
        $new_apartment->save();

        return redirect()->route('user.apartment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApartmentRequest  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        //
    }
}
