@extends('layouts.principal')

@section('title','MENU DE TRABAJO')

@section('content')

	<div class="container">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Persona</h4>				
			</div>
			<div class="panel-body">
				<h6>Nombre: {{ $persona->nombre }} {{ $persona->apellido_paterno }} {{ $persona->apellido_materno }}</h6>
				<h6>Documento: {{ $persona->documento_identidad }}</h6>
				<h6>Direccion: {{ $persona->direccion }}</h6>
				<h6>...</h6>
				<h6>Seguro: {{ $paciente->codigo_seguro }}</h6>
				<h6>Matricula: {{ $paciente->matricula_seguro }}</h6>
				<h6>Religion: {{ $paciente->religion }}</h6>
			</div>
		</div>

		<div class="col-md-6">
			<button class="btn btn-large btn-info">HISTORIA CLINICA</button>
		</div>
		<div class="col-md-6">
			<a href="{{ route('consulta.show',$paciente->id_paciente) }}"><button class="btn btn-large btn-info">CONSULTA</button></a>
		</div>
		<div class="col-md-6">
			<button class="btn btn-large btn-info">LABORATORIOS</button>
		</div>
		<div class="col-md-6">
			<button class="btn btn-large btn-info">GABINETES</button>
		</div>
		<div class="col-md-6">
			<button class="btn btn-large btn-info">QUIROFANO</button>
		</div>
		<div class="col-md-6">
			<button class="btn btn-large btn-info">OTROS</button>
		</div>
	</div>

@endsection