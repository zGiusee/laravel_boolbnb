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

    // SETTO LA RELAZIONE CON LA TABELLA IMAGES
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    // SETTO LA RELAZIONE CON LA TABELLA MESSAGES
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    // SETTO LA RELAZIONE CON LA TABELLA VIEWS
    public function views()
    {
        return $this->hasMany(View::class);
    }

    // SETTO LA RELAZIONE CON LA TABELLA SERVICE
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    // SETTO LA RELAZIONE CON LA TABELLA SUBSCRIPTION
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
