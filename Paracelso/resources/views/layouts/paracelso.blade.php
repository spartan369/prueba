<!DOCTYPE html>
<!--LAYOUT PARA LA APP PARACELSO-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Plataforma Paracelso</title>
    <!-- Fonts -->
    <!-- Styles -->
    <!-- RESET -->
    <link href="{{asset('css/reset.css')}}" rel="stylesheet">
    <!-- Loading Bootstrap -->
    <link href="{{asset('css/vendor/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Loading Flat UI / El CSS ya carga Fonts para el estilo-->
    <link href="{{asset('css/flat-ui.css')}}" rel="stylesheet">
    <!--Estilo Propio-->
    <link href="{{asset('css/global.css')}}" rel="stylesheet">
    <!-- Icono superior Paracelso -->
    <link rel="shortcut icon" href="{{asset('imagenes/favicon/favicon.ico')}}">
</head>

<body id="app-layout">
    
    <!-- Navegacion Superior-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid"> 
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <!--Brand-->
        <a class="navbar-brand" href="{{ url('lstcalendario') }}">Su Clinica/Hosp.</a></div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="defaultNavbar1">
          <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Ingresar</a></li>
            @else
                <li class="dropdown">
                    <a href="{{ url('lstcalendario') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a>
                        </li>
                    </ul>
                </li>
            @endif
            <li><a href="#">Clinica Sopocachi</a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Opciones<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('/perfilusuario') }}">Mi perfil</a></li>
              <li><a href="{{ url('/reseteo') }}">Cambio de contrase&#241;a</a></li>
              <li class="divider"></li>
              <li><a href="abm_doctor.html">Administracion Doctores</a></li>
            </ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ayuda<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/faq') }}">Base de Conocimiento</a></li>
                <li><a href="{{ url('/tutorial') }}">Tutoriales</a></li>
                <li><a href="{{ url('/videotutorial') }}">Video Tutoriales</a></li>
                <li><a href="{{ url('/acerca') }}">Acerca de Paracelso</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('/contacto') }}">Contactenos</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('/sugerencia') }}">Comentarios/Sugerencias</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('/privacidad') }}">Politica de Privacidad</a></li>
                <li><a href="{{ url('/terminouso') }}">Términos de uso</a></li>
                <!-- <li><a href="crear_paciente.html">Crear</a></li> -->
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse --> 
      </div>
      <!-- /.container-fluid -->
      </nav>
      <!--Fin de navegacion superior paracelso-->

      <!--  Navegacion Lateral -->
      <div class="container">
        <div class="row">
          <div id="menu_lateral" class="col-md-1">
            <ul class="nav nav-pills nav-stacked" role="menu">
              <li role="presentation"> <a href="{{ url('/frmbusquedapersona/T005') }}" class="textomenu">
                <div class="puntero"> <span class="glyphicon glyphicon-calendar icono_menu"></span>
                  <p class="textomenu">Citas</p>
                </div>
                </a></li>
              <li role="presentation"> <a href="{{ url('/frmbusquedapaciente/1000') }}" class="textomenu">
                <div class="puntero"> <span class="glyphicon glyphicon-user icono_menu"></span>
                  <p class="textomenu">Pacientes</p>
                </div>
                </a></li>
              <li role="presentation"> <a href="#reporte" class="textomenu">
                <div class="puntero"> <span class="glyphicon glyphicon-list icono_menu"></span>
                  <p class="textomenu">Reportes</p>
                </div>
                </a></li>
            </ul>
          </div>
        </div>
      </div>
      <!--  Fin Navegacion Lateral -->

    @yield('content')

<!-- Definicion de Footer Paracelso -->
      <footer>
        <div class="footer" style="float:left; padding-top:15px;"> 
          <div class="container">
              <p><span class="fui-location"> </span> Edif. CES, Of. #204, Obraje calle 6, La Paz - Bolivia</p>
              <p><span class="fui-chat"> </span> (+591) 720 00301 / (+591) 673 13333</p>
              <p><span class="fui-mail"> </span>gerencia@timnetbo.com / soporte@timnetbo.com</p>
          </div>
         </div>
         
         <!-- Se deden definir los iconos sociales a la derecha y derechos reservados por debajo -->
      </footer>
      <!-- Final de Footer -->
      
    <!-- JavaScripts -->
    <script src="{{asset('js/application.js')}}"></script>
    <script src="{{asset('js/vendor/bootstrap.min.js')}}"  crossorigin="anonymous"></script>
    <script src="{{asset('js/vendor/jquery.min.js')}}"  crossorigin="anonymous"></script>
    <script src="{{asset('js/flat-ui.min.js')}}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
