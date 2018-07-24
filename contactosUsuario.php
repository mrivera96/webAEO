<?php
$titulo = 'Contactos';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
?>

<head>
    <link href="css/estilos_melvin.css" rel="stylesheet">
</head>

<script src="js/jquery-2.2.4.min.js"></script>

  <div class="container" id="contenedor_perfiles">
      <div class="row" style="margin-top: 10px;" id="contenedorContacto">
         
          </div>
          
            
      </div>
      
      <a href="#" class="float">  
          <i class="glyphicon glyphicon-plus my-float"></i>
      </a>
      
  </div>

<script>
    $(document).on("ready", function () {
    loadData();
});
var loadData = function () {
    $.ajax({
        type: "post",
        url: "consultarOrganizacionesUsuarioLogeados.php",
         data: {'id_usuario':<?php echo $_SESSION['user_id']?>} 
    }).done(function (data) {

        var contacto = JSON.parse(data);
        var imagen;

        var estado;
        var id;
       
        for (var i in contacto) {
            if (contacto[i].imagen !== "") {
                imagen = contacto[i].imagen;
            } else {
                imagen = "https://cdn.icon-icons.com/icons2/37/PNG/512/contacts_3695.png";
            }
            if(contacto[i].id_estado == 1 ) {
                estado = "Pendiente";    
            }else{
                estado = "Aprobado";
            }
            

            $("#contenedorContacto").append(
                    '<a class="enlaces_de_listas_contactos" href="editar-perfil.php?contacto=' + contacto[i].id_contacto + '"><div class = "col-md-4 col-sm-6">' +
                    '<div class="media">' +
                    '<div class="media-left">' +
                    '<img style="width:130px ; heigh:130px ;"  class="media-object img-circle circle-img" src=' + imagen + '> ' +
                    '</div>' +
                    '<div class="media-body">' +
                    '<h4 class = "media-heading">' + contacto[i].nombre_organizacion + '</h4>' +
                    '<p>Estado del Contacto:</p>' +
                    '<p>' + estado+ '</p>' +
                    '</div>' +
                    '</div>' +
                    '<hr style="margin-left:140px"/>' +
                    '</div>' +
                    '</a>'
                    );
        }
    });
};
</script>
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>

