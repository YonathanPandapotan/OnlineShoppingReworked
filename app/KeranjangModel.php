<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;

class KeranjangModel extends Model 
{

    public $timestamps = false;
    protected $fillable = ['idBarang','idUser','jumlah'];
    protected $table = 'Keranjang';

}
