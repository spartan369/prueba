@extends('layouts.principal')

@section('title','Detalle de la Cita')

@section('content')
	<div class="container">
		<h3>Detalle de la Cita</h3>
		<h5>Persona</h5>
		<p>Id Persona: {{ $persona->id_persona }}</p>
		<p>Nombre: {{ $persona->nombre }} {{ $persona->apellido_paterno }} {{ $persona->apellido_materno }}</p>
		<p>Documento: {{ $persona->documento_identidad }}</p>
		<p>Direccion: {{ $persona->direccion }}</p>
		<p>Institucion: {{ $persona->codigo_institucion }}</p>
		<p>...</p>
		<h5>Medico</h5>		
		<p>Medico: {{ $medico->id_medico }}</p>
		<p>Matricula: {{ $medico->nombre }} {{ $medico->apellido_paterno }}</p>
		<p>Especialidad: {{ $medico->codigo_especialidad }}</p>
		<p>...</p>
		<h5>Cita:</h5>
		<p>Motivo: {{ $cita->motivo }}</p>
		<p>Hora: {{ $cita->hora }}</p>
		<p>Estado: {{ $cita->estado_cita }}</p>

		<a href="{{ route('cita.index') }}"><button type="button" class="btn btn-info">Volver</button></a>
	</div>
@endsection