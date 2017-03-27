
@extends('layouts.paracelso')
@section('content')
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <!-- Bootstrap Boilerplate... -->
    <div class="panel-heading">
                    <center>BUSQUEDA DE PACIENTES</center>
    </div>
    <div class="container-fluid titulo_general">
      <h6 id="titulo_principal">Busqueda de Pacientes</h6>
 </div>
    <div class="panel-body">
        <!-- Display Validation Errors -->
        <!--@include('commons.errors')-->

        <div class="container-fluid marco_trabajo">
        <!-- Formulario de Busqueda de Persona -->
        <form action="{{ url('buscarpersonas') }}" method="GET" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
            <input type="hidden" name="codigo_transaccion" value="{{ $codigo_transaccion }}" id="codigo_transaccion">    
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">    
                <label for="nombre" class="col-sm-3 control-label">Nombres</label>

                <div class="col-sm-6">
                    <input type="text" name="nombre" id="nombre" class="form-control" ><!--onkeydown="down()" onkeyup="up()"-->
                </div>
            </div>
            <div class="form-group">
                <label for="ap_paterno" class="col-sm-3 control-label">Apellido Paterno</label>
                <div class="col-sm-6">
                    <input type="text" name="ap_paterno" id="ap_paterno" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="ap_materno" class="col-sm-3 control-label">Apellido Materno</label>
                <div class="col-sm-6">
                    <input type="text" name="ap_materno" id="ap_materno" class="form-control">
                </div>
            </div>
            <!-- Buscar una Persona con Paciente-->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="button" class="btn btn-default" onclick="buscarpersonas('buscarpacientes')">
                        <i class="fa fa-plus"></i> Buscar Paciente
                    </button>
                </div>
            </div>
            <div class="form-group" id="resultadobusqueda">
                <!--RESULTADO DE LA BUSQUEDA lstpersonsa.blade.php --> 
            </div>
        </form>
        </div>
        <script type="text/javascript" src="{{asset('js/BusquedaPersona.js')}}"></script>
    </div>
@endsection