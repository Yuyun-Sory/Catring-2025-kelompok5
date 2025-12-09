<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'users'; // pakai tabel users
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
    ];
}
