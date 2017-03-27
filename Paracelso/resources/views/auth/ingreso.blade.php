<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!--bootstrap-->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--cargado de iconos -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
	<!--estilo propio -->
	<link rel="stylesheet" href="../css/master.css">

<title>Ingreso</title>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/arvo:n4:default;lato:n4:default.js" type="text/javascript"></script>
</head>

<!--Inicio de BODY -->
<body>

<section id="fondo1">

	<div class="container-fluid">
    
    <!-- Navegacion -->
    <nav class="navbar navbar-default navegacion_externa navbar-fixed-top">
      <div class="container-fluid"> <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
          <div class="col-sm-6 col-md-5 col-xs-5"> <a href="../index.html"><img src="../imagenes/iconos/logo_par.png" alt="" class="img-responsive"></a></div></div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="defaultNavbar1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="soluciones.html">Soluciones</a></li>
            <li><a href="empresa.html">Empresa</a></li>
            <li><a href="ayuda.html">Ayuda</a></li>
            <li><a href="login.html">Ingresar</a></li>
            <li><a href="../par_solucion/menu.html">A</a></li>
          </ul>
        <!-- /.navbar-collapse -->
		</div>
      </div>
      <!-- /.container-fluid -->
    </nav>
	<!-- Fin de navegacion -->
    
    		<!-- Migas de Pan -->
<!--      	<ol class="breadcrumb">
        	<li><a href="../index.html">Inicio</a></li>
        	<li class="active">Ingreso</li>
      	</ol>
-->    
    	<div class="row">
        	<!-- espacio vacio lateral -->
            <div class="col-xs-6 col-sm-8 col-md-8"></div>
            
            <!-- definicion de formulario y espacio superior -->
            <div id="form_login" class="col-xs-6 col-sm-4 col-md-4 margenes2">
            	<h4>Control de Acceso</h4>
                <form action="{{ url('/login') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <fieldset>
						<div class="form-group">
							<label for="nombre" class="control-label col-xs-3 col-sm-4 col-md-4">Usuario:</label>
							<div class="col-xs-7 col-sm-6 col-md-6">
                           	
                            <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
						</div>
                        
                        <div class="form-group">
							<label for="password" class="control-label col-xs-3 col-sm-4 col-md-4">Password:</label>
							<div class="col-xs-7 col-sm-6 col-md-6">
							<input id="password" type="password" class="form-control" name="password">
							</div>
						</div>
                        <div class="form-group">
							<div class="col-xs-7 col-sm-6 col-md-6 col-xs-offset-3 col-sm-offset-4 col-md-offset-4">
								<a href="../par_solucion/menu.html" target="new">
								<button type="submit" class="btn btn-success">Ingresar</button>
							</a>							</div>				
						</div>
                 </fieldset>
                 </form>
            </div>
        </div>

        <div class="row margenes1">        	
        </div>    
    
    </div>
</section>

  <!-- Definicion de Footer Paracelso -->
  <footer>
	  <div class="footer"> 
      	<div class="container">
			<div class="social-icon">
				<div class="col-md-4">
					<ul class="social-network">
						<li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
					</ul>	
				</div>
			</div>
			<div class="col-md-4 col-md-offset-4">
				<div class="copyright">
					Todos los derechos reservados <a href="http://www.timnetbo.com">TIMNet&copy;</a>
				</div>
			</div>						
		</div>
       </div>
   </footer>
   <!-- Final de Footer --><!--scripts-->
   
   <!-- Scripts -->
   <script src="../js/jquery-1.12.4.min.js"></script>
   <script src="../js/bootstrap.min.js"></script>
</body>
</html>