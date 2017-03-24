<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\imagen;
//use DB;
use Response;
use Image;
use Input;
use DB;

class ImagenABMController extends Controller
{
    //
    public function RegistrarImagen(Request $request)
    {   
		$foto=$request->file('imagen');
    	echo "La extension foto es ".$foto->guessExtension()." el tamaño es ".$foto->getClientSize()." el nombre original es ".$foto->
getClientOriginalName() ;
        //informacion basica
        $imagen= new imagen;
        
         if ($request->file("imagen")->isValid())
            {   //REGISTRO DE BLOB CON LIBRERIAS
                /*$datofoto = Input::file('imagen');
                $data=Image::make($datofoto);
                Response::make($data->encode('jpeg'));
                $imagen->imagen=$data;*/
                //REGISTRO DE BLOB CON STANDARES DE PHP
                $datofoto=fopen($request->file("imagen"), "r");
                $data= fread($datofoto,filesize($request->file("imagen")));//$fotopersona;
                $imagen->imagen= pg_escape_bytea($data);
                //este ultimo metodo trabaja mejor que el anterior debido a que esstandar asi tambien el tamaño de la imagen es el original
             }

        $imagen->save();
        
    }
    protected function DesplegarImagen(Request $request,$id)
    {   
        $picture = imagen::findOrFail($id);
        $pic = Image::make($picture->pic);
        $response = Response::make($pic->encode('jpeg'));

        //setting content-type
        $response->header('Content-Type', 'image/jpeg');

        return $response;
        
    }
}
