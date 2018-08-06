<?php
  session_start();
  $titulo="Administración de Perfiles";
   include_once 'plantillas/documento-inicio.inc.php' ;
    if (isset($_SESSION['user_id'])) {
        
 ?>
                        
        <head><link href="css/estilos_melvin.css" rel="stylesheet"></head>

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only"></span> 
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> 
                    <a  href="index.php"><img class="btn-card" src="imagenes/aeo.png"   align="left" height="50"></a><!--Para ponerle una img ala pagina -->
                    <a class="navbar-brand" href="#"><strong>Agenda Electrónica Oriental</strong></a> 
                </div>
                <div id="navbar" class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="nuevas-solicitudes.php"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Nuevas Solicitudes</a></li>
                        <li><a href="solicitudes-rechazadas.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Solicitudes Rechazadas</a></li>
                        <li><a href="perfiles-eliminados.php"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Perfiles Eliminados</a></li>
                        <li id="boton" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <strong>Panel de Control</strong><span class="caret"></span></a>
                            <ul id="despliege" class="dropdown-menu" role="menu">
                                <li><a href="mostrar_usuarios.php"><img src="imagenes/administracioncuenta.jpg" height="15"> <strong>Administración de Cuenta</strong></a></li>
                                <li><a href="administracion-de-perfiles.php"><img src="imagenes/administracionperfil.jpg" height="15"> <strong>Administración de Perfiles</strong></a></li>
                            </ul>
                        </li>
                        <li> <a id="colorIniciosecion" href="cerrarSessionLogin.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> </a></li>
                    </ul>
                </div> 
            </div>   

        </nav>

        <div id="encabezado_lista_contactos" class="container"><h4 style="color: white">Administración de Perfiles Activos</h4></div>


        <div class="container" id="contenedor_perfiles">
            <div class="row" style="margin-top: 10px;" id="fila">


            </div>  

            <a href="nuevo-perfil.php" class="float">  
                <i class="glyphicon glyphicon-plus my-float"></i>
            </a>

        </div>

        <script src="js/jquery-2.2.4.min.js"></script>                
        <script src="js/administracionPerfiles.js"></script> 
        <?php
            include_once 'plantillas/documento-cierre.inc.php';
        ?>

<?php
   } else {
       header('Location: /webaeo');
    }
?>


