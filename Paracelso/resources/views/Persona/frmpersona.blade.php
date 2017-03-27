@extends('layouts.paracelso')

@section('content')
<meta name="csrf-token" content="{{csrf_token()}}"/>
<meta charset="utf-8">
<head>
	<!--bootstrap-->
	<title>Registro de Pacientes</title>
	<script>
		function alcargar(){
							$('#foto').hover(function(){
														$(this).find('a').fadeIn();
														},
											function(){
														$(this).find('a').fadeOut();
														}
											);
							$('#eligeArchivo').on('click',function(e){
																		e.preventDefault();
																		$('#imagenpersona').click();
																	}
												);

							$('input[type=file]').change(function(){
								var nombre=(this.files[0].name).toString();
								var reader=new FileReader();

								$('#infoArchivo').text('');
								$('#infoArchivo').text(nombre);

								reader.onload=function(e){
									$('#foto img').attr('src',e.target.result);
								}

								reader.readAsDataURL(this.files[0]);
							});
							}
	</script>
</head>

<body onload="alcargar();">
<div class="container-fluid titulo_general">
      <h6 id="titulo_principal">Registro de Paciente</h6>
</div>
<div class="container-fluid paciente_encontrado">	
	<div role="tabpanel">
		<!--crea boton de menu al estrecharse la resolucion de pantalla-->
		<div class="navbar-header navbar-inverse">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
		</div>
		
		<!--incluye el menu en la referencia del boton creado antes-->
		<div class="collapse navbar-collapse" id="menu" role="navigation">
			<ul class="nav nav-tabs" role="tablist">
				<li class="active" role="presentation"><a href="#tab1" aria-controls="" data-toggle="tab" role="tab">Informacion basica</a></li>
				<li role="presentation"><a href="#tab2" aria-controls="" data-toggle="tab" role="tab">Informacion de contacto</a></li>
				<li role="presentation"><a href="#tab3" aria-controls="" data-toggle="tab" role="tab">Informacion de pago</a></li>
				<li role="presentation"><a href="#tab4" aria-controls="" data-toggle="tab" role="tab">Informacion adicional</a></li>
			</ul>
		</div>
		
		
		<div class="tab-content">
			<!--seccion informacion basica-->
			<div role="tabpanel" class="tab-pane active" id="tab1">
				<div class="container">
					<div class="row">						
						<!--formulario de datos basicos-->
						<div class="col-xs-12 col-sm-8 col-md-8">
                        <!-- Display Validation Errors -->
                        <!--@include('commons.errors')-->
							<form action="{{ url('persona') }}" method="POST" class="form-horizontal"  accept-charset="utf-8" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="nombre" class="control-label">Nombre:</label>
									<div class="bordes_izq_der">
										<input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre" autocomplete="off" autofocus>
									</div>
								</div>

								<div class="form-group">
									<label for="ap_paterno" class="control-label">A. Paterno:</label>
									<div class="bordes_izq_der">
										<input name="ap_paterno" type="text" class="form-control" id="ap_paterno" placeholder="Apellido Paterno" autocomplete="off">
									</div>
								</div>

								<div class="form-group">
									<label for="apellido_materno" class="control-label">A. Materno:</label>
									<div class="bordes_izq_der">
										<input name="ap_materno" type="text" class="form-control" id="ap_materno" placeholder="Apellido Materno" autocomplete="off">
									</div>
								</div>

								<div class="form-group">
									<label for="fecha_nacimiento" class="control-label">Fecha de Nacimiento:</label>
									<div class="bordes_izq_der">
										<input name="fecha_nacimiento" type="Date" class="form-control" id="fecha_nacimiento" placeholder="Fecha Nacimiento" autocomplete="off">
									</div>
								</div>

								<div class="form-group">
							        <label class="control-label">Tipo Documento</label>
							        <div class="selectContainer bordes_izq_der">
							            <select name="tipo_documento" id="tipo_documento" class="form-control">
	                  						@foreach ($dominios as $dominios)
	                    					<option value="{{ $dominios->codigo_dominio }}">{{ $dominios->descripcion}}</option>
	                  						@endforeach  
                						</select>
							        </div>
							    </div>

								<div class="form-group">
									<label for="documento_identidad" class="control-label">Documento de Identidad:</label>
									<div class="bordes_izq_der">
										<input name="documento_identidad" type="text" class="form-control" id="documento_identidad" placeholder="Documento de Identidad" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">Genero</label>
									<div >
											<input type="radio" name="genero" id="genero" value="M">Masculino
									</div>	
									<div>
											<input type="radio" name="genero" id="genero2" value="F">Femenino
									</div>

								</div>
								<div class="form-group">
					                <div class="col-sm-offset-3 col-sm-6">
					                    <button type="submit" class="btn btn-default">
					                        <i class="fa fa-plus"></i> Registrar
					                    </button>
					                </div>
					            </div>
						</div>
					</div>						
				</div>
			</div>
			<!--seccion de informacion de contacto-->
			<div class="tab-pane" id="tab2" role="tabpanel">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-md-8">
								<div class="form-group">
									<label for="no_celular" class="control-label">Celular</label>
									<div class="bordes_izq_der">
										<input name="no_celular" type="number" class="form-control" id="no_celular" placeholder="Telefono Celular" autocomplete="off">
									</div>
								</div>

								<div class="form-group">
									<label for="no_telefono" class="control-label">Telefono de Domicilio</label>
									<div class="bordes_izq_der">
										<input name="no_telefono" type="number" class="form-control" id="no_telefono" placeholder="Telefono de Domicilio" autocomplete="off">
									</div>
								</div>

								<div class="form-group">
									<label for="no_telefono_trabajo" class="control-label">Telefono del Trabajo</label>
									<div class="bordes_izq_der">
										<input type="number" class="form-control" name="no_telefono_trabajo" id="no_telefono_trabajo" placeholder="Telefono del Trabajo" autocomplete="off">
									</div>
								</div>

								<div class="form-group">
									<label for="email" class="control-label">e-mail</label>
									<div class="bordes_izq_der">
										<input name="email" type="email" class="form-control" id="email" placeholder="e-mail" autocomplete="off">
									</div>
								</div>

								<div class="form-group">
									<label for="direccion" class="control-label">Direccion actual</label>
									<div class="bordes_izq_der">
										<input name="direccion" type="text" class="form-control" id="direccion" placeholder="Direccion Actual" autocomplete="off">
									</div>
								</div>

								<div class="form-group">
									<label for="ciudad_residencia" class="control-label">Ciudad de Residencia</label>
									<div class="bordes_izq_der">
										<input name="ciudad_residencia" type="text" class="form-control" id="ciudad_residencia" placeholder="Ciudad de Residencia" autocomplete="off">
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>

			<!--seccion de informacion de pago-->
			<div class="tab-pane" id="tab3" role="tabpanel">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
							        <label class="control-label">Tipo Seguro</label>
							        <div class="selectContainer bordes_izq_der">
							            <select class="form-control" id="tipo_seguro" name="tipo_seguro" onchange="buscarseguros()">
							            @foreach ($tipos_seguros as $tipos_seguros)
                                            <option value="{{ $tipos_seguros->codigo_dominio}}">{{ $tipos_seguros->descripcion}}</option>
                                        @endforeach  
							            </select>
							        </div>
							    </div>

								<div class="form-group" id='detalle_seguros' name='detalle_seguros'>
								<input type="hidden" name="_token1" value="{{ csrf_token() }}" id="token1">
							        <label class="control-label">Seguro vigente</label>
							        <div class="selectContainer bordes_izq_der" id="seguros" name="seguros">
							            <select class="form-control" id="codigo_seguro" name="codigo_seguro">
							                <option value="">Elija una opcion</option>
							            </select>
							        </div>
						    	</div>

						    	<div class="form-group">
									<label for="autorizacion" class="control-label">Numero de Autorizacion</label>
									<div class="bordes_izq_der">
										<input type="text" class="form-control" name="matricula_seguro" id="matricula_seguro" placeholder="Numero de Seguro" autocomplete="off">
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>

			<!--seccion de demograficos y notas-->
			<div class="tab-pane" id="tab4" role="tabpanel">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
									<label for="religion" class="control-label">Religion</label>
									<div class="bordes_izq_der">
										<input type="text" name= "religion" class="form-control" id="religion" placeholder="Religion actual" autocomplete="off">
									</div>
								</div>

								<div class="form-horizontal">
									<div class="form-group">
										<label for="registro" class="control-label">Numero de Registro</label>
										<div class="bordes_izq_der">
											<input id="registro" type="text" class="form-control" placeholder="Numero de Registro" autocomplete="off">
										</div>
										<div class="bordes_izq_der">
											<button id="btnGenerar" type="submit" class="btn btn-success">Generar</button>
										</div>
									</div>
								</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
								<div class="form-group">
									<label for="notas" class="control-label">Observaciones</label>
									<div class="bordes_izq_der">
										<input type="text" class="form-control" name="observaciones" id="observaciones" placeholder="Observaciones" autocomplete="off">
									</div>
								</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="thumbnail" id="foto">
								<a href="" class="btn btn-default" id="eligeArchivo">Elegir Foto</a>
								<img src="imagenes/iconos/silueta.png" alt="">
							</div>
							<span class="alert alert-info" id="infoArchivo">No se ha elegido archivo</span>
							<input type="file" name="imagenpersona" id="imagenpersona">

						</div>
					</div>
				</div>
			</div>
         </form>   
		</div>
	</div>
	<div>
	<!--	<script type="text/javascript" src="js/vendor/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-combobox.js"></script>-->
	<script type="text/javascript" src="{{asset('js/seguros.js')}}"></script>
</body>
@endsection