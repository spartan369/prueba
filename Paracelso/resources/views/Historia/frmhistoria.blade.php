@extends('layouts.paracelso')
@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <title>Historia</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- RESET -->
	<script>
		function indiceMC(){
			var v1=parseInt(document.getElementById('peso').value);
			var v2=parseInt(document.getElementById('talla').value);
			var v3=0;
			if(v1==0 || v1==null || v2==0 || v2==null){
				v3=0;
			}
			else{
			v3=v1/((v2/100)*(v2/100));
			}
			document.getElementById('imc').value=v3.toFixed(2);
		}
	</script>
</head>
<body>
    <!-- Titulo de Menu -->
    <div class="container-fluid titulo_general">
      <h6 id="titulo_principal">Historia Clinica</h6>
    </div>
    <!-- Fin de Titulo -->
    <!-- Cargado de paciente -->
    <div class="container-fluid paciente_encontrado">
      <div>@include('Persona.lstdatosbasicospersona')</div>
    </div>
	
	<div class="container-fluid paciente_encontrado">
    
	<!--tabs-->
	<div role="tabpanel">
		<div class="navbar-header navbar-default">
			<button class="navbar-toggle" data-toggle="collapse" data-target="#menu" type="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		
		<div class="collapse navbar-collapse marco_tabs" id="menu" role="navigation">
			<ul class="nav nav-tabs" role="tablist">
				<li class="active" role="presentation"><a href="#tab3" aria-controls="" data-toggle="tab" role="tab">Historial</a></li>
				<li role="presentation"><a href="#tab2" aria-controls="" data-toggle="tab" role="tab">Antecedentes</a></li>
				<li role="presentation"><a href="#tab1" aria-controls="" data-toggle="tab" role="tab">Signos Vitales</a></li>
			
			</ul>
		</div>

		<div class="tab-content">
			<!--seccion de historial de visitas-->
			<div class="tab-pane active" role="tabpanel" id="tab3">
				<div class="container" style="padding:20px;">
					<form action="{{ url('historia') }}" method="POST" class="form">
					{{ csrf_field() }}
						<label for="fecha" class="control-label col-xs-4 col-sm-5 col-md-6">Fecha Historia:</label>
						<div class="col-xs-8 col-sm-7 col-md-6">
							<input id="fecha" name="fecha" type="text" class="form-control" placeholder="Fecha Historia" autocomplete="off">
						</div>

						<label class="control-label col-xs-4 col-sm-5 col-md-6">Medico Responsable</label>
				        <div class="selectContainer bordes_izq_der">
				            <select class="form-control" id="id_medico" name="id_medico">
				            	@foreach ($medicos as $medico)
                                            <option value="{{ $medico->id_medico}}">{{ $medico->nombre." ". $medico->ap_paterno." ".$medico->ap_materno}}</option>
                                 @endforeach  

				            </select>
				        </div>
	        			
						<label for="observacion"  class="control-label col-xs-4 col-sm-5 col-md-6">Observacion:</label>
						<div class="col-xs-8 col-sm-7 col-md-6">
							<textarea class="form-control" rows="6" id="observacion" name="observacion" autocomplete="off" onkeydown="convertiramayusculas()" onkeyup="convertiramayusculas()"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</form>
				</div>
			</div>			

			<!--Seccion de antecedentes importantes-->
			<div class="tab-pane" role="tabpanel" id="tab2">
				<div class="container">
					<div class="row">						
						
						<div class="col-xs-12 col-sm-6 col-md-6" style="border: 1px dotted #8A8A8A">
							<h2>Alergias <a href="#alergias" data-toggle="modal"><small><span class="glyphicon glyphicon-plus"></span></small></a></h2>
							<a href="#alergias" data-toggle="modal" class="btn btn-primary">Registrar Alergia</a>
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-condensed">
									<tr>
										<th>Tipo</th>
										<th>Descripcion</th>
									</tr>
									<tr>
										<td>Alimentaria</td>
										<td>Leve | Pollo</td>
									</tr>
									<tr>
										<td>Medicamento</td>
										<td>Severa | Penicilina</td>
									</tr>
									<tr>
										<td>Ambiental</td>
										<td>Leve | Polvo</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6" style="border: 1px dotted #8A8A8A;">
							<h2>Historia Social</h2>
							<form action="" class="form-horizontal">
								<div class="form-group">
									<label class="control-label">Habito Tabaquico:</label>
							        <div class="selectContainer bordes_izq_der">
							            <select class="form-control">
							                <option value="">Elija una opcion</option>
							                <option value="e">Esporadico</option>
							                <option value="f">Frecuente</option>
							                <option value="m">Muy Frecuente</option>
							                <option value="s">Severo</option>
							            </select>
							        </div>
								</div>
								<div class="form-group">
									<label class="control-label">Habito Alcoholico:</label>
							        <div class="selectContainer bordes_izq_der">
							            <select class="form-control">
							                <option value="">Elija una opcion</option>
							                <option value="e">Esporadico</option>
							                <option value="f">Frecuente</option>
							                <option value="m">Muy Frecuente</option>
							                <option value="s">Severo</option>
							            </select>
							        </div>
								</div>
								<div class="form-group">
									<label for="sustancias" class="control-label">Otras sustancias:</label>
									<div class="bordes_izq_der">
										<input type="text" class="form-control" id="sustancias" placeholder="Otras Sustancias" autocomplete="off">
									</div>
								</div>
							</form>
						</div>

					</div>
					<div class="row">
						
						<div class="col-xs-12 col-sm-6 col-md-6" style="border: 1px dotted #8A8A8A">
							<h2>Diagnosticos Agudos <a href="#diagnosticos" data-toggle="modal"><small><span class="glyphicon glyphicon-plus"></span></small></a></h2>
							<a href="#diagnosticos" data-toggle="modal" class="btn btn-primary">Registrar Diagnostico Agudo</a>
							<ol>
								<li>diagnostico 1</li>
								<li>diagnostico 2</li>
								<li>diagnostico 3</li>
								<li>diagnostico 4</li>
							</ol>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-6" style="border: 1px dotted #8A8A8A;">
							<h2>Diagnosticos Cronicos <!--<a href="#diagnosticos" data-toggle="modal"><small><span class="glyphicon glyphicon-plus"></span></small></a>--></h2>
							<a href="#diagnosticos" data-toggle="modal" class="btn btn-primary">Registrar Diagnostico Cronico</a>
							<ol>
								<li>DIAGNOSTICO 1</li>
								<li>DIAGNOSTICO 2</li>
								<li>DIAGNOSTICO 3</li>
							</ol>
						</div>

						
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6" style="border: 1px dotted #8A8A8A;">
							<h2>Antecedentes Patologicos <a href="#antecedentes" data-toggle="modal"><small><span class="glyphicon glyphicon-plus"></span></small></a></h2>
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-condensed">
									<tr>
										<th>Tipo</th>
										<th>Descripcion</th>
									</tr>
									<tr>
										<td>Prob. Actual</td>
										<td>Dolor de espalda</td>
									</tr>
									<tr>
										<td>A.Familiar</td>
										<td>Diabetes tipo 2</td>
									</tr>
									<tr>
										<td>Evento Mayor</td>
										<td>Infarto cardiaco</td>
									</tr>
								</table>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-6" style="border: 1px dotted #8A8A8A;">
							<h2>Medicacion Actual <a href="#medicacion" data-toggle="modal"><small><span class="glyphicon glyphicon-plus"></span></small></a></h2>
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-condensed">
									<tr>
										<th>Medicamento</th>
										<th>Motivo(Dx)</th>
										<th>Administracion</th>
									</tr>
									<tr>
										<td>Droga 1</td>
										<td>Dolor de espalda</td>
										<td>VO c/8h | Vigente</td>
									</tr>
									<tr>
										<td>Droga 2</td>
										<td>Diabetes tipo 2</td>
										<td>SC c/24h | Vigente</td>
									</tr>
									<tr>
										<td>Droga 3</td>
										<td>Infarto cardiaco</td>
										<td>SL c/8h | No Vigente</td>
									</tr>
									<tr>
										<td>Droga 4</td>
										<td>Hipotiroidismo</td>
										<td>VO c/12h | No Vigente</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		
			<!--seccion de historico de signos vitales-->
			<div class="tab-pane" role="tabpanel" id="tab1">
				<div class="container" style="padding:20px;">

					<a href="#signos" data-toggle="modal" class="btn btn-primary">Registrar Nuevos</a>
					
				</div>
				<div class="container" style="padding:20px;">
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<tr>
								<th>Fecha</th>
								<th>Peso</th>
								<th>Talla</th>
								<th>IMC</th>
								<th>PA</th>
								<th>FC</th>
								<th>FR</th>
								<th>Temp</th>
								<th>SPO2</th>
								<th>Dolor</th>
							</tr>
							<tr>
								<td>01/01/2010</td>
								<td>65</td>
								<td>165</td>
								<td>25</td>
								<td>120/80</td>
								<td>60</td>
								<td>14</td>
								<td>37.2</td>
								<td>90</td>
								<td>0</td>
							</tr>
							<tr>
								<td>02/02/2012</td>
								<td>70</td>
								<td>165</td>
								<td>28</td>
								<td>110/70</td>
								<td>65</td>
								<td>14</td>
								<td>37.5</td>
								<td>92</td>
								<td>0</td>
							</tr>
							<tr>
								<td>03/03/2013</td>
								<td>78</td>
								<td>165</td>
								<td>29</td>
								<td>120/80</td>
								<td>70</td>
								<td>14</td>
								<td>37.3</td>
								<td>92</td>
								<td>1</td>
							</tr>
							<tr>
								<td>04/04/2014</td>
								<td>75</td>
								<td>165</td>
								<td>28</td>
								<td>130/80</td>
								<td>68</td>
								<td>15</td>
								<td>37.8</td>
								<td>90</td>
								<td>1</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

		</div>

	</div>

	<!--Modales-->
	<!--modal para signos vitales-->
	<div class="modal fade" id="signos" role="dialog" aria-hidden="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h5 class="modal-title">Registrar signos vitales</h5>
				</div>
				<div class="modal-body">

					<form action="" class="form" method="get">
					
						<label for="fecha" class="control-label col-xs-6 col-sm-6 col-md-6">Fecha:</label>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<input id="fecha" type="date" class="form-control" placeholder="Fecha" autocomplete="off">
						</div>
						<label for="peso" class="control-label col-xs-6 col-sm-6 col-md-6">Peso:</label>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<input id="peso" type="number" class="form-control" placeholder="Peso" autocomplete="off" onkeyup="indiceMC();">
						</div>
						<label for="talla" class="control-label col-xs-6 col-sm-6 col-md-6">Talla:</label>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<input id="talla" type="number" class="form-control" placeholder="Talla" autocomplete="off" onkeyup="indiceMC();">
						</div>
						<label for="imc" class="control-label col-xs-6 col-sm-6 col-md-6">IMC:</label>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<input id="imc" type="number" class="form-control" placeholder="IMC" autocomplete="off">
						</div>

						<label for="pas" class="control-label col-xs-6 col-sm-6 col-md-6">PAS:</label>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<input id="pas" type="number" class="form-control" placeholder="P. Sistolica" autocomplete="off">
						</div>
						<label for="pad" class="control-label col-xs-6 col-sm-6 col-md-6">PAD:</label>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<input id="pad" type="number" class="form-control" placeholder="P. Diastolica" autocomplete="off">
						</div>
						<label for="fc" class="control-label col-xs-6 col-sm-6 col-md-6">FC:</label>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<input id="fc" type="number" class="form-control" placeholder="F. Cardiaca" autocomplete="off">
						</div>
						<label for="fr" class="control-label col-xs-6 col-sm-6 col-md-6">FR:</label>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<input id="fr" type="number" class="form-control" placeholder="F. Respiratoria" autocomplete="off">
						</div>
						<label for="tem" class="control-label col-xs-6 col-sm-6 col-md-6">Temp. (C):</label>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<input id="tem" type="number" class="form-control" placeholder="Temperatura" autocomplete="off">
						</div>
						<label for="spo" class="control-label col-xs-6 col-sm-6 col-md-6">SPO2 (%):</label>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<input id="spo" type="number" class="form-control" placeholder="SPO2" autocomplete="off">
						</div>
						<label for="dolo" class="control-label col-xs-6 col-sm-6 col-md-6">Dolor (1-10):</label>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<input id="dolor" type="number" class="form-control" placeholder="Dolor" autocomplete="off">
						</div>
					</form>

					<button type="submit" class="btn btn-primary">Guardar</button>

				</div>
			</div>
		</div>
	</div>
	
	<!--modal para diagnosticos-->
	<div class="modal fade" id="diagnosticos" role="dialog" aria-hidden="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title">Registrar Nuevo Diagnostico</h3>
				</div>
				<div class="modal-body">
					<form action="" class="form" method="get">
						<label for="dx" class="control-label col-xs-4 col-sm-5 col-md-6">Diagnostico:</label>
						<div class="col-xs-8 col-sm-7 col-md-6">
							<input id="dx" type="text" class="form-control" placeholder="Diagnostico" autocomplete="off">
						</div>

						<label class="control-label col-xs-4 col-sm-5 col-md-6">CIE 10</label>
				        <div class="selectContainer">
				            <select class="form-control">
				                <option value="">Elija una opcion</option>
				                <option value="c">Dx 1</option>
				                <option value="p">Dx 2</option>
				                <option value="l">Dx 3</option>
				                <option value="o">Dx4</option>
				            </select>
				        </div>

	        			<div class="form-group">
	        				<div class="radio">
	        					<label for="dxagudo">
	        					<input type="radio" name="dxagudo" id="dxagudo"> 
	        					Agudo
	        					</label>
	        				</div>
	        				<div class="radio">
	        					<label for="dxcronico">
	        					<input type="radio" name="dxcronico" id="dxcronico"> 
	        					Cronico
	        					</label>
	        				</div>
							
						</div>

						<label for="comentario" class="control-label col-xs-4 col-sm-5 col-md-6">Comentarios:</label>
						<div class="col-xs-8 col-sm-7 col-md-6">
							<input id="comentario" type="text" class="form-control" placeholder="Comentarios" autocomplete="off">
						</div>
					</form>

					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</div>
	</div>

	<!--modal para Antecedentes-->
	<div class="modal fade" id="antecedentes" role="dialog" aria-hidden="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title">Registrar Nuevo Antecedente</h3>
				</div>
				<div class="modal-body">
					<form action="" class="form" method="get">
						<label class="control-label col-xs-4 col-sm-5 col-md-6">Tipo</label>
				        <div class="selectContainer">
				            <select class="form-control">
				                <option value="">Elija una opcion</option>
				                <option value="m">Evento Mayor</option>
				                <option value="a">Enfermedad Actual</option>
				                <option value="f">Familiar</option>
				                <option value="q">Quirurgico</option>
				                <option value="p">Preventivo</option>
				                <option value="o">Otro</option>
				            </select>
				        </div>

						<label for="descripcionAntec" class="control-label col-xs-4 col-sm-5 col-md-6">Descripcion:</label>
						<div class="col-xs-8 col-sm-7 col-md-6">
							<input id="descripcionAntec" type="text" class="form-control" placeholder="Descripcion" autocomplete="off">
						</div>
					</form>

					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
				
			</div>
		</div>
	</div>

	<!--modal para alergias-->
	<div class="modal fade" id="alergias" role="dialog" aria-hidden="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title">Registrar Nueva Alergia</h3>
				</div>
				<div class="modal-body">
					<form action="" class="form" method="get">
						<label class="control-label col-xs-4 col-sm-5 col-md-6">Tipo</label>
				        <div class="selectContainer">
				            <select class="form-control">
				                <option value="">Elija una opcion</option>
				                <option value="a">Ambiental</option>
				                <option value="m">Medicamentosa</option>
				                <option value="l">Alimentaria</option>
				            </select>
				        </div>

				        <label class="control-label col-xs-4 col-sm-5 col-md-6">Severidad</label>
				        <div class="selectContainer">
				            <select class="form-control">
				                <option value="">Elija una opcion</option>
				                <option value="l">Leve</option>
				                <option value="m">Moderada</option>
				                <option value="s">Severa</option>
				            </select>
				        </div>

						<label for="causa" class="control-label col-xs-4 col-sm-5 col-md-6">Causa/Agente:</label>
						<div class="col-xs-8 col-sm-7 col-md-6">
							<input id="causa" type="text" class="form-control" placeholder="Causa/Agente" autocomplete="off">
						</div>
					</form>

					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
				
			</div>
		</div>
	</div>

	<!--modal para Medicacion-->
	<div class="modal fade" id="medicacion" role="dialog" aria-hidden="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title">Registrar Nuevo Tratamiento</h3>
				</div>
				<div class="modal-body">
					<form action="" class="form" method="get">
						<label for="droga" class="control-label col-xs-4 col-sm-5 col-md-6">Medicamento:</label>
						<div class="col-xs-8 col-sm-7 col-md-6">
							<input id="droga" type="text" class="form-control" placeholder="Medicamento" autocomplete="off">
						</div>

						<label for="motivo" class="control-label col-xs-4 col-sm-5 col-md-6">Motivo/Enfermedad:</label>
						<div class="col-xs-8 col-sm-7 col-md-6">
							<input id="motivo" type="text" class="form-control" placeholder="Motivo/Enfermedad" autocomplete="off">
						</div>

						<label for="modo" class="control-label col-xs-4 col-sm-5 col-md-6">Administracion:</label>
						<div class="col-xs-8 col-sm-7 col-md-6">
							<input id="modo" type="text" class="form-control" placeholder="Modo de Administracion" autocomplete="off">
						</div>

						<label class="control-label col-xs-4 col-sm-5 col-md-6">Estado</label>
				        <div class="selectContainer">
				            <select class="form-control">
				                <option value="">Elija una opcion</option>
				                <option value="v">Vigente</option>
				                <option value="n">No Vigente</option>
				            </select>
				        </div>
					</form>

					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
				
			</div>
		</div>
        
        </div>

	</div>
	<script src="{{asset('js/utilitarios/utilitarios.js')}}"></script>
   <!-- Scripts --> 
    <!--<script src="../js/vendor/jquery.min.js"></script> 
    <script src="../js/vendor/video.js"></script> 
    <script src="../js/flat-ui.min.js"></script> 
    <script src="../js/application.js"></script>
	<script src="../js/vendor/bootstrap-combobox.js" type="text/javascript"></script>-->
</body>
</html>
@endsection