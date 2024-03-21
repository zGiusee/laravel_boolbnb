<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'visible',
        'rooms',
        'beds',
        'address',
        'latitude',
        'longitude',
        'bathrooms',
        'square_meters',
        'cover_img',
        'slug',
    ];
}
