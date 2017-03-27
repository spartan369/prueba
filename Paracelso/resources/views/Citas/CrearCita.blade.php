@extends('layouts.paracelso')

@section('title','Crear Nueva Cita')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Crear Cita Para :</h4>	
			{{-- <h5><small>{{ session('id_persona') }}</small></h5> --}}
			<h2>{{ session('nombre_persona') }}</h2>
			{{-- <h5><small>{{ session('documento_identidad') }}</small></h5>
			<h5><small>{{ session('codigo_transaccion') }}</small></h5> --}}
			<div>@include('Persona.lstdatosbasicospersona')</div>		
		</div>		
	</div>

	<div class="panel-body">
		{!! Form::open(['route'=>'cita.store','method'=>'POST']) !!}

			<div class="form-group">
				{!! Form::hidden('id_persona',session('id_persona'),['id'=>'id_persona','class'=>'form-control','placeholder'=>'Id_persona']) !!}
			</div>

			<label class="form-group">Medico</label>
	        <div class="selectContainer">
	            <select class="form-control" id="id_medico" name="id_medico">
	            	@foreach ($medicos as $medico)
                        <option value="{{ $medico->id_medico}}">{{ $medico->nombre." ". $medico->ap_paterno." ".$medico->ap_materno}}</option>
                     @endforeach
	            </select>
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
                <label for="fecha" class="control-label">Fecha</label>
                <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="fecha" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" name="fecha" id="fecha" value="" /><br/>
            </div>

			<div class="form-group">
                <label for="hora" class="control-label">Hora</label>
                <div class="input-group date form_time" data-date="" data-date-format="hh:ii" data-link-field="hora" data-link-format="hh:ii">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                </div>
				<input type="hidden" name="hora" id="hora" value="" /><br/>
            </div>

			<div class="form-group">
				{!! Form::label('Estado de Cita') !!}
				{!! Form::select('estado_cita',$estadoCita,null,['id'=>'estado_cita','class'=>'form-control']) !!}
			</div>

			
			{!! Form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-warning btn-sm m-t-10']) !!}
		{!! Form::close() !!}
	</div>

@endsection