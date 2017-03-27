<div class="panel-heading">
                    <center>PACIENTES ENCONTRADOS</center>
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
                            <th>Tipo Documento</th>
                            <th>Nombre/s</th>
                            <th>Ap. Paterno</th>
                            <th>Ap. Materno</th>
                            <th>Paciente</th>
                            <th>Opciones</th>
                		</tr>
                		@foreach ($personas as $persona)
                            @if (isset($persona->paciente->id_paciente))
                                <tr><td>{{ $persona->documento_identidad}}</td><td>{{ $persona->tipo_documento}}</td><td>{{ $persona->nombre}}</td><td>{{ $persona->ap_paterno}}</td><td>{{ $persona->ap_materno}}</td><td>Si</td><td><a href="{{url('/seleccionarpaciente')}}/{{{ isset($persona->paciente->id_paciente) ? $persona->paciente->id_paciente : 0}}}/{{{ $persona->nombre}}}/{{{ $persona->ap_paterno}}}/{{{ $persona->fecha_nacimiento}}}/{{{ $codigo_transaccion}}}">{{ isset($persona->paciente->id_paciente) ? 'Seleccionar' : 'Completar'}}</a></td></tr>
                            @else
                                <tr><td>{{ $persona->documento_identidad}}</td><td>{{ $persona->tipo_documento}}</td><td>{{ $persona->nombre}}</td><td>{{ $persona->ap_paterno}}</td><td>{{ $persona->ap_materno}}</td><td>No</td><td><a href="{{url('/completarpaciente')}}/{{{ $persona->id_persona }}}/{{{ $persona->nombre}}}/{{{ $persona->ap_paterno}}}/{{{ $persona->fecha_nacimiento}}}/{{{ $codigo_transaccion}}}">{{ isset($persona->paciente->id_paciente) ? 'Seleccionar' : 'Completar'}}</a></td></tr>
                            @endif
                		@endforeach
                	</table>
                </div>
            </div>
    </div>