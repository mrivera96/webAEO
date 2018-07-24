<?php
$titulo = 'Perfil de Contacto';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
include_once 'plantillas/buscador.inc.php';
?>
<head>
    <link href="css/estilos_melvin.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<script src="js/jquery-2.2.4.min.js"></script>


<!--Contenedor Titulo de La organizacion-->
<div id="encabezado_lista_contactos" class="container responsive" >
    <div class="row" id="titulo">

    </div>
</div><br/>

<!--Contenedor de imagen de perfil -->
<div class="container" style="padding:0px;">

    <div class="row" style="margin-top: 5px;" id="filaPorg">

    </div>

</div>

<script>
    $(document).on("ready", function () {
        loadData();
    });
    var loadData = function ()
    {
        $.ajax({
            type: "get",
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
                        '<div class="col-md-12  col-sm-14 nombreOrganizacion bordeTitulo">' +
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
                
                 /************************************************************************************************/
                 $("#ubicacion").append('<a class="enlaces_de_listas_contactos float" href="mapa.php?id_contacto='+informacionContacto[i].id_contacto+'">' +
                                    '<i class="glyphicon glyphicon-map-marker my-float"></i>'+' </a>'
                 );
            }
        });
    }
</script>	

<div class="container" id="ubicacion"> 
      
  </div>
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
