@extends('layouts.principal')

@section('title','Listar Medicos')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Medicos</h4>
			
			{{-- {!! Form::open(['route'=>'persona\search','method'=>'post','class'=>'form-inline']) !!}
				<div class="form-group">
					<label for="buscar">Buscar</label>
					<input type="text" class="form-control" name="nombre">
					<button type="submit" class="btn btn-info">Buscar</button>
				</div>
			{!! Form::close() !!} --}}

		</div>
		<div class="panel-body">
			<table class="table table-bordered table-condensed">
				<thead>
					<th>Nombre</th>
					<th>Paterno</th>
					<th>Materno</th>
					<th>Especialidad</th>
					<th>Matricula MS</th>
					<th>Matricula CM</th>
				</thead>
				<tbody>
					@foreach($medicos as $medico)
					<tr>
						<td>{{ $medico-> nombre}}</td>
						<td>{{ $medico-> apellido_paterno}}</td>
						<td>{{ $medico-> apellido_materno}}</td>
						<td>{{ $medico-> codigo_especialidad}}</td>
						<td>{{ $medico-> matriculaMS}}</td>
						<td>{{ $medico-> matriculaCM}}</td>
						<!--<td><a href=""> [Editar] </a></td>
						<td><a href=""> [Trabajar] </a></td>-->
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection