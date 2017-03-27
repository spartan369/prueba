<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoPatologico extends Model
{
    protected $table = 'paracelso.no_patologicos';
    protected $primaryKey='id_no_patologico';
    public $timestamps = false;
}
