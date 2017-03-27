<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    protected $table = 'paracelso.historias_clinicas';
    protected $primaryKey='id_historia';
    public $timestamps = false;
}
