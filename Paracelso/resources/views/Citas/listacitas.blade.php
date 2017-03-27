@extends ('layouts.principal')

@section('title','Calendario de Citas')

@section('content')
	<div class="container">
		<h3>Fecha : {{ $fecha-> formatLocalized('%A %d %B %Y') }}</h3>	
	</div>
	
	{{-- <h3>Hora : {{ $fecha->format('h:i:s') }}</h3> --}}

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Agenda de Citas</h4>
			<p class="navbar-text navbar-right" style="margin-top: -35px;"><button class="btn btn-info navbar-btn" type="button" style="margin-top: 1px; margin-bottom: 1px; margin-right: 8px; padding: 5px 5px;" onclick="document.location.href='{{ route('persona.index') }}'">Registrar Nueva Cita</button></p>


			{!! Form::open(['route'=>'cita\search','method'=>'GET']) !!}
				<div class="form-group">
					<div class="input-group">
						<input type="datetime" class="form-control" name="fecha" value="" placeholder="dd-mm-aaaa">
						<span class="input-group-btn"><button type="submit" class="btn btn-info">Buscar</button></span>
					</div>		
				</div>
			{!! Form::close() !!}
			
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-condensed">
				<thead>
					<th>Hora</th>
					<th>Nombre</th>
					<th>Paterno</th>
					{{-- <th>Id Persona</th> --}}
					<th>Motivo</th>
					{{-- <th>Id Medico</th> --}}
					<th>Medico</th>
					<th>Medico</th>
				</thead>
				<tbody>
					@foreach($citas as $cita)
					<tr>
						<td>{{ $cita-> hora}}</td>
						<td>{{ $cita-> nombre}}</td>
						<td>{{ $cita-> apellido_paterno}}</td>
						{{-- <td>{{ $cita-> id_persona}}</td> --}}
						<td>{{ $cita-> motivo}}</td>
						{{-- <td>{{ $cita-> id_medico }}</td> --}}
						<td> {{ $cita->nombrem }}</td>
						<td> {{ $cita->apellidom }}</td>
						<td><a href="{{ route('cita.edit',$cita->id_cita) }}"> [Editar] </a></td>
						<td><a href="{{ route('menu.show',$cita->id_persona) }}"> [Seleccionar] </a></td>
						{{-- <td><a href="{{ route('persona.show',$persona->id_persona) }}"> [Trabajar] </a></td>
						<td><a href="{{ route('medico.show',$persona->id_persona) }}"> [Crear Medico] </a></td>
						<td><a href="{{ route('paciente.show',$persona->id_persona) }}"> [Crear Paciente]</a></td> --}}
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection