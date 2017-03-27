<div class="panel-heading">
                    <center>PERSONAS ENCONTRADAS</center>
                </div>
    <div class="panel-body">
        <!-- Display Validation Errors -->
        <!--@include('commons.errors')-->

        <!-- Formulario de Listado de Persona -->
            {{ csrf_field() }}
            <div class="form-group">
			<div class="container">
    			<div class="table-responsive">
                	<table class="table table-striped table-bordered tabla_small">
                		<tr>
                			<th>No. Documento</th>
                            <th>Tipo</th>
                            <th>Nombre/s</th>
                            <th>Ap. Paterno</th>
                            <th>Ap. Materno</th>
                            <th>Opciones</th>
                		</tr>
                		@foreach ($persona as $persona)
                			{{--<tr><td>{{ $persona->documento_identidad}}</td><td>{{ $persona->tipo_documento}}</td><td>{{ $persona->nombre}}</td><td>{{ $persona->ap_paterno}}</td><td>{{ $persona->ap_materno}}</td><td><a href="http://localhost:8000/seleccionarpersona/{{{ $persona->id_persona}}}">Seleccionar</a></td></tr>--}}
                            <tr><td>{{ $persona->documento_identidad}}</td><td>{{ $persona->tipo_documento}}</td><td>{{ $persona->nombre}}</td><td>{{ $persona->ap_paterno}}</td><td>{{ $persona->ap_materno}}</td><td><a href="{{url('/seleccionarpersona')}}/{{{ $persona->id_persona }}}/{{{ $persona->nombre}}}/{{{ $persona->ap_paterno}}}/{{{ $persona->fecha_nacimiento}}}/{{{ $codigo_transaccion}}}">Seleccionar</a></td></tr>
                		@endforeach
                	</table>
                </div>
            </div>
    </div>