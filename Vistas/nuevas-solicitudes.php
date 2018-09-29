<?php
$titulo = "Nuevas Solicitudes";
session_start();
include_once '../plantillas/documento-inicio.inc.php';
if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
    if (isset($_SESSION['rol']) && !empty($_SESSION['rol']) && $_SESSION['rol'] == 1) {
        ?>
        <head><link href="../css/estilos_melvin.css" rel="stylesheet"></head>

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only"></span> 
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> 
                    <a  href="../index.php"><img class="btn-card" src="../imagenes/aeo.png"   align="left" height="50"></a><!--Para ponerle una img ala pagina -->
                    <a class="navbar-brand" href="../index.php"><strong>Agenda Electrónica Oriental</strong></a> 
                </div>
                <div id="navbar" class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="administracion-de-perfiles.php"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Administración de Perfiles activos</a></li>
                        <li><a href="solicitudes-rechazadas.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Solicitudes Rechazadas</a></li>
                        <li><a href="perfiles-eliminados.php"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Perfiles Eliminados</a></li>
                    </ul>
                </div> 
            </div>   

        </nav>

        <div id="encabezado_contactos_activos" class="container">
            <div class="col-md-9 col-sm-9 col-xs-9">
                <h4 style="color: white"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Nuevas Solicitudes</h4>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3 ">   

                <div class="inner-addon right-addon">
                    <i class="glyphicon glyphicon-search"></i>      
                    <input type="search" class="form-control" id="search">
                </div>                                                       
            </div>
        </div>


        <div class="container responsive" id="contenedor_perfiles">
            <div class="row" style="margin-top: 10px;" id="fila">
                <div class="modal" id="Modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Gestión de Solicitud</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Solicitud aceptada</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="aceptar" onclick="javascript:(function () {
                                                window.location.href = 'nuevas-solicitudes.php';
                                            })()" class="btn btn-primary">Aceptar</button>

                            </div>
                        </div>
                    </div>
                </div> 
                <div class="modal" id="Modal1" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Gestión de Solicitud</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Solicitud rechazada</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="aceptar" onclick="javascript:(function () {
                                                window.location.href = 'nuevas-solicitudes.php';})()" class="btn btn-primary">Aceptar</button>

                            </div>
                        </div>
                    </div>
                </div> 

            </div>                    
        </div>
        <script src="../js/jquery-2.2.4.min.js"></script>
        <script src="../js/nuevasSolicitudes.js"></script>   

        <?php
        include_once '../plantillas/documento-cierre.inc.php';
        ?>
        <?php
    } else {
        header('Location: /webaeo');
    }
} else {
    header('Location: /webaeo');
}
?>

