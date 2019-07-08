<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model 
{

    public $timestamps = false;
    protected $table = 'Users';
    protected $fillable = ['idUser','namaUser','email','password', 'auth_token'];

}
