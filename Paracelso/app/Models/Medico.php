<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'paracelso.medicos';
    protected $primaryKey='id_medico';
    public $timestamps = false;
    
	protected $fillable = ['id_persona','codigo_especialidad','matriculaMS','matriculaCM','estado'];

    public function persona()
    {
        //return $this->belongsTo('App\Models\Persona','id_persona','id_persona');//,'id_persona','id_persona'); //foreignkey primarykey de la tabla padre
		return $this->belongsTo(Persona::class);
    }
}
