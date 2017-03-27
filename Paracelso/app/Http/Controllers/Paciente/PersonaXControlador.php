<?php

namespace App\Http\Controllers\Personas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\PersonaRepository;

class PersonaXControlador extends Controller
{
	protected $personas;

    public function __construct(PersonaRepository $personas)
    {
        $this->personas = $personas;
    }
    //
    protected function BuscarP(Request $request)
    {
        $codigo=$request->codigo;
        $personas = $this->personas->RepPersonaB($request->user()->codigo_institucion,$request->nombre,$request->ap_paterno,$request->ap_materno);

        return view('personasX.ListarPersonas',['personas'=>$personas,'codigo'=>$codigo]);
    }

    protected function SeleccionarP($id_persona,$codigo_transaccion)
    {
        $persona = $this->personas->RepPersonaId($id_persona);

        session(['id_persona' => $persona->id_persona]);
        session(['nombre_persona' => $persona->nombre.' '.$persona->apellido_paterno]);
        session(['documento_identidad' => $persona->documento_identidad]);
        //session(['codigo_transaccion' =>$codigo_transaccion]);
        
        switch ($codigo_transaccion) {
            case 'T005':
                return redirect()->route('cita.show',$id_persona);
            break;
        }


        //return view('prueba');
    }
}
