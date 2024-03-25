<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:apartments|max:100',
            'rooms' => 'required|numeric|integer',
            'beds' => 'required|numeric|integer',
            'bathrooms' => 'required|numeric|integer',
            'square_meters' => 'required|max:15',
            'address' => 'required|max:100',
            'cover_img' => 'image|mimes:jpg,png,jpeg|max:2048'
        ];
    }


    public function messages()
    {
        return [
            // TITLE
            'title.required' => 'Il titolo è obbligatorio!',
            'title.max' => 'Il titolo deve avere un massimo di 100 caratteri!',
            'title.unique' => 'Esiste già questo titolo. Il titolo deve essere unico!',

            // ROOMS
            'rooms.required' => 'Il numero di stanze è obbligatorio!',
            'rooms.numeric' => 'Le stanze devono essere un numero intero!',
            'rooms.integer' => 'Le stanze devono essere un numero intero!',

            // BEDS
            'beds.required' => 'Il numero di letti è obbligatorio!',
            'beds.numeric' => 'I letti devono essere un numero intero!',
            'beds.numeric' => 'I letti devono essere un numero intero!',

            // BATHROOMS
            'bathrooms.required' => 'Il numero dei bagni è obbligatorio!',
            'bathrooms.numeric' => 'I bagni devono essere un numero intero!',
            'bathrooms.integer' => 'I bagni devono essere un numero intero!',

            // SQUARE METERS
            'square_meters.required' => 'I metri quadrati sono obbligatori!',
            'square_meters.max' => 'I metri quadrati devono avere un massimo di 15 caratteri!',

            // ADDRESS
            'address.required' => 'L\'indirizzo è obbligatorio!',
            'address.max' => 'L\'indirizzo deve avere un massimo di 100 caratteri!',

            // COVER IMG
            'cover_img.required' => 'L\'immagine di copertina è obbligatoria!',
            'cover_img.image' => 'Il file caricato deve essere un\'immagine!',
            'cover_img.mimes' => 'L\'immagine di copertina deve essere in formato .jpg, .png o .jpeg!',
            'cover_img.max' => 'L\'immagine di copertina non può superare i 2048 kilobytes!'
        ];
    }
}
