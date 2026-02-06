<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parental\HasParent;

class UserBanned extends User
{
    use HasParent, HasFactory;
    protected $childColumnValue = 'userbanned';
}
