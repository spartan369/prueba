<?php

namespace App\Http\Controllers\Cita;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use App\Models\Persona;
use App\Models\Medico;
use App\Models\Cita;

use App\Http\Controllers\Aplicacion\BitacoraControlador;

use Carbon\Carbon;

use App\Repositories\DominioRepository;
use App\Repositories\PersonaRepository;
use App\Repositories\CitaRepository;

class CitasControlador extends Controller
{
    protected $dominios;
    protected $personas;
    protected $citas;

    public function __construct(DominioRepository $dominios, PersonaRepository $personas, CitaRepository $citas)
    {
        $this->dominios = $dominios;
        $this->personas = $personas;
        $this->citas = $citas;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fechaA = Carbon::now()->format('Y-m-d');
        $medicos = $this->personas->RepMedico(Auth()->user()->codigo_institucion);
        //$citas = $this->citas->RepCitaB(Auth()->user()->codigo_institucion);
        return view('Citas.buscarCita',['citas'=>$this->citas->RepCitaB(Auth()->user()->codigo_institucion,'','',''),'fecha'=>$fechaA,'medicos'=>$medicos]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //DESDE AQUI ENVIO EL EL CODIGO DE TRANSACCION AL INDEX DE PERSONA...
        $codigo_transaccion="T005"; //esto es crear cita nueva...
        
        return redirect()->route('persona.show',[$codigo_transaccion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $bitacora = new BitacoraControlador;
        $idbitacora = $bitacora->store($request,'T005'); 
        $request->merge([ 'id_bitacora' => $idbitacora ]);
        Cita::create($request->all());
        return redirect()->route('cita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $medicos = $this->personas->RepMedico(Auth()->user()->codigo_institucion);

        $estadoCita = $this->dominios->RepDominio('TIPO ESTADO CITA');

        //$persona = Persona::FindOrFail($id);
        return view('citas.CrearCita',['medicos'=>$medicos,'estadoCita'=>$estadoCita]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cita = Cita::FindOrFail($id);
        $persona = Persona::FindOrFail($cita->id_persona);
        $medico = Medico::Find($cita->id_medico)
            ->select('medico.id_medico','medico.codigo_especialidad','personas.nombre','personas.apellido_paterno')
            ->join('personas','personas.id_persona','=','medico.id_persona')
            ->first();

        return view('citas.editarcita',['cita'=>$cita,'persona'=>$persona,'medico'=>$medico]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cita=Cita::FindOrFail($id);
        $datos = $request->all();
        $cita->fill($datos)->save();

        return redirect()->route('cita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //ruta nueva
    public function search(Request $request)
    {
        $fechab = trim($request->get('fecha'));
        $fechaactual = Carbon::createFromFormat('d-m-Y',$fechab);
        $fecha = $fechaactual->toDateString(); 
        
        $agendacitas = $this->citas->RepCita(Auth()->user()->codigo_institucion,$fecha);

        return view('citas.listacitas',['fecha'=>$fechaactual,'citas'=>$agendacitas]);
        
    }

}
