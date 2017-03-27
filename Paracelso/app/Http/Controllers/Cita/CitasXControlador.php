<?php

namespace App\Http\Controllers\Acciones;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CitaRepository;

use Carbon\Carbon;

class CitasXControlador extends Controller
{
    protected $citas;

    public function __construct(CitaRepository $citas)
    {
        $this->citas = $citas;
    }
    //

    protected function BuscarC(Request $request)
    {
        $citas = $this->citas->RepCitaB($request->user()->codigo_institucion,$request->fechaE,$request->horaE,$request->medico);

        return view('Citas.ListarCitas',['citas'=>$citas,'fecha'=>$request->fechaE]);
    }
}
