<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    //
    protected $table = 'evaluaciones';
    protected $primaryKey = 'id_evaluacion';
    public $timestamps = false;

    protected $fillable = ['id_consulta','id_bitacora','laboratorio','gabinete','estado'];

    public function consulta()
    {
    	return $this->belongsTo(Consulta::class);
    }

    public function diagnostico()
    {
    	return $this->hasMany(Diagnostico::class);
    }
}
