<?php

$titulo = 'Usuarios';
session_start();
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/navbar_panel_de_control.inc.php';
 if (isset($_SESSION['user_id'])) {

?>

<script src="js/jquery-2.2.4.min.js"></script> 
<link href="css/estilos_alan.css" rel="stylesheet">



<div  id="contenedor_usuarios"class="container">
    <div class="row"  id="fila"  >
        <div class="panel panel-default">
            <div class="panel-heading" style="height: 40px">
                <div class="coll">
                    <h3 class="panel-title">
                     <span class="glyphicon glyphicon-user"></span>  Usuarios 
                    </h3>
                </div>
            </div>


            <script>
                $(document).on("ready", function () {
                    loadData();
                });
                var loadData = function () {
                    $.ajax({
                        type: "GET",
                        url: "ConsultarTodosLosUsuarios.php"
                    }).done(function (data) {
                        var usuarios = JSON.parse(data);
                        for (var i in usuarios) {
                            $("#fila").append('</div>' +
                                    '<a href="editar_usuarios.php?usuario=' + usuarios[i].id_usuario + '"><h3 id="colorUsuarios" ><strong>' + usuarios[i].nombre_usuario + '</strong></h3></a>' +
                                    '<a href="editar_usuarios.php?usuario=' + usuarios[i].id_usuario + '"><h4 id="colortipUsuario"><strong>' + usuarios[i].descripcion_rol+ '</strong></h4></a>' +
                                    '</button>' +
                                    '<hr id="disUsusarios">'
                                    );
                        }
                    });
                }
            </script>
        </div> 
    </div>   
</div>
</div>

<a  href="formulario_registro.php" class="float">
    <i class="glyphicon glyphicon-plus my-float"></i>
</a>



<?php

include_once 'plantillas/documento-cierre.inc.php';
?>


<?php
   } else {
       header('Location: /webaeo');
    }