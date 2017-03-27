@extends('layouts.principal')

@section('title','Editar Cita')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Editar Cita</h4>
			
			{{-- @include('citas.buscarPC') --}}
			
		</div>
		
	</div>

	<div class="container">
		<h4>{{ $persona-> id_persona}}</h4>
		<h4>{{ $persona-> nombre}}</h4>
		<h4>{{ $persona-> apellido_paterno}}</h4>
		<h4>{{ $persona-> apellido_materno}}</h4>
	</div>

	<div class="panel-body">
		{!! Form::model($cita,['route'=>['cita.update',$cita->id_cita],'method'=>'PUT']) !!}

			<div class="form-group">
				{!! Form::label('Medico - (falta afinar el combobox!)') !!}
				{!! Form::text('id_medico',null,['id'=>'id_medico','class'=>'form-control','value'=>$cita->id_medico]) !!}
			</div>

			<div class="form-group">
				{!! Form::label('Consultorio') !!}
				{!! Form::text('id_consultorio',null,['id'=>'id_consultorio','class'=>'form-control','placeholder'=>'Consultorio']) !!}
			</div>				

			<div class="form-group">
				{!! Form::label('Motivo') !!}
				{!! Form::text('motivo',null,['id'=>'motivo','class'=>'form-control','placeholder'=>'Motivo']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('Fecha') !!}
				{!! Form::text('fecha',null,['id'=>'fecha','class'=>'form-control','placeholder'=>'Fecha']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('Hora') !!}
				{!! Form::text('hora',null,['id'=>'hora','class'=>'form-control','placeholder'=>'Hora']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('Estado de la cita') !!}
				{!! Form::text('estado_cita',null,['id'=>'estado_cita','class'=>'form-control','placeholder'=>'Estado de la cita']) !!}
			</div>

			
			{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-warning btn-sm m-t-10']) !!}
		{!! Form::close() !!}
	</div>

@endsection