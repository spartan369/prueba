<?php

namespace App\Http\Controllers\Paciente;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Administracion\BitacoraControlador;
use App\Repositories\DominioRepository;
use App\Repositories\PersonaRepository;
use App\models\Paciente;
use App\models\Persona;
use Illuminate\Database\Eloquent\Collection;

class PacienteControlador extends Controller
{   private $bitacora;
    protected $dominios;
    protected $personas;

    public function __construct(DominioRepository $dominios,PersonaRepository $personas)
    {
        
        $this->middleware('auth');
        $this->dominios=$dominios;
        $this->personas=$personas;
    }     

     protected function FormPaciente()
    {   
         return view('Personas.frmpersona', [
            'dominios' => $this->dominios->RepDominio("TIPO SEGURO"),
        ]);
    }

    protected function FormBusquedaPaciente(Request $request,$codigo_transaccion)
    {   
         return view('Paciente.buscarpaciente',[
            'codigo_transaccion' => $codigo_transaccion,
        ]);
        
    }

    public function RegistrarPaciente(Request $request)
    {	$this->validate($request, ['seguro' => 'required|max:10',
                                    'matricula' => 'required|max:50',
                                    'religion' => 'required|max:50',
                                    'observaciones' => 'required|max:50',
    	]);
        
    	$paciente= new Paciente;
        $paciente->id_persona= $request->id_persona;
    	$paciente->codigo_institucion=$request->user()->codigo_institucion;
    	$paciente->matricula_seguro=strtoupper($request->matricula);
    	$paciente->codigo_seguro=strtoupper($request->seguro);
    	$paciente->religion=strtoupper($request->religion);
    	$paciente->observaciones=strtoupper($request->observaciones);
    	$paciente->estado="AC";
    	$paciente->save();

	   	echo "Se ha registrado al Paciente";
    }


    protected function BuscarPacientes(Request $request)
    {   
        $personas=$this->personas->BuscarPersonas($request->user()->codigo_institucion,$request->nombre,$request->ap_paterno,$request->ap_materno);
        return view('Paciente.lstpacientes',['personas'=>$personas,'codigo_transaccion'=>$request->codigo_transaccion]);
        
    }
    
    protected function SeleccionarPaciente($id_paciente,$nombre,$ap_paterno,$fecha_nacimiento,$codigo_transaccion)
    {   
        session(['id_paciente' => $id_paciente]);
        session(['nombre_persona' => $nombre." ".$ap_paterno]);
        session(['fecha_nacimiento' => $fecha_nacimiento]);
          
         switch ($codigo_transaccion) {
            case '1000':
                return redirect()->action('Historia\HistoriaControlador@FormHistoria');
            break;
        }
        
    }

     protected function listaropciones()
    {   
         return view('Persona.Paciente.lstopcionpaciente',[
            'id_persona' => 3,
        ]);
    }
}
