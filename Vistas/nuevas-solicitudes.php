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
        <script type="text/javascript">

            $(document).on("ready", function () { loadData(); });
            /**********************************************************************************************
                 *            FUNCIÓN PARA BUSCAR ENTRE LOS PERFILES
                 **********************************************************************************************/
            var search = document.getElementById("search"),
                food = document.getElementsByClassName("enlaces_de_listas_contactos"),
                forEach = Array.prototype.forEach;

            search.addEventListener("keyup", function(e){
                var choice = this.value;

                forEach.call(food, function(f){
                    if (f.innerHTML.toLowerCase().search(choice.toLowerCase()) === -1)
                        f.style.display = "none";
                    else
                        f.style.display = "block";
                });
            }, false);


             /**********************************************************************************************
                 *            FUNCIÓN AJAX PARA MOSTRAR LAS SOLICITUDES
                 **********************************************************************************************/
                var aceptarSolicitud = function(id_contacto) {

                  $.ajax({
                    type:'POST',
                    url: '../WebServices/aceptarSolicitud.php',
                    data: {'cto':  id_contacto  ,
                    'tkn':"<?php echo $_SESSION['token'] ?>"}
                  });

                  };

                  var rechazarSolicitud = function(id_contacto) {
                    $.ajax({
                      type:'POST',
                      url: '../WebServices/rechazarSolicitud.php',
                      data: {'cto':  id_contacto  ,
                      'tkn': "<?php echo $_SESSION['token'] ?>"}
                    });
                  };

            var loadData = function () {
                $.ajax({
                    type: "post",
                    url: "../WebServices/consultarPerfilesParaAdministracionPerfiles.php",
                    data: {'ste': '1'},
                    success: function (data) {
                        var perfiles = JSON.parse(data);
                        if (perfiles!== "No hay resultados.") {

                            var imagen;


                            for (var i in perfiles) {
                                if (perfiles[i].imagen !== "") {
                                    imagen = perfiles[i].imagen;
                                } else {
                                    imagen = "../imagenes/iconocontactowhite.png";
                                }
                                ;

                                $("#fila").append(
                                        '<a   id="solicitud" class="enlaces_de_listas_contactos" ><div class = "col-md-4 col-sm-6">' +
                                        '<div class="media">' +
                                        '<div class="media-left">' +
                                        '<img  style="width:130px ; heigh:130px ;"  class="media-object img-circle circle-img" src=' + imagen + '> ' +
                                        '</div>' +
                                        '<div class="media-body">' +
                                        '<h4 class = "media-heading">' + perfiles[i].nombre_organizacion + '</h4>' +
                                        '<p>Usuario Propietario:</p>' +
                                        '<p>' + perfiles[i].nombre_usuario + '</p>' +
                                        '<input type="hidden" id="id" name="id" value=' + perfiles[i].id_contacto + '/>' +
                                        '<button type="button" id="ok" onclick="aceptarSolicitud('+ perfiles[i].id_contacto+')" data-toggle="modal" data-target="#Modal" class="btn btn-primary">Aceptar</button>'+
                                        '<button type="button" id="cancel" onclick="rechazarSolicitud('+perfiles[i].id_contacto+')" data-toggle="modal" data-target="#Modal1" class="btn btn-secondary">Rechazar</button>' +
                                        '</div>' +
                                        '</div>' +
                                        '<hr style="margin-left:140px"/>' +
                                        '</div>' +
                                        '</a>' );

                            }
                        } else {
                            $("#fila").append(
                                    '<div class="col-md-12 text-center">' +
                                    '<img  style="width:130px ; heigh:130px ;"  class="img-circle circle-img" src="https://cdn4.iconfinder.com/data/icons/rounded-white-basic-ui/139/Warning01-RoundedWhite-512.png"> ' +
                                    '</div>' +
                                    '<div class="col-md-12 text-center">' +
                                    '<h1>No hay nuevas solicitudes</h1> ' +
                                    '</div>'

                                    );
                        }
                    }
                });
            };

        </script>

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
