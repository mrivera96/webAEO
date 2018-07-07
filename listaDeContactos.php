<?php  
    include_once 'plantillas/documento-inicio.inc.php';
    include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
    include_once 'plantillas/buscador.inc.php';
?>
<script
    src="js/jquery-2.2.4.min.js"
    ></script> 
  <br/>
      <head><link href="css/estilos_melvin.css" rel="stylesheet"></head>
  <div id="encabezado_lista_contactos" class="container"><h4 id="nombreCategoria"><?php echo $_GET['nombre_categoria'] ?></h4></div>
  

  <div class="container responsive" id="contenedor_perfiles">
      <div class="row" style="margin-top: 10px;" id="fila">
         <script>
             
             
            $(document).on("ready", function(){ loadData(); });
                var loadData = function(){
                          $.ajax({
                              
                              type:"get",
                              url:"listarPerfiles.php",
                              data: {'categoria':<?php echo $_GET['id_categoria']?>}
                            }).done(function(data){

                                var perfiles = JSON.parse(data);
                                var imagen;
                                var telefono;
                                
                                for (var i in perfiles){
                                    if(perfiles[i].imagen!=""){
                                        imagen=perfiles[i].imagen;
                                    }else{
                                        imagen="https://cdn.icon-icons.com/icons2/37/PNG/512/contacts_3695.png";
                                    };
                                    if(perfiles[i].numero_fijo!=""){
                                        telefono=perfiles[i].numero_fijo;
                                    }else{
                                        telefono=perfiles[i].numero_movil;
                                    };
                                    $("#fila").append('<a class="enlaces_de_listas_contactos" href="PerfilOrganizacion.php?id_contacto='+perfiles[i].id_contacto+'"><div class = "col-md-4 col-sm-6">' +
                                              '<div class="media-list">' +
                                              '<div class="media-left">' +
                                              '<img  class="media-object img-circle circle-img" src='+imagen+'> ' +
                                              '</div>' +
                                              '<div class="media-body">' +
                                              '<h4 class = "media-heading">' + perfiles[i].nombre_organizacion + '</h4>' +
                                              '<p>' + telefono + '</p>' +
                                              '<p>' + perfiles[i].nombre_region + '</p>' +
                                                  '</div>' +
                                                  '</div>' +
                                                  '<hr/>'+
                                                  '</div></a>'
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