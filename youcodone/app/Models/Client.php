<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends User
{
    protected $table = 'clients';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
