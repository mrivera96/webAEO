<?php
$titulo = 'Edición de Cuenta';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
?>

<script src="js/jquery_sin_datos.min.js"></script> 


<div class="container">
    <div class="row">
      
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 40px">
                    <h3 class="panel-title">
                        Edición de Cuenta 
                    </h3>
                </div>
                <div class="panel-body">
                    <form id="editar_usuarios" method="post"action="actualizacion_de_un_usuario.php " >
                <div class="group">
                    <input  id="nombre_usuario" type="text" required name="nombre_usuario">
                    <input id="id_usuario" type="hidden" name="id_usuario"  >
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Nombre de Usuario</label>
                </div>
                <div class="group">
                    <input id="nombre_propio" type="text" required="" name="nombre_propio">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Nombre Propio</label>
                </div>
                <div class="group">
                    <input id="correo" type="email" required="" name="correo">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Correo</label>
                </div>
                <div class="group">
                    <input id="contrasena" type="password" required="" name="contrasena" >
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label >Contraseña</label>
                </div>
                <button type="submit"  name="Submit"   class="btn btn-primary btn-lg btn-block" >Editar</button>
                <button type="button" id="id_eliminar"  class="btn btn-default btn-lg btn-block"   >Eliminar</button>
            </form>

                </div>
            </div>   
        </div>
    </div>

</div>
<script>
    $(document).on("ready", function () {
        loadData();
    });
    var loadData = function ()
    {
        console.log("vamos pues");
        $.ajax({
            type: "GET",
            url: "Mostar_Los_Usuarios_Editados.php",
            data: {'id_usuario':<?php echo $_GET['id_usuario'] ?>}
        }).done(function (data)
        {
            console.log(data);
            var editar = JSON.parse(data);
            for (var i in editar) {


                $("#nombre_usuario").attr('value', editar[i].nombre_usuario);
                $("#nombre_propio").attr('value', editar[i].nombre_propio);
                $("#correo").attr('value', editar[i].correo);
                $("#contrasena").attr('value', editar[i].contrasena);
                $("#id_usuario").attr('value', editar[i].id_usuario);

            }
        });
    }
</script>



<script>
    document.getElementById("id_eliminar").onclick = function () {
        myFunction()
    };
    function myFunction() {

        $.ajax({
            type: "POST",
            url: "eliminacion_de_un_usuario.php",
            data: {'id_usuario':<?php echo $_GET['id_usuario'] ?>}
        });

        alert('Usuario Eliminado');
        window.location.href = 'mostrar_usuarios.php';
    }
</script>



<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
