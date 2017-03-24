<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagen extends Model
{
    //
    //modelo de lla tabla paracelso.personas_imagenes
    protected $table = 'imagen';
    protected $primaryKey='id';
    public $timestamps = false;
    //lo siguiente para que pueda registrarse con el metodo create de Eloquent
}
