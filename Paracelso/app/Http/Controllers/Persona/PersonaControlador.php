<?php

namespace App\Http\Controllers\Persona;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\PersonaImagen;
use App\Models\Paciente;
use App\Http\Controllers\Administracion\BitacoraControlador;
use App\Repositories\DominioRepository;
use App\Repositories\PersonaRepository;
use Image;
use Input;
use Response;
use DB;
class PersonaControlador extends Controller
{   
    private $bitacora;
    protected $dominios;
    public function __construct(DominioRepository $dominios, PersonaRepository $personas)
    {
        //$this->bitacora=$bitacora->generar_bitacora(100);
        $this->middleware('auth');
        $this->dominios=$dominios;
        $this->personas=$personas;
    }

    protected function FormPersona()
    {   
         return view('Persona.frmpersona', [
            'dominios' => $this->dominios->RepDominio("TIPO DOCUMENTO"),
            'tipos_seguros' => $this->dominios->RepDominio("TIPO SEGURO"),
        ]);
    }
    protected function FormBusquedaPersona(Request $request,$codigo_transaccion)
    {   
         //echo $codigo_transaccion;
        return view('Persona.frmbusquedapersona',[
            'codigo_transaccion' => $codigo_transaccion,
        ]);
        
    }
    public function RegistrarImagen($request,$id_persona)
    {   
        $foto=$request->file('imagenpersona');
        //informacion basica
        $personaimagen= new PersonaImagen;
        
         if ($request->file("imagenpersona")->isValid())
            {   //REGISTRO DE BLOB CON LIBRERIAS
                /*$datofoto = Input::file('imagen');
                $data=Image::make($datofoto);
                Response::make($data->encode('jpeg'));
                $imagen->imagen=$data;*/
                
                //REGISTRO DE BLOB CON STANDARES DE PHP
                $datofoto=fopen($request->file("imagenpersona"), "r");
                $data= fread($datofoto,filesize($request->file("imagenpersona")));//$fotopersona;
                $personaimagen->id_persona=$id_persona;
                $personaimagen->imagen= pg_escape_bytea($data);
                $personaimagen->estado='AC';
                //este ultimo metodo trabaja mejor que el anterior debido a que esstandar asi tambien el tamaño de la imagen es el original
             }

        //$imagen->save();
        //$conexion=pg_connect("host=localhost port=5432 dbname=prueba user=postgres password=damian123");
        //pg_query($conexion,"INSERT INTO paracelso.personas_imagenes (id_persona,imagen,estado) VALUES ($id_persona,'{$personaimagen->imagen}','AC')");

        DB::insert('insert into paracelso.personas_imagenes (id_persona, imagen,estado) values (:id_persona, :imagen,:estado)', ['id_persona'=>$id_persona,'imagen'=>pg_escape_bytea($personaimagen->imagen),'estado'=>'AC']);
        echo "La extension foto es ".$foto->guessExtension()." el tamaño es ".$foto->getClientSize()." el nombre original es ".$foto->getClientOriginalName() ;        
    }
     public function RegistrarPersona(Request $request)
    {   $this->validate($request, [ 'nombre' => 'required|max:50',
                                    'ap_paterno' => 'required|max:50',
                                    'ap_materno' => 'required|max:50',
                                    'documento_identidad' => 'required|max:10',
                                    'tipo_documento' => 'required|max:4',
                                    'genero' => 'required|max:3',
        ]);
        
        //informacion basica
        $persona= new Persona;
        $bitacora=new BitacoraControlador;
        $persona->id_bitacora= $bitacora->generar_bitacora($request,100);
        $persona->codigo_institucion=$request->user()->codigo_institucion;
        $persona->documento_identidad=$request->documento_identidad;
        $persona->tipo_documento=$request->tipo_documento;
        $persona->nombre=strtoupper($request->nombre);
        $persona->ap_paterno=strtoupper($request->ap_paterno);
        $persona->ap_materno=strtoupper($request->ap_materno);
        $persona->fecha_nacimiento=strtoupper($request->fecha_nacimiento);
        $persona->sexo=strtoupper($request->genero);
        //informacion de contacto
        $persona->no_telefono=$request->no_telefono;
        $persona->no_celular=$request->no_celular;
        $persona->no_telefono_trabajo=$request->no_telefono_trabajo;
        $persona->email=$request->email;
        $persona->direccion=strtoupper($request->direccion);
        $persona->ciudad_residencia=strtoupper($request->ciudad_residencia);
        $persona->estado="AC";
        $persona->save();
        //informacion adicional
        if ($request->hasFile('imagenpersona')) 
        {
            //echo "fotopersona ".$fotopersona."<br> existeimagen ".$existeimagen;
            if ($request->file("imagenpersona")->isValid())
            {   //METODO CON LIBRERIAS EXTERNAS
                /*$foto = Input::file('imagenpersona');
                $data=Image::make($foto);
                Response::make($data->encode('jpeg'));
                $ImagenPersona=new PersonaImagen;
                $ImagenPersona->id_persona=$persona->id_persona;
                $ImagenPersona->imagen=pg_escape_bytea($data);//$data;
                $ImagenPersona->estado='AC';
                $ImagenPersona->save();*/
                
                //METODO CON LIBRERIAS STADAR DE PHP
                /*$foto = Input::file('imagenpersona');
                $datofoto=fopen($request->file("imagenpersona"), "r");
                $ImagenPersona=new PersonaImagen;
                $ImagenPersona->id_persona=$persona->id_persona;
                //$ImagenPersona->imagen= base64_encode(fread($datofoto, filesize($request->file("imagenpersona"))));//$fotopersona;
                //$data=base64_encode(file_get_contents($request->file("imagenpersona")));//$fotopersona;
                $data=base64_encode(file_get_contents($foto->getRealPath()));//$fotopersona;
                $ImagenPersona->imagen= $data;//$fotopersona;
                $ImagenPersona->estado='AC';
                $ImagenPersona->save();*/
                //echo "<br >El recurso de la imagen es : ".$request->file("imagenpersona")." el recurso temporal es ".$_FILES['imagenpersona']['tmp_name']." el id_persona es ".$persona->id_persona;
               $this->RegistrarImagen($request,$persona->id_persona);
            }
        }
        //datos de pago propio de paciente
        if(isset($request->religion))
        {$paciente= new Paciente;
        $paciente->id_persona= $persona->id_persona;
        $paciente->codigo_institucion=$request->user()->codigo_institucion;
        $paciente->codigo_seguro=strtoupper($request->codigo_seguro);
        $paciente->matricula_seguro=strtoupper($request->matricula_seguro);
        $paciente->religion=strtoupper($request->religion);
        $paciente->observaciones=strtoupper($request->observaciones);
        $paciente->estado="AC";
        $paciente->save();
        }
        //echo "los datos registrados son: ".strtoupper($request->nombre)." ".strtoupper($request->ap_paterno)." ".strtoupper($request->genero);
        
    }

