<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name','password',
    ];

    protected $hidden = [
        'password',
    ];
}
