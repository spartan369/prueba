<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dominio;

class DominioControlador extends Controller
{
    //
    protected function ObtenerDominio( )
    {	$dominio=Dominio::all();
        foreach ($dominio as $dominio) {
        	# code...
        	echo $dominio->codigo_dominio."-".$dominio->descripcion."<br>";
        	//return $dominio;
        }
        
    }

	protected function ObtenerDominio2( )
    {	$dominio=Dominio::all();
        foreach ($dominio as $dominio) {
        	# code...
        	echo $dominio->codigo_dominio."-".$dominio->descripcion."<br>";
        	//return $dominio;
        }
        
    }

}
