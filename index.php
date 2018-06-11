<?php
$titulo = 'Agenda Electrónica Oriental';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
include_once 'plantillas/buscador.inc.php';

?>
<script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous"></script> 


<div id="estilo-contenedor-textocategoria"  class="container">
    <h3><strong>Categorias</strong></h3> 
</div>


<!--Contenedor de tarjetas-->

<div     id="estilo-contenedor" class="container "  >
    <div class="row" style="margin-top: 10px;" id="fila"  >
        <script>
            $(document).on("ready", function(){ loadData(); });
            var loadData = function(){
            $.ajax({
            type:"GET",
                    url:"ParaSincronizarCategorias.php"
            }).done(function(data){
            var categorias = JSON.parse(data);
            for (var i in categorias){
            $("#fila").append('<div class = "col-sm-6 col-md-4">' +
                    '<a href="listaDeContactos.php?nombre_categoria=Emergencia"> <div  class="thumbnail" >' +
                    '<div  class="panel-heading" >' +
                    '<span aria-hidden="true"></span> <strong>' + categorias[i].nombre_categoria + '</strong>' +
                    '<h6>' + categorias[i].coun + ' Contactos</h6>' +
                    '</div> ' +
                    '<img  id="tamaño" src=' + categorias[i].imagen_categoria + '>'+
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

        </script>
       
    </div>
</div>

<?php

include_once 'plantillas/documento-cierre.inc.php';
?>



