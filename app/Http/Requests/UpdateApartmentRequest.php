<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApartmentRequest extends FormRequest
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
            'title' => 'required|max:100',
            'visible' => 'required',
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
            'title.required' => 'The title is required!',
            'title.max' => 'The title must be a maximum of 100 characters!',

            // VISIBILITY
            'visible.required' => 'Visibility is required!',

            // ROOMS
            'rooms.required' => 'The number of rooms is required!',
            'rooms.numeric' => 'Rooms must be a whole number!',
            'rooms.integer' => 'Rooms must be a whole number!',

            // BEDS
            'beds.required' => 'The number of beds is required!',
            'beds.numeric' => 'Beds must be a whole number!',
            'beds.numeric' => 'Beds must be a whole number!',

            // BATHROOMS
            'bathrooms.required' => 'The number of bathrooms is required!',
            'bathrooms.numeric' => 'Bathrooms must be a whole number!',
            'bathrooms.integer' => 'Bathrooms must be a whole number!',

            // SQUARE METERS
            'square_meters.required' => 'Square meters are required!',
            'square_meters.max' => 'Square meters must be a maximum of 15 characters!',

            // ADDRESS
            'address.required' => 'The address is required!',
            'address.max' => 'The address must be a maximum of 100 characters!',

            // COVER IMG
            'cover_img.required' => 'The cover image is required!',
            'cover_img.image' => 'The uploaded file must be an image!',
            'cover_img.mimes' => 'The cover image must be in .jpg, .png, or .jpeg format!',
            'cover_img.max' => 'The cover image cannot exceed 2048 kilobytes!',

        ];
    }
}
