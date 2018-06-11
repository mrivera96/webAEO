<?php
    
    include_once 'plantillas/documento-inicio.inc.php';
    include_once 'plantillas/barra-de-navegacion-navbar.inc.php';

?>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
      
  <div id="encabezado_lista_contactos" class="container responsive"  ><h4 id="nombreCategoria">Nombre de categoría</h4></div>
  <br/>

  <div class="container responsive" id="contenedor_perfiles">
      <div class="row" style="margin-top: 10px;" id="fila">
         <script>
            $(document).on("ready", function(){ loadData(); });
                var loadData = function(){
                          $.ajax({
                              type:"GET",
                              url:"listarPerfiles.php",
                              data: {'id_categoria':'3'}
                            }).done(function(data){

                                var perfiles = JSON.parse(data);
                                for (var i in perfiles){
                                    $("#fila").append('<a href="#"><div class = "col-md-12">' +
                                              '<div class="media">' +
                                              '<div class="media-left">' +
                                              '<img style="width:130px ; heigh:130px ;"  class="media-object img-circle" src='+ perfiles[i].imagen+'> ' +
                                              '</div>' +
                                              '<div class="media-body">' +
                                              '<h3 class = "media-heading">' + perfiles[i].nombre_organizacion + '</h3>' +
                                              '<p>' + perfiles[i].numero_fijo + '</p>' +
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