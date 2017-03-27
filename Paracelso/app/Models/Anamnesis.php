<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anamnesis extends Model
{
    protected $table = 'paracelso.anamnesis';
    protected $primaryKey='id_anamnesis';
    public $timestamps = false;
}
