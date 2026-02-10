<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

   protected $fillable = [
        'date_reservation',
        'heure_reservation',
        'statut',
        'user_id',
        'restaurant_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
