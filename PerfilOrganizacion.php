<?php

$titulo = 'Perfil de Contacto';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
?>

<script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous"></script>

<!--Contenedor Titulo de La organizacion-->	
<div class="container tituloPO" >
    <div class="row" id="titulo">
        <div class="col-md-12 nombreOrganizacion bordeTitulo">
            <h3 class="colorNombreOrganizacion" align="center">Nombre de la Organización</h3>
        </div>
    </div>
</div><br/>

<!--Contenedor de imagen de perfil -->
<div class="container">
    <div class="row" id="filaPorg">
        <div class="col-md-6">
            <div class="panel panel-default">
                <img  class="tamanioImagenPO img-rounded" src="imagenes/iconocontactowhite.png" alt="imagen no disponible" title="Imagen Contacto">
            </div>
        </div>

        <!--Contenedor de texto de perfil-->
        <div class="col-md-6">
            <div class="panel panel-default pre-scrollable panelTexto">
                <div class="panel-body">
                    <h4 class="encabezadoPerfil"><strong><span class="glyphicon glyphicon-earphone"></span>Télefono:</strong></h4>
                    <h5 class="contenidoPerfil">2763-0000</h5>
                    <hr>

                    <h4 class="encabezadoPerfil"><strong><span class="glyphicon glyphicon-phone"></span>Celular:</strong></h4>
                    <h5 class="contenidoPerfil">9977-0000</h5>   
                    <hr>

                    <h4 class="encabezadoPerfil"><strong><span class="glyphicon glyphicon-envelope"></span>E-mail:</strong></h4>
                    <h5 class="contenidoPerfil">aeo.gmail.com</h5>
                    <hr>

                    <h4 class="encabezadoPerfil"><strong><span class="glyphicon glyphicon-transfer"></span>Dirección:</strong></h4>
                    <h5 class="contenidoPerfil">Danlí,El Paraíso</h5>
                    <hr>

                    <h4 class="encabezadoPerfil"><strong><strong><span class="glyphicon glyphicon-align-left"></span>Descripción:</strong></h4>
                    <h5 class="contenidoPerfil">Estamos para servirte </h5>
                </div>
            </div>
        </div>


        <script>
            $(document).on("ready", function () {
                loadData();
            });
            var loadData = function ()
            {
                $.ajax({
                    type: "GET",
                    url: mostrar_perfil.php,
                    data: {'id_contacto': '3'}
                }).done(function (data)
                {
                    var informacionContacto = JSON.parse(data);

                    for (var i in informacionContacto)
                    {
                        $("#filaPorg").append('<div class="col-md-6">' +
                                '<div class="panel panel-default">' +
                                '<img  class="tamanioImagenPO img-rounded" src=' + informacionContacto[i].imagen + 'alt="imagen no disponible" title="Imagen Contacto">' +
                                '</div>' +
                                '</div>' +
                                ' <div class="col-md-6">' +
                                '<div class="panel panel-default pre-scrollable panelTexto">' +
                                ' <div class="panel-body">' +
                                '<h4 class="encabezadoPerfil"><strong><span class="glyphicon glyphicon-earphone"></span>Télefono:</strong></h4>' +
                                '<h5 class="contenidoPerfil">' + informacionContacto[i].numero_fijo + '</h5>' + ' <hr>' +
                                '<h4 class="encabezadoPerfil"><strong><span class="glyphicon glyphicon-phone"></span>Celular:</strong></h4>' +
                                '<h5 class="contenidoPerfil">' + informacionContacto[i].numero_movil + '</h5>' + '<hr>' +
                                '<h4 class="encabezadoPerfil"><strong><span class="glyphicon glyphicon-envelope"></span>E-mail:</strong></h4>' +
                                ' <h5 class="contenidoPerfil">' + informacionContacto[i].e_mail + '</h5>' + '<hr>' +
                                '<h4 class="encabezadoPerfil"><strong><span class="glyphicon glyphicon-transfer"></span>Dirección:</strong></h4>' +
                                '<h5 class="contenidoPerfil">' + informacionContacto[i].direccion + '</h5>' + '<hr>' +
                                '<h4 class="encabezadoPerfil"><strong><strong><span class="glyphicon glyphicon-align-left"></span>Descripción:</strong></h4>' +
                                '<h5 class="contenidoPerfil">' + informacionContacto[i].descripcion_organizacion + '</h5>' + '<hr>'
                                );


                        $("#titulo").append(
                                '<div class="col-md-12 nombreOrganizacion bordeTitulo">' +
                                '<h3 class="colorNombreOrganizacion" align="center">' + informacionContacto[i].nombre_organizacion + '</h3>' +
                                '</div>'
                                );

                    }
                });
            }
        </script>	
    </div>
</div>

<?php

include_once 'plantillas/documento-cierre.inc.php';
?>
