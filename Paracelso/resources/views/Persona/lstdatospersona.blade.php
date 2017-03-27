@extends('layouts.paracelso')
@section('content')
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos Paciente</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
<div class="container-fluid titulo_general">
      <h6 id="titulo_principal">Datos Persona</h6>
 </div>
 <div class="container-fluid paciente_encontrado">
    @foreach ($persona as $persona)
        <center>{{ $persona->nombre." ".$persona->ap_paterno." ".$persona->ap_materno}}</center>
        <div class="panel-body">
                {{ csrf_field() }}
                                    
                    <label for="documento_identidad" class="col-sm-3 control-label">Documento Identidad</label>

                    <div class="col-sm-6">
                         {{ $persona->documento_identidad}}
                    </div>
                                
                    <label for="tipo_documento" class="col-sm-3 control-label">Tipo Documento</label>
                    <div class="col-sm-6">
                    	{{ $persona->tipo_documento}}
                    </div>
                
                    
                    <label for="telefono" class="col-sm-3 control-label">Telefono</label>
                    <div class="col-sm-6">
                        {{$persona->no_telefono}}
                    </div>
                
                    
                    <label for="celular" class="col-sm-3 control-label">Celular</label>
                    <div class="col-sm-6">
                        {{$persona->no_celular}}
                    </div>
                
                    
                    <label for="email" class="col-sm-3 control-label">email</label>
                    <div class="col-sm-6">
                    	{{$persona->email}}
                    </div>
                
                    
                    <label for="direccion" class="col-sm-3 control-label">Direccion</label>
                    <div class="col-sm-6">
                        {{$persona->direccion}}
                    </div>
                
                    @foreach ($imagenpersona as $imagenpersona)
                    <label for="imagen" class="col-sm-3 control-label">Imagen</label>
                    <div class="col-sm-6">
                        <img src="{{print($imagenpersona->imagen)}}" alt="foto">
                    </div>
                    @endforeach
         @endforeach 
        </div>
    </div>
</body>
</html>
 @endsection