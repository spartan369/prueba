<?php

namespace App\Http\Controllers\Historia;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\HistoriaClinica;
use App\Models\Alergia;
use App\Http\Controllers\Administracion\BitacoraControlador;
use App\Repositories\PersonaRepository;

class HistoriaControlador extends Controller
{	protected $medicos;

	public function __construct(PersonaRepository $medicos)
    {
        //$this->bitacora=$bitacora->generar_bitacora(100);
        $this->middleware('auth');
        $this->medicos=$medicos;
    }
    protected function FormHistoria(Request $request)
    {   
         return view('Historia.frmhistoria', [
            'medicos' => $this->medicos->RepMedico($request->user()->codigo_institucion),
        ]);
    }

    public function RegistrarHistoria(Request $request)
    {   $this->validate($request, [ 'fecha' => 'required|max:15',
                                    'observacion' => 'required|max:500',
        ]);
        
        //informacion basica
        $historia= new HistoriaClinica;
        $bitacora= new BitacoraControlador;
        $historia->id_bitacora= $bitacora->generar_bitacora($request,200);
        $historia->id_medico=$request->id_medico;
        $historia->id_paciente=$request->session()->get('id_paciente');//$request->id_persona;
        $historia->codigo_institucion=$request->user()->codigo_institucion;
        $historia->fecha=$request->fecha;
        $historia->nota=$request->observacion;
        $historia->estado="AC";
        $historia->save();

        echo "Se aperturo la historia clinica satisfactoriamente puede agregar datos: ";
        
    }
    public function RegistrarAlergia(Request $request)
    {   $this->validate($request, [ 'nota' => 'required|max:500',
        ]);
        
        //informacion basica
        $alergia= new Alergia;
        $bitacora= new BitacoraControlador;
        $alergia->id_bitacora= $bitacora->generar_bitacora($request,200);
        $alergia->id_historia=$request->id_historia;
        $alergia->tipo_alergia=$request->tipo_alergia;//$request->id_persona;
        $alergia->nota=$request->nota;
        $alergia->estado="AC";
        $alergia->save();

        echo "Se agrego la Alergia";
        
    }
}
