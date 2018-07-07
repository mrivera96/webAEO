
$(document).on("ready", function(){ loadData(); });

var loadData = function(){
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
    
    var id_contacto = $_GET('id_contacto');
    

        $.ajax({
            type: "GET",
            url: "consultarRegiones.php"
        }).done(function (data) {
            var regiones = JSON.parse(data);

            for (var i in regiones) {
                $("#region").append('<option value="' + regiones[i].id_region +'">' + regiones[i].nombre_region + '</option>');
            }
        });

        $.ajax({
            type: "GET",
            url: "consultarCategorias.php"
        }).done(function (data) {
            var categorias = JSON.parse(data);

            for (var i in categorias) {
                $("#categoria").append('<option value="' + categorias[i].id_categoria +' "> ' + categorias[i].nombre_categoria + '</option>');
            }
        });
        $.ajax({
            type: "GET",
            url: "ConsultarTodosLosUsuarios.php"
        }).done(function (data) {
            var usuarios = JSON.parse(data);

            for (var i in usuarios) {
                $("#usuario").append('<option value="' + usuarios[i].id_usuario +'">' + usuarios[i].nombre_usuario + '</option>');
            }
        }); 

};




