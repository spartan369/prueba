<?php

namespace App\Http\Controllers\Acciones;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\Medico;
use App\Models\Cita;
use App\Models\Paciente;

class MenuControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$id es el id_persona
        $persona = Persona::FindOrFail($id);

        $esPaciente = Paciente::where('id_persona','=',$id)->count();

        if($esPaciente > 0)
        {
            $paciente = Paciente::where('id_persona','=',$id)->first();

            return view('menu.menuTrabajo',['persona'=>$persona,'paciente'=>$paciente]);
        }
        else
        {
            //SI NO ES PACIENTE...
            //return redirect()->route('paciente.index'); //LLEVARIA AL LISTADO DE PACIENTES
            return redirect()->route('paciente.show',$id); //O... LLEVARIA AL FORMULARIO PARA CREAR PACIENTE
        }
        
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
        $persona = Persona::Find($id);

        return view('menu.usarpersona',['persona'=>$persona]);
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
}
