<?php  
    include_once 'plantillas/documento-inicio.inc.php'
    
?>

  
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span> 
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> 
            <a  href="index.php"><img class="btn-card" src="imagenes/proyecto_nuevo_icono_aeo.png"   align="left" height="50"></a><!--Para ponerle una img ala pagina -->
            <a class="navbar-brand" href="#"><strong>Agenda Electrónica Oriental</strong></a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            
            <ul class="nav navbar-nav navbar-right">
                <li><a href="administracion-de-perfiles.php"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Administración de Perfiles activos</a></li>
                <li><a href="nuevas-solicitudes.php"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Nuevas Solicitudes </a></li>
                <li><a href="solicitudes-rechazadas.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Solicitudes rechazadas</a></li>
            </ul>
        </div> 
    </div>   
    
</nav>
      
  <div id="encabezado_lista_contactos" class="container"><h4 style="color: white">Perfiles Eliminados</h4></div>
  

  <div class="container responsive" id="contenedor_perfiles">
      <div class="row" style="margin-top: 10px;" id="fila">
          
             
      </div>                    
  </div>
  <script src="js/jquery-2.2.4.min.js"></script>
  <script src="js/perfilesEliminados.js"></script>   
  
<?php
    include_once 'plantillas/documento-cierre.inc.php';
?>


