<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\User;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'visible', 'rooms', 'beds', 'bathrooms', 'square_meters', 'address', 'latitude', 'longitude', 'slug', 'cover_img', 'user_id'];


    // SETTO LA RELAZIONE CON TABELLA USERS
    public function user() {
        return $this->belongsTo(User::class); 
    }


}
