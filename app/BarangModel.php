<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model 
{

    public $timestamps = false;
    protected $table = 'Barang';

}
