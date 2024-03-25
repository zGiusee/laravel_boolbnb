<?php

namespace App\Http\Controllers\User;

use App\Models\Apartment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use Illuminate\Support\Str;

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
        $apartment = new Apartment();

        //Compilazione dell'istanza di Apartment con i dati del modulo
        $apartment->fill($form_data);

        //Generazione slug per l'appartmento basato sul titolo fornito
        $slug = Str::slug($form_data['title'], '-');
        $apartment->slug = $slug;

        //Salvataggio dell'appartamento nel database
        $apartment->save();

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
        return view('user.apartments.show', compact('sidebar_links','apartment'));
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
