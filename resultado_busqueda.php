<?php
    include_once 'ConexionABaseDeDatos.php';
    include_once 'plantillas/buscador.inc.php';
    include_once 'plantillas/documento-inicio.inc.php';
    include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
?>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

  <div id="encabezado_lista_contactos" class="container responsive"   class="form-control"><br><h4 class="text-center" id="nombreCategoria">Resultado de búsqueda</h4></div>
  <br/>

  <div class="container responsive" id="contenedor_perfiles">
      <div class="row" style="margin-top: 10px;" id="fila">
         <script>
            $(document).on("ready", function(){ loadData(); });
                var loadData = function(){
                          $.ajax({
                              type:"POST",
                              url:"buscar.php",
                              data: {'busqueda':'<?php echo $_GET['busqueda']?>','region':"<?php echo $_GET['region']?>",'categoria':"<?php echo $_GET['categoria']?>"}
                            }).done(function(data){

                                var perfiles = JSON.parse(data);
                                for (var i in perfiles){
                                    $("#fila").append('<a href="PerfilOrganizacion.php?id_contacto='+perfiles[i].id_contacto+'"><div class = "col-md-12">' +
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
