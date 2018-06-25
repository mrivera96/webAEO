<?php
$titulo = 'Perfil de Contacto';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
include_once 'plantillas/buscador.inc.php';
?>

<script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous"></script>


<!--Contenedor Titulo de La organizacion-->
<div id="encabezado_contactos" class="container responsive" >
    <div class="row" id="titulo">

    </div>
</div><br/>

<!--Contenedor de imagen de perfil -->
<div class="container " id="contenedor_contactosPerfiles">

    <div class="row" style="margin-top: 10px;" id="filaPorg">

    </div>

</div>

<script>
    $(document).on("ready", function () {
        loadData();
    });
    var loadData = function ()
    {
        $.ajax({
            type: "POST",
            url: "mostrar_perfil.php",
            data: {'id_contacto':<?php echo $_GET['id_contacto'] ?>}
        }).done(function (data)
        {
            var informacionContacto = JSON.parse(data);
            var imagen;
            var telefono;
            var celular;
            var email;
            var direccion;
            var descripcion;


            for (var i in informacionContacto)
            {
                $("#titulo").append(
                        '<div class="col-md-12 nombreOrganizacion bordeTitulo">' +
                        '<h3 class="colorNombreOrganizacion" align="center">' + informacionContacto[i].nombre_organizacion + '</h3>' +
                        '</div>'
                        );

                /************************************************************************************************/


                if (informacionContacto[i].imagen != "") {
                    imagen = informacionContacto[i].imagen;
                } else {
                    imagen = "https://cdn.icon-icons.com/icons2/37/PNG/512/contacts_3695.png";
                }

                if (informacionContacto[i].numero_fijo != "") {
                    telefono = informacionContacto[i].numero_fijo;
                } else {
                    telefono = "No disponible";
                }

                if (informacionContacto[i].numero_movil != "") {
                    celular = informacionContacto[i].numero_movil;
                } else {
                    celular = "No disponible";
                }

                if (informacionContacto[i].e_mail != "") {
                    email = informacionContacto[i].e_mail;
                } else {
                    email = "No disponible";
                }

                if (informacionContacto[i].direccion != "") {
                    direccion = informacionContacto[i].direccion;
                } else {
                    direccion = "No disponible";
                }


                if (informacionContacto[i].descripcion_organizacion != "") {
                    descripcion = informacionContacto[i].descripcion_organizacion;
                } else {
                    descripcion = "No disponible";
                }

                $("#filaPorg").append(
                        '<div class="col-md-6">' +
                        '<div class="panel panel-default">' +
                        '<img  class="tamanioImagenPO img-rounded" src=' + imagen + '>' +
                        '</div>' +
                        '</div>' +
                        ' <div class="col-md-6">' +
                        '<div class="panel panel-default pre-scrollable panelTexto">' +
                        ' <div class="panel-body">' +
                        '<h4><strong><span class="glyphicon glyphicon-earphone"></span>&nbspTélefono:</strong></h4>' +
                        '<h5>' + telefono + '</h5>' + ' <hr>' +
                        '<h4><strong><span class="glyphicon glyphicon-phone"></span>&nbspCelular:</strong></h4>' +
                        '<h5>' + celular + '</h5>' + '<hr>' +
                        '<h4><strong><span class="glyphicon glyphicon-envelope"></span>&nbspE-mail:</strong></h4>' +
                        ' <h5>' + email + '</h5>' + '<hr>' +
                        '<h4><strong><span class="glyphicon glyphicon-transfer"></span>&nbspDirección:</strong></h4>' +
                        '<h5>' + direccion + '</h5>' + '<hr>' +
                        '<h4><strong><strong><span class="glyphicon glyphicon-align-left"></span>&nbspDescripción:</strong></h4>' +
                        '<h5>' + descripcion + '</h5>'
                        );
            }
        });
    }
</script>	
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
