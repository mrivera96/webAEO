function $_GET(param) {
    var vars = {};
    window.location.href.replace(location.hash, '').replace(
            /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
            function (m, key, value) { // callback
                vars[key] = value !== undefined ? value : '';
            }
    );

    if (param) {
        return vars[param] ? vars[param] : null;
    }
    return vars;
}
var cto = $_GET('cto');

    $(document).on("ready", function () {
        loadData();
    });
    var loadData = function ()
    {
        $.ajax({
            type: "get",
            url: "../WebServices/mostrar_perfil.php",
            data: {'id_contacto':cto}
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
                        '<div class="col-md-12  col-sm-14">' +
                        '<h4 class="colorNombreOrganizacion" align="center">' + informacionContacto[i].nombre_organizacion + '</h4>' +
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
                        '<img style="width: 250px; height: 250px" class="img-circle img-circle" class="img-rounded" src=' + imagen + '>'
                        );
                
                 /************************************************************************************************/
                 $("#ubicacion").append('<a class="enlaces_de_listas_contactos float" href="../Vistas/mapa.php?numct='+informacionContacto[i].id_contacto+'">' +
                                    '<i class="glyphicon glyphicon-map-marker my-float"></i>'+' </a>'
                 );
         
         $("#filatxt").append(
                  ' <div class="col-md-12">' +
                        
                        '<div class="panel panel-default">' +
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

