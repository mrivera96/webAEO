<?php

$titulo = 'Formulario de Registro';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/navbar_panel_de_control.inc.php';
?>

<script src="js/jquery-2.2.4.min.js"></script> 




<div class="container">
    <div class="row">
      
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 40px">
                    <h3 class="panel-title">
                      <span class="glyphicon glyphicon-pencil"></span>  Formulario de Registro
                    </h3>
                </div>
                <div class="panel-body">
                    <form id="editar_usuarios" method="post"action="insercion_de_usuario.php" >
                <div class="group">
                    <input  id="nombre_usuario" type="text" required name="nombre_usuario">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Nombre de Usuario</label>
                </div>
                <div class="group">
                    <input id="nombre_propio" type="text" required name="nombre_propio">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Nombre Propio</label>
                </div>
                <div class="group">
                    <input id="correo" type="email"required name="correo">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Correo</label>
                </div>
                <div class="group">
                    <input id="contrasena" type="password" required name="contrasena" >
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label >Contraseña</label>
                </div>

                <select name="rol" class="form-control" id="id_rol_usuario">
                </select>
                <br>
                <button class="form-control" type="submit"  name="Submit"  style="width:100%; background-color:#005662; color:white;">  <span class="glyphicon glyphicon-floppy-disk"></span>  Guardar</button>



            </form>

                </div>
            </div>   
        </div>
    </div>

</div>

    <script>
        $("#editar_usuarios").submit(function () {

            alert('Usuario Insertado Con exito');
            window.location.href = 'mostrar_usuarios.php';


        });
    </script>


    <script>

        $.ajax({
            type: "GET",
            url: "consultar_los_roles.php"
        }).done(function (data) {
            var roles = JSON.parse(data);

            for (var i in roles) {
                $("#id_rol_usuario").append('<option>' + roles[i].id_rol + ' - ' + roles[i].descripcion_rol + '</option>');
            }
        });
    </script>
    
    
    

    <?php

    
    include_once 'plantillas/documento-cierre.inc.php';
    ?>