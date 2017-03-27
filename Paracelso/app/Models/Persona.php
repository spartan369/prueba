<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $table = 'paracelso.personas';
    protected $primaryKey='id_persona';
    public $timestamps = false;
    //lo siguiente para que pueda registrarse con el metodo create de Eloquent
    protected $fillable = ['nombre' ,'ap_paterno' ,'ap_materno' ,'fecha_nacimiento' ,'documento_identidad' ,
  							'tipo_documento' ,'sexo character' ,'email character' ,'no_telefono' ,'no_celular' ,
  							'direccion' ,'ciudad_residencia' ,'lugar_nacimiento' ,'estado'];
  	
	public function getNombreCompletoAttribute() //la llamada debe ser $persona->nombrecompleto (minusculas)
    {
        $nombreCompleto = $this->attributes['nombre'].' '.$this->attributes['apellido_paterno'].' '.$this->attributes['apellido_materno'];
        return $nombreCompleto;
    }
    public function medico()
    {
        //return $this->hasOne('App\Models\Medico','id_persona','id_persona');//,'id_persona'); //foreing key localkey
		return $this->hasOne(Medico::class,'id_persona','id_persona');
    }
	
	public function UsuarioPersona()
    {
        return $this -> belongsTo(UsuarioPersona::class);
    }
	
    public function paciente()
    {
        return $this->hasOne('App\Models\Paciente','id_persona','id_persona');//,'id_persona'); //foreing key localkey
		//return $this->hasOne(Paciente::class,'id_persona','id_persona');
    }
	public function cita()
    {
        return $this->hasMany(Cita::class,'id_persona','id_persona');
    }	

    //Lo siguiente podra ser utilizado posteriormente
    /*public function bitacora()
    {
        return $this->belongsTo(Bitacora::class);
    }*/

    protected function BuscarPersonas($codigo_institucion,$nombre,$ap_paterno,$ap_materno)
    {   
        $personas=$this->where([   ['codigo_institucion', '=',$codigo_institucion],
                                    ['nombre', 'like',"%".$nombre."%"],
                                    ['ap_paterno', 'like',"%".$ap_paterno."%"],
                                    ['ap_materno', 'like',"%".$ap_materno."%"]
                                ])
                    ->orderBy('id_persona', 'asc')
                    ->get();

        //return view('Persona.lstpersonas',['persona'=>$personas]);
        return $personas;
    }

}
