<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiModel extends Model 
{

    public $timestamps = false;
    protected $table = 'DetailTransaksi';

}