    //este metodo se genero para utilizar Jquery con ajax
    protected function BuscarPersonas(Request $request)
    {   
        //$personas=Persona::BuscarPersonas($request->user()->codigo_institucion,$request->nombre,$request->ap_paterno,$request->ap_materno);
        $personas=$this->personas->BuscarPersonas($request->user()->codigo_institucion,$request->nombre,$request->ap_paterno,$request->ap_materno);
        return view('Persona.lstpersonas',['persona'=>$personas,'codigo_transaccion'=>$request->codigo_transaccion]);
        
    }
   
    protected function ObtenerDatoPersona(Request $request,$id_persona)
    {   
        $persona=Persona::where([   ['codigo_institucion', '=',$request->user()->codigo_institucion],
                                    ['id_persona', '=',$id_persona],
                                ])
                            ->orderBy('id_persona', 'asc')
                            ->get();

        $imagenpersona=PersonaImagen::where([ ['id_persona', '=',$id_persona],
                                ])
                    ->get();
        foreach ($persona as $datospersona) {
        # code...
            session(['id_persona' => $datospersona->id_persona]);
            session(['nombre_persona' => $datospersona->nombre." ".$datospersona->ap_paterno]);
            session(['fecha_nacimiento' => $datospersona->fecha_nacimiento]);
        }
        

        return view('Persona.lstdatospersona',['persona'=>$persona,'imagenpersona'=>$imagenpersona]);
        
    }
    
    protected function DesplegarImagenPersona(Request $request,$id_persona)
    {   
        /*$ImagenPersona=PersonaImagen::where([   ['id_persona', '=',$id_persona],
                                                    ])
                    ->orderBy('id_persona', 'asc')
                    ->get();*/
        $ImagenPersonas = PersonaImagen::findOrFail($id_persona); 
        $conexion=pg_connect("host=localhost port=5432 dbname=prueba user=postgres password=damian123");
        $resultado=pg_query($conexion,"SELECT * FROM paracelso.personas_imagenes WHERE id_persona=$id_persona");
        $foto = pg_fetch_result($resultado, 'imagen');
        //$foto=pg_unescape_bytea($ImagenPersona->imagen);
        //dd($ImagenPersona->imagen);
        /*foreach ($ImagenPersonas as $ImagenPersona) {
            $foto=pg_unescape_bytea($ImagenPersona->imagen);
        }*/
        //$response->header('Content-Type', 'image/jpeg');
        //$foto=pg_unescape_bytea($imagen);
        header('Content-type: image/jpeg');
        //print ($ImagenPersonas->imagen);        
        print (pg_unescape_bytea($foto));        
        
    }
    public function showPicture($id_persona)
    {
        $picture = PersonaImagen::findOrFail($id_persona);
        $pic = Image::make($picture->imagen);
        $response = Response::make($pic->encode('jpeg'));
        $response->header('Content-Type', 'image/jpeg');
        return $response;
        /*foreach ($picture as $picture) {
            $imagen=$picture->imagen;
        }
        $raw=pg_unescape_bytea($imagen);
        header('Content-type: image/jpeg');
        echo $raw;*/

    }
    protected function SeleccionarPersona($id_persona,$nombre,$ap_paterno,$fecha_nacimiento,$codigo_transaccion) //debe agregarse parametros como en el controlador de paciente
    {
        //$persona = $this->personas->RepPersonaId($id_persona);

        session(['id_persona' => $id_persona]);
        session(['nombre_persona' => $nombre.' '.$ap_paterno]);
        //session(['documento_identidad' => $documento_identidad]);
        session(['fecha_nacimiento' => $fecha_nacimiento]);
        //session(['codigo_transaccion' =>$codigo_transaccion]);
        
        switch ($codigo_transaccion) {
            case 'T005':
                return redirect()->route('cita.show',$id_persona);
            break;
        }


        //return view('prueba');
    }
    
}
