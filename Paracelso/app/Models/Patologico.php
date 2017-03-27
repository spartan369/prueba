<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patologico extends Model
{
    protected $table = 'paracelso.patologicos';
    protected $primaryKey='id_patologico';
    public $timestamps = false;
}
