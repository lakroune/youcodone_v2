<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Parental\HasParent;

class Restaurateur extends User
{
    use HasParent, HasFactory, Notifiable;
    protected $childColumnValue = 'restaurateur';
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'avatar',
    ];

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}
