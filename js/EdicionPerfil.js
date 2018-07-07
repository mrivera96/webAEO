
$(document).on("ready", function(){ loadData(); });
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
var loadData = function(){
    
    
    var id_contacto = $_GET('contacto');
    $.ajax({
         type:"GET",
         url:"consultarDatosDePerfilParaEditar.php",
         data: {'contacto':id_contacto} 
    }).done(function(data){

        var perfiles = JSON.parse(data);
        var imagen;
                          
        for (var i in perfiles["perfiles"]) {
            if (perfiles["perfiles"][i].imagen !== "") {
                imagen = perfiles["perfiles"][i].imagen;
            } else {
                imagen = "https://cdn.icon-icons.com/icons2/37/PNG/512/contacts_3695.png";
            }
            ;

            $("#imganenOrg").attr("src", imagen);
            $("#nombreOrg").attr("value", perfiles["perfiles"][i].nombre_organizacion);
            $("#numtelOrg").attr("value", perfiles["perfiles"][i].numero_fijo);
            $("#numcelOrg").attr("value", perfiles["perfiles"][i].numero_movil);
            $("#dirOrg").attr("value", perfiles["perfiles"][i].direccion);
            $("#emailOrg").attr("value", perfiles["perfiles"][i].e_mail);
            $("#descOrg").attr("value", perfiles["perfiles"][i].descripcion_organizacion);
            $("#latOrg").attr("value", perfiles["perfiles"][i].latitud);
            $("#longOrg").attr("value", perfiles["perfiles"][i].longitud);       
        }

        $.ajax({
            type: "GET",
            url: "consultarRegiones.php"
        }).done(function (data) {
            var regiones = JSON.parse(data);

            for (var i in regiones) {
                $("#region").append('<option class="form-control" value="' + regiones[i].id_region +'">' + regiones[i].nombre_region + '</option>');
            }
        });

        $.ajax({
            type: "GET",
            url: "consultarCategorias.php"
        }).done(function (data) {
            var categorias = JSON.parse(data);

            for (var i in categorias) {
                $("#categoria").append('<option class="form-control" value="'+ categorias[i].id_categoria + '">'+ categorias[i].nombre_categoria + '</option>');
            }
        });

    });

};



document.getElementById("eliminar").onclick = function () {
        eliminarPerfil()
    };
    
    function eliminarPerfil() {
        $.ajax({
            type: "GET",
            url: "eliminarPerfil.php",
            data: {'id_contacto': $_GET('id_contacto')}
        });
        alert('Perfil eliminado');
        window.location.href = 'administracion-de-perfiles.php';
    }
    

