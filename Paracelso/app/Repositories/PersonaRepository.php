<?php

namespace App\Repositories;

use App\Models\Persona;
use App\Models\Medico;
use DB;
class PersonaRepository
{	
    public function RepMedico($codigo_institucion)
    {
        return DB::table('personas')
                            ->join('medicos', 'personas.id_persona', '=', 'medicos.id_persona')
                            ->select('personas.nombre', 'personas.ap_paterno','personas.ap_materno', 'medicos.id_medico')
                            ->where('medicos.codigo_institucion',$codigo_institucion)
                            ->get();

        /*return Medico::select('medico.id_medico','personas.nombre','personas.apellido_paterno','personas.apellido_materno')
        ->join('personas','personas.id_persona','=','medico.id_persona')
        ->where('personas.codigo_institucion','=',$codigo_institucion)
        ->get();*/
                    
        
    }
    public function BuscarPersonas($codigo_institucion,$nombre,$ap_paterno,$ap_materno)
    {   
        $personas=Persona::where([   ['codigo_institucion', '=',$codigo_institucion],
                                    ['nombre', 'like',"%".$nombre."%"],
                                    ['ap_paterno', 'like',"%".$ap_paterno."%"],
                                    ['ap_materno', 'like',"%".$ap_materno."%"]
                                ])
                    ->orderBy('id_persona', 'asc')
                    ->get();
        return $personas;
    }
}