<?php
$titulo = 'Agenda Electrónica Oriental';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
include_once 'plantillas/buscador.inc.php';   

?>
<script src="js/jquery-2.2.4.min.js" ></script> 
<link href="css/estilos_alan.css" rel="stylesheet">

<div id="estilo-contenedor-textocategoria"class="container">
    <div class="row"  id="fila"  >
        <div class="panel panel-default">
            <div class="panel-heading" style="height: 40px">
                <div class="coll">
                    <h3 class="panel-title">
                        <center><strong>Categorías</strong></center>
                    </h3>
                </div>
            </div>
            </div>
        </div>
    </div>



<!--Contenedor de tarjetas-->



<div     id="estilo-contenedor" class="container"  >
    <div class="row" style="margin-top: 10px;" id="fila"  >
        <script>
            $(document).on("ready", function () {
                loadData();
            });
            var loadData = function () {
                $.ajax({
                    type: "GET",
                    url: "ParaSincronizarCategorias.php",
                      data: {'id_estado': '2'}
                }).done(function (data) {
                    var categorias = JSON.parse(data);
                    for (var i in categorias) {
                        $("#fila").append('<div class = "col-sm-6 col-md-4">' +
                                '<a href="listaDeContactos.php?cty=' + categorias[i].id_categoria + '&&name_cty=' + categorias[i].nombre_categoria + '"><div id="panel_default" class="panel panel-default">' +
                                '<div  class="panel-heading" >' +
                                '<span aria-hidden="true"></span> <strong>' + categorias[i].nombre_categoria + '</strong>' +
                                '<h6>' + categorias[i].coun + ' Contactos</h6>' +
                                '</div> ' +
                                '<img class="img-responsive" alt="Responsive image" style="width:100%"  id="tamaño" src=' + categorias[i].imagen_categoria + '>' +
                                '</div></a>' +
                                '</div>'
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

        

