<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Parental\HasParent;

class Client extends User
{
    use HasParent;
    protected $filable = [
        'username',
        'email',
        'password',
        'type',
        'nom',
        'prenom',
        'phone',
    ];

    public function resturants()
    {
        return  $this->belongsToMany(Restaurant::class, 'favoris', 'user_id', 'restaurant_id')->withTimestamps();
    }
}
