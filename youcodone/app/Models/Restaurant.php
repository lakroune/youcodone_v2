<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';

    protected $fillable = [
        'nom_restaurant',
        'adresse_restaurant',
        'telephone_restaurant',
        'description_restaurant',
        'capacite_restaurant',
        'type_cuisine_id',
        'user_id',
    ];
    public function horaires()
    {
        return $this->hasMany(Horaire::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function typeCuisine()
    {
        return $this->belongsTo(TypeCuisine::class);
    }

    

    public function restaurateur()
    {
        // return $this->belongsTo(User::class, 'user_id');
        return $this->belongsTo(User::class);
    }
}
