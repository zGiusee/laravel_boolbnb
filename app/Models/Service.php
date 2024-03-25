<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // SETTO LA RELAZIONE CON LA TABELLA APARTMENTS
    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }
}
