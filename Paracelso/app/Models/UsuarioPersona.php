<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioPersona extends Model
{
    //
    protected $table = 'usuarios_personas';
    protected $primaryKey = 'id_usuariopersona';
    public $timestamps = false;

    protected $fillable = ['id_usuario','id_persona','estado'];

    public function persona()
    {
    	return $this -> hasOne(Persona::class,'id_persona','id_persona');
    }

    public function usuario()
    {
    	return $this -> hasOne(User::class);
    }

}
