<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    //
    protected $table = 'bitacoras';
    public $timestamps = false;
    //protected $fillable = ['ap_paterno', 'ap_materno', 'password'];
    protected $primaryKey='id_bitacora';
}
