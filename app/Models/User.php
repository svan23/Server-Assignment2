<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
        'is_approved',
        'role'
    ];
}
