<?php

namespace App\Custom;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
       'name', 'email', 'password', 'remember_token'
    ];
}
