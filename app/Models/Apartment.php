<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'visible', 'rooms', 'beds', 'bathrooms', 'square_meters', 'address', 'latitude', 'longitude', 'slug', 'cover_img',];

    // SETTO LA RELAZIONE CON TABELLA USERS
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
