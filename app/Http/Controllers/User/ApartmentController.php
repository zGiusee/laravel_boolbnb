<?php

namespace App\Http\Controllers\User;

use App\Models\Apartment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $apartments = Apartment::where('user_id', $user->id)->get();
        $sidebar_links = config('sidebar_links');

        return view('user.apartments.index', compact('sidebar_links', 'apartments'));
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
        $sidebar_links = config('sidebar_links');

        //Ottieni tutti i dati inviati dalla richiesta
        $form_data = $request->all();

        if ($request->hasFile('cover_img')) {

            $cover_img = Storage::disk('public')->put('apartments_cover_images', $form_data['cover_img']);

            $form_data['cover_img'] = $cover_img;
        };

        //Creazione di una nuova istanza del modello apartment
        $new_apartment = new Apartment();

        //Compilazione dell'istanza di Apartment con i dati del modulo
        $new_apartment->fill($form_data);

        // Definisco il client che farà la chiamata per recuperare longitudine e latitudine
        $httpClient = new \GuzzleHttp\Client(['verify' => false]);

        // Definisco la url per fare la chiamata API
        $url = 'https://api.tomtom.com/search/2/search/';

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
        $results = $results['results'];

        // && $results[0]['address']['freeformAddress'] == $query
        if (!empty($results)) {

            // Recupero dall'array latitudine e Longitudine
            $lat = $results[0]['position']['lat'];
            $lon = $results[0]['position']['lon'];

            // Applico i valori all'appartamento
            $new_apartment->latitude = $lat;
            $new_apartment->longitude = $lon;
        } else {

            $error_message = 'The apartment address does not exist!';
            return redirect()->route('user.apartment.create')->with('error_message', $error_message);
        }

        // Controllo che request con chiave img contenga un file
        if ($request->hasFile('cover_img')) {

            // Recupero il path dell'immagine caricata dall'utente
            $cover_img = Storage::disk('public')->put('apartments_cover_images', $form_data['cover_img']);
            // Applico il valore della variabile all immagine
            $form_data['cover_img'] = $cover_img;
        };

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
        $sidebar_links = config('sidebar_links');
        return view('user.apartments.show', compact('sidebar_links', 'apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $sidebar_links = config('sidebar_links');

        if ($apartment->user_id != Auth::id()) {
            return redirect()->route('user.apartments.index')->with('not_authorized', "La pagina che stai tentando di visualizzare non esiste");
        }

        $error_message = '';

        return view('user.apartments.edit', compact('apartment', 'sidebar_links', 'error_message'));
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
        $sidebar_links = config('sidebar_links');

        $form_data = $request->all();


        //Verifico se esistono appartamenti nel database con lo stesso titolo
        $existingApartments = Apartment::where('title', 'LIKE', $form_data['title'])->where('id', '!=', $apartment->id)->exists();

        // Controllo che request con chiave img contenga un file
        if ($request->hasFile('cover_img')) {

            // Controllo che l'immagine sia diversa da 'null'
            if ($apartment->cover_img != null && Storage::disk('public')->exists($apartment->cover_img)) {

                // Se non è diversa da null procedo con la cancellazione dell'immagine
                Storage::disk('public')->delete($apartment->cover_img);
            }

            // Recupero il path dell'immagine caricata dall'utente
            $cover_img = Storage::disk('public')->put('apartments_cover_images', $form_data['cover_img']);
            // Applico il valore della variabile all immagine
            $form_data['cover_img'] = $cover_img;
        };

        //Se esistono appartamenti che soddisfano le condizioni, imposto messaggio di errore
        if ($existingApartments) {
            $error_message = 'The apartment title already exist!';

            return redirect()->route('user.apartment.edit', ['apartment' =>  $apartment->slug])->with('error_message', $error_message);
        }

        // Definisco il client che farà la chiamata per recuperare longitudine e latitudine
        $httpClient = new \GuzzleHttp\Client(['verify' => false]);

        // Definisco la url per fare la chiamata API
        $url = 'https://api.tomtom.com/search/2/search/';

        // Definisco la query con l'indirizzo dato dall'utente
        $query = $apartment->address;

        // Aggiungo la key per la chiamata
        $key = '?key=GYNVgmRpr8c30c7h1MAQEOzsy73GA9Hz';

        // Definisco la variabile per il formato per la chiamata API
        $format = '.json';

        // Ora componiamo la richiesta GET
        $response = $httpClient->get($url . $query . $format . $key);

        // Ora recuperò l'array (json) e lo trasformo in array associativo
        $results = json_decode($response->getBody(), true);

        // Recupero l'array dei risultati
        $results = $results['results'];

        // && $results[0]['address']['freeformAddress'] == $query
        if (!empty($results)) {

            // Recupero dall'array latitudine e Longitudine
            $lat = $results[0]['position']['lat'];
            $lon = $results[0]['position']['lon'];

            // Applico i valori all'appartamento
            $apartment->latitude = $lat;
            $apartment->longitude = $lon;
        } else {

            $error_message = 'The apartment address does not exist!';
            return redirect()->route('user.apartment.edit', ['apartment' =>  $apartment->slug])->with('error_message', $error_message);
        }


        //Generazione slug per l'appartmento basato sul titolo fornito
        $slug = Str::slug($form_data['title'], '-');
        $apartment->slug = $slug;

        $apartment->update($form_data);

        // Effettuo un redirect
        return redirect()->route('user.apartment.show', ['apartment' => $apartment->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        // Controllo che l'immagine sia diversa da 'null'
        if ($apartment->cover_img != null) {
            // Se non è diversa da null procedo con la cancellazione dell'immagine
            Storage::disk('public')->delete($apartment->cover_img);
        }

        $apartment->delete();

        return redirect()->route('user.apartment.index');
    }
}
