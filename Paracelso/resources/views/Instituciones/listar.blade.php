@extends('layouts.principal')

@section('title','Listar Instituciones')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Instituciones</h4>
			<p class="navbar-text navbar-right" style="margin-top: -35px;"><button class="btn btn-info navbar-btn" type="button" style="margin-top: 1px; margin-bottom: 1px; margin-right: 8px; padding: 5px 5px;" onclick="document.location.href='{{ route('institucion.create') }}'">Registrar Nueva</button></p>
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-condensed">
				<thead>
					<th>#</th>
					<th>Codigo</th>
					<th>Tipo</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Direccion</th>
					<th>Estado</th>
				</thead>
				<tbody>
					@foreach($Instituciones as $institucion)
					<tr>
						<td>{{ $institucion-> id_institucion}}</td>
						<td>{{ $institucion-> codigo_institucion}}</td>
						<td>{{ $institucion-> tipo_institucion}}</td>
						<td>{{ $institucion-> nombre}}</td>
						<td>{{ $institucion-> descripcion}}</td>
						<td>{{ $institucion-> direccion}}</td>
						<td>{{ $institucion-> estado}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection