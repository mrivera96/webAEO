<?php
$titulo = 'Perfil de Contacto';
include_once '../plantillas/documento-inicio.inc.php';
include_once '../plantillas/barra-de-navegacion-navbar.inc.php';
include_once '../plantillas/buscador.inc.php';
?>
<head>
    <link href="../css/estilos_melvin.css" rel="stylesheet">
    <link href="../css/estilos.css" rel="stylesheet">
</head>

<script type="text/javascript" src="../js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="../js/perfilOrg.js"></script>

<!--Contenedor Titulo de La organizacion-->
<div id="encabezado_lista_contactos" class="container responsive" >
    <div class="row" id="titulo">

    </div>
</div>

<!--Contenedor de imagen de perfil -->
<div class="container" id="contenedor_perfiles" >
    <div class="row" style="margin-top: 10px;" >
        <div class="form-group text-center" id="filaPorg">
            
 </div><br><br>

    </div>
    
    <div class="row" style="margin-top: 10px;" id="filatxt">

    </div>
</div>	

<div class="container" id="ubicacion"> 
      
  </div>
<?php
include_once '../plantillas/documento-cierre.inc.php';
?>
