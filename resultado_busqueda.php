<?php
    include_once 'ConexionABaseDeDatos.php';
    include_once 'plantillas/buscador.inc.php';
    include_once 'plantillas/documento-inicio.inc.php';
    include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
?>
<script
    src="js/jquery-2.2.4.min.js"
 ></script>

  <div id="encabezado_resultado" class="container responsive">
      <br><h4 class="text-center" id="nombreCategoria">Resultado de búsqueda</h4>
  </div>
  <br/>

  <div class="container responsive" id="contenedor_resultado">
      <div class="row" style="margin-top: 10px;" id="fila">
         <script>
            $(document).on("ready", function(){ loadData(); });
                var loadData = function(){
                          $.ajax({
                              type:"GET",
                              url:"buscar.php",
                              data: {'busqueda':'<?php echo $_GET['busqueda']?>','region':"<?php echo $_GET['region']?>",'categoria':"<?php echo $_GET['categoria']?>"}
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
                                    $("#fila").append('<a href="PerfilOrganizacion.php?id_contacto='+perfiles[i].id_contacto+'"><div class = "col-md-12">' +
                                              '<div class="media">' +
                                              '<div class="media-left">' +
                                              '<img style="width:130px ; heigh:130px ;"  class="media-object img-circle" src='+ imagen+'> ' +
                                              '</div>' +
                                              '<div class="media-body">' +
                                              '<h3 class = "media-heading">' + perfiles[i].nombre_organizacion + '</h3>' +
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
