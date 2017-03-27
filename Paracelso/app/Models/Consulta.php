<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    //
    protected $table = 'consultas';
    protected $primaryKey = 'id_consulta';
    public $timestamps = false;

    protected $fillable = ['id_bitacora','id_paciente','id_medico','id_receptor','id_consultorio','codigo_institucion','tipo_consulta','motivo','historia','fecha_inicio','hora_inicio','hora_fin','estado'];

    public function paciente()
    {
    	return $this->belongsTo(Paciente::class);
    }

    public function medico()
    {
    	return $this->belongsTo(Medico::class);
    }

    public function evaluacion()
    {
    	return $this->hasOne(Evaluacion::class);
    }

    public function ordenGabinete()
    {
        return $this->hasOne(OrdenGabinete::class);
    }

    public function ordenLaboratorio()
    {
        return $this->hasOne(OrdenLaboratorio::class);
    }

    public function tratamiento()
    {
        return $this->hasOne(Tratamiento::class);
    }

    public function revisionConsulta()
    {
        return $this->hasOne(RevisionConsulta::class);
    }
}
