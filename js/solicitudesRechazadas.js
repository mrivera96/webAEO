var search = document.getElementById("search"),
    food = document.getElementsByClassName("enlaces_de_listas_contactos"),
    forEach = Array.prototype.forEach;

search.addEventListener("keyup", function(e){
    var choice = this.value;

    forEach.call(food, function(f){
        if (f.innerHTML.toLowerCase().search(choice.toLowerCase()) == -1)
            f.style.display = "none";
        else
            f.style.display = "block";
    });
}, false);
$(document).on("ready", function () {
    loadData();
});
var loadData = function () {
    $.ajax({
        type: "post",
        url: "../WebServices/consultarPerfilesParaAdministracionPerfiles.php",
        data: {'ste': '3'},
        success:function (data){
             var perfiles = JSON.parse(data);
        if(perfiles!=="No hay resultados."){

            var imagen;


            for (var i in perfiles) {
                if (perfiles[i].imagen !== "") {
                    imagen = perfiles[i].imagen;
                } else {
                    imagen = "../imagenes/iconocontactowhite.png";
                }
                ;

                $("#fila").append(
                        '<a   id="solicitud"  class="enlaces_de_listas_contactos" ><div class = "col-md-4 col-sm-6">' +
                        '<div class="media">' +
                        '<div class="media-left">' +
                        '<img id="solicitudes" style="width:130px ; heigh:130px ;"  class="media-object img-circle circle-img" src=' + imagen + '> ' +
                        '</div>' +
                        '<div class="media-body">' +
                        '<h4 class = "media-heading">' + perfiles[i].nombre_organizacion + '</h4>' +
                        '<p>Usuario Propietario:</p>' +
                        '<p>' + perfiles[i].nombre_usuario + '</p>' +
                        '<input name="id" type="hidden" value='+perfiles[i].id_contacto+'>' +
                        '</div>' +
                        '</div>' +
                        '<hr style="margin-left:140px"/>' +
                        '</div>' +
                        '</a>'
                        );
            }
        }else{
            $("#fila").append(
                        '<div class="col-md-12 text-center">' +
                        '<img  style="width:130px ; heigh:130px ;"  class="img-circle circle-img" src="https://cdn4.iconfinder.com/data/icons/rounded-white-basic-ui/139/Warning01-RoundedWhite-512.png"> ' +
                        '</div>' +
                        '<div class="col-md-12 text-center">' +
                        '<h1>No hay solicitudes rechazadas</h1> ' +
                        '</div>'

                        );
        }
    }
    });
};
