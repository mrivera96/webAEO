$(document).on("ready", function () {
    loadData();
});
var loadData = function () {
    $.ajax({
        type: "post",
        url: "consultarPerfilesParaAdministracionPerfiles.php",
        data: {'estado': '1'},
        success:function (data){
        if(data!=="No hay resultados"){
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
                        '<a   id="solicitud" data-toggle="modal" data-target="#Modal" class="enlaces_de_listas_contactos" ><div class = "col-md-4 col-sm-6">' +
                            '<div class="media">' +
                                '<div class="media-left">' +
                                '<img  style="width:130px ; heigh:130px ;"  class="media-object img-circle circle-img" src=' + imagen + '> ' +
                                '</div>' +
                                '<div class="media-body">' +
                                '<h4 class = "media-heading">' + perfiles[i].nombre_organizacion + '</h4>' +
                                '<p>Usuario Propietario:</p>' +
                                '<p>' + perfiles[i].nombre_usuario + '</p>' +
                                '<input type="hidden" id="id" name="id" value='+perfiles[i].id_contacto+'/>' +
                                '</div>' +
                            '</div>' +
                            '<hr style="margin-left:140px"/>' +
                            '</div>'+
                        '</a>'+
                         '<div class="modal" id="Modal" tabindex="-1" role="dialog">'+
                               ' <div class="modal-dialog" role="document">'+
                                    '<div class="modal-content">'+
                                        '<div class="modal-header">'+
                                            '<h5 class="modal-title">Gestión de Solicitud</h5>'+
                                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                                '<span aria-hidden="true">&times;</span>'+
                                            '</button>'+
                                        '</div>'+
                                        '<div class="modal-body">'+
                                            '<p>¿Qué desea hacer con esta solicitud?</p>'+
                                        '</div>'+
                                        '<div class="modal-footer">'+
                                            '<button type="button" id="aceptar" onclick="javascript:(function() { $.ajax({type:\'GET\',url: \'aceptarSolicitud.php\',data: {\'id_contacto\':'+perfiles[i].id_contacto+'},success:function(){window.location.href = \'nuevas-solicitudes.php\';}}); })()" class="btn btn-primary">Aceptar</button>'+
                                            '<button type="button" id="rechazar" onclick="javascript:(function() { $.ajax({type:\'GET\',url: \'rechazarSolicitud.php\',data: {\'id_contacto\':'+perfiles[i].id_contacto+'},success:function(){window.location.href = \'nuevas-solicitudes.php\';}}); })()" class="btn btn-secondary">Rechazar</button>'+

                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div> '
                        );

            }
        }else{
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