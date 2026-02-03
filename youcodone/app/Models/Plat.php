<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    protected $table = 'plats';
    protected $fillable = [
        'name',
        'price',
        'categorie_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(Menu::class);
    }
}
