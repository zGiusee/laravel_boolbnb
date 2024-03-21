<?php

namespace App\Http\Controllers\User;

use App\Models\Apartment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApartmentRequest $request)
    {
        //
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
    
            $src = asset('storage/' . $apartment->cover_image);
            $noImgSrc = asset('storage/uploads/img-placeholder.png');
    
    
            if($apartment->user_id != Auth::id()) {
              return redirect()->route('user.apartments.index')->with('not_authorized', "La pagina che stai tentando di visualizzare non esiste");
            }
    
            return view('user.apartments.edit', compact('apartment', 'src', 'noImgSrc'));

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
        $form_data = $request->all();

      if($form_data['title'] !== $apartment->title){
          $form_data['slug'] = CustomHelper::generateUniqueSlug($form_data['title'], new Apartment());
      }else{
          $form_data['slug'] = $apartment->slug;
      }

      

      if ($request->hasFile('cover_image')) {

        if($apartment->cover_image) {

          Storage::disk('public')->delete($apartment->cover_image);

        }

        $form_data = CustomHelper::saveImage('cover_image', $request, $form_data, new Apartment());

      }


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
