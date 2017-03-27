@extends('layouts.principal')

@section('title','Crear Nueva Institucion')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Crear</h4>
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>'institucion.store','method'=>'POST']) !!}

				<div class="form-group">
					{!! Form::label('Codigo') !!}
					{!! Form::text('codigo_institucion',null,['id'=>'codigo_institucion','class'=>'form-control','placeholder'=>'Codigo']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Tipo') !!}
					{!! Form::text('tipo_institucion',null,['id'=>'tipo_institucion','class'=>'form-control','placeholder'=>'Tipo']) !!}
				</div>				

				<div class="form-group">
					{!! Form::label('Nombre') !!}
					{!! Form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'Nombre']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Descripcion') !!}
					{!! Form::text('descripcion',null,['id'=>'descripcion','class'=>'form-control','placeholder'=>'descripcion']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('Direccion') !!}
					{!! Form::text('direccion',null,['id'=>'direccion','class'=>'form-control','placeholder'=>'Direccion']) !!}
				</div>

				<div class="form-group">
					{!! Form::hidden('estado','AC',['id'=>'estado','class'=>'form-control','placeholder'=>'Estado']) !!}
				</div>

				{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-warning btn-sm m-t-10']) !!}
			{!! Form::close() !!}
		</div>
	</div>

@endsection