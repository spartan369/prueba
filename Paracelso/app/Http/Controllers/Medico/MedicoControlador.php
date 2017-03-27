<?php

namespace App\Http\Controllers\Personas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\Medico;
use App\Models\Dominios;
use App\Repositories\DominioRepository;

class MedicoControlador extends Controller
{
    protected $dominios;

    public function __construct(DominioRepository $dominios)
    {
        $this->dominios=$dominios;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medicos = Medico::select('medico.id_medico','medico.codigo_especialidad','medico.matriculaMS','medico.matriculaCM','personas.nombre','personas.apellido_paterno','personas.apellido_materno')
        ->join('personas','personas.id_persona','=','medico.id_persona')
        ->where('codigo_institucion','=',Auth()->user()->codigo_institucion)
        ->get();

        return view('medico.listarm')->with('medicos',$medicos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // NO funciono el codigo....
        
        //$especialidad = Dominios::where('nombre','=','TIPO ESPECIALIDAD')->lists('descripcion','codigo_dominio')->prepend('Seleccione la especialidad');
        
        //return view('medico.crearm',array('id_persona'=>$id_persona,'especialidad'=>$especialidad));
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
        Medico::create($request->all());
        return redirect()->route('medico.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_persona)
    {
        //
        $especialidad = $this->dominios->RepDominio('TIPO ESPECIALIDAD');
        
        return view('medico.crearm',array('id_persona'=>$id_persona,'especialidad'=>$especialidad));
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

    //Rutas nuevas
    public function search(Request $request)
    {
        $Personas = Persona::where('nombre','like','%'.$request->nombre.'%')->get();
        return view('personas.listarp')->with('Personas',$Personas);
    }
}
