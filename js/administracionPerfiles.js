$(document).on("ready", function () {
    loadData();
});
var loadData = function () {
    $.ajax({
        type: "post",
        url: "consultarPerfilesParaAdministracionPerfiles.php",
        data: {'estado': '2'}
    }).done(function (data) {

        var perfiles = JSON.parse(data);
        var imagen;


        for (var i in perfiles) {
            if (perfiles[i].imagen !== "") {
                imagen = perfiles[i].imagen;
            } else {
                imagen = "https://cdn.icon-icons.com/icons2/37/PNG/512/contacts_3695.png";
            }
            ;

            $("#fila").append(
                    '<a class="enlaces_de_listas_contactos" href="editar-perfil.php?contacto=' + perfiles[i].id_contacto + '"><div class = "col-md-4 col-sm-6">' +
                        '<div class="media">' +
                            '<div class="media-left">' +
                            '<img style="width:130px ; heigh:130px ;"  class="media-object img-circle circle-img" src=' + imagen + '> ' +
                            '</div>' +
                            '<div class="media-body">' +
                            '<h4 class = "media-heading">' + perfiles[i].nombre_organizacion + '</h4>' +
                            '<p>Usuario Propietario:</p>' +
                            '<p>' + perfiles[i].nombre_usuario + '</p>' +
                            '</div>' +
                        '</div>' +
                        '<hr style="margin-left:140px"/>' +
                        '</div>'+
                    '</a>'
                    );
        }
    });
};


