
<head>
    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-combobox.css">
    <!--estilo propio-->
    <link rel="stylesheet" href="css/estilo.css">
</head>
<div class="panel-heading">
<div class="container-fluid paciente_encontrado">
      
      <div class="thumb_paciente"><img src="../imagenes/iconos/silueta.png" class="img-responsive" alt="S/I"></div>
      <h5> {{session('nombre_persona')}}  | <small>Fecha de Nac: {{session('fecha_nacimiento')}}</small></h5>
      <a href="#signos" data-toggle="modal" class="btn btn-primary" style="float:right; margin-top:-42px; margin-right:10px;">Ver Detalle</a>

    </div>
    <div class="container-fluid paciente_encontrado">
    </div>