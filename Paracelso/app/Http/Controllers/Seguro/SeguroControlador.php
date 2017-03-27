<?php

namespace App\Http\Controllers\Seguro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Seguro;

class SeguroControlador extends Controller
{
     protected function ObtenerSeguros(Request $request)
    {	$seguros=Seguro::where('tipo_seguro','=',$request->tipo_seguro)
                    ->orderBy('nombre', 'asc')
                    ->get();

         return view('Seguro.lstseguros',['seguros'=>$seguros]);
    }
}
