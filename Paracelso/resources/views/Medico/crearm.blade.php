@extends('layouts.principal')

@section('title','Crear Nuevo Medico')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Crear Medico</h4>
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>'medico.store','method'=>'POST']) !!}

				<div class="form-group">
					{!! Form::hidden('id_persona',$id_persona,['id'=>'id_persona','class'=>'form-control','placeholder'=>'Id_persona']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Especialidad') !!}
					{!! Form::select('codigo_especialidad',$especialidad,null,['id'=>'codigo_especialidad','class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Matricula MS') !!}
					{!! Form::text('matriculaMS',null,['id'=>'matriculaMS','class'=>'form-control','placeholder'=>'Matricula MS']) !!}
				</div>				

				<div class="form-group">
					{!! Form::label('Matricula CM') !!}
					{!! Form::text('matriculaCM',null,['id'=>'matriculaCM','class'=>'form-control','placeholder'=>'Matricula CM']) !!}
				</div>

				<div class="form-group">
					{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
				</div>

				{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-warning btn-sm m-t-10']) !!}
			{!! Form::close() !!}
		</div>
	</div>
@endsection