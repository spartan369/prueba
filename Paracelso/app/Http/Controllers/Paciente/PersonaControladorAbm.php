<?php

namespace App\Http\Controllers\Personas;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use App\Models\Persona;

use App\Http\Controllers\Aplicacion\BitacoraControlador;

use App\Repositories\PersonaRepository;

class PersonaControlador extends Controller
{
    protected $personas;

    public function __construct(PersonaRepository $personas)
    {
        $this->personas = $personas;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('personas.crearp');
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
        $idbitacora = $bitacora->store($request,'T001'); //T001 -> registro de persona
        $request->merge([ 'id_bitacora' => $idbitacora ]);
        $request->merge(['codigo_institucion' => Auth()->user()->codigo_institucion]);
        Persona::create($request->all());
        return redirect()->route('persona.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo_transaccion)
    {
        return view('personasX.BuscarPersonas',['codigo'=>$codigo_transaccion]);
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
        $persona = Persona::FindOrFail($id);

        return view('personas.editarp')->with('persona',$persona);
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
        $persona = Persona::FindOrFail($id);
        $datos = $request->all();
        $persona->fill($datos)->save();

        return redirect()->route('persona.index');
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
        //INACTIVA POR EL MOMENTO

        // $Personas = Persona::select('id_persona','nombre','apellido_paterno','apellido_materno','documento_identidad','direccion','estado')
        // ->where('nombre','like','%'.$request->nombre.'%')
        // ->where('codigo_institucion','=',Auth()->user()->codigo_institucion)
        // ->get();
        // return view('personas.listarp')->with('Personas',$Personas);
    }
}
