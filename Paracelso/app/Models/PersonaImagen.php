<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonaImagen extends Model
{
    //modelo de lla tabla paracelso.personas_imagenes
    protected $table = 'paracelso.personas_imagenes';
    protected $primaryKey='id_persona';
    public $timestamps = false;
    //lo siguiente para que pueda registrarse con el metodo create de Eloquent
}
