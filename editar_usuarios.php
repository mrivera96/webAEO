<?php
$titulo = 'Edición de Cuenta';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/navbar_panel_de_control.inc.php';
?>

<script src="js/jquery-2.2.4.min.js"></script> 
<link href="css/estilos_alan.css" rel="stylesheet">

<div class="container">
    <div class="row">

        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div   class="panel-heading" style="height: 40px">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-edit"></span>  Edición de Cuenta 
                    </h3>
                </div>
                <div class="panel-body">
                    <form  name="formulario_editar" id="editar_usuarios" role="form" method="post" action="actualizacion_de_un_usuario.php"  >
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

                        <button  type="button" onclick="validarFormulario()" id="btn" class="form-control"  name="Submit" style="width:100%; background-color:#005662; color:white;"> <span class="glyphicon glyphicon-floppy-disk"></span>  Guardar</button>
                        <br>
                        <button class="form-control btn btn-danger " data-toggle="modal"  data-target="#Modal" type="button"  style="width:100%;  color:white;"> <span class="glyphicon glyphicon-trash"></span>  Eliminar Usuario</button>

                        <div class="modal" id="Modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Eliminar Usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Eliminará el usuario¿Desea continuar?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="id_eliminar" class="btn btn-primary">Sí, borrar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>   
        </div>
    </div>

</div>


<script>

    function validarFormulario() {

        var error_nomUsuario = false;
        var error_nomPropio = false;
        var error_correo = false;
        var error_contrasena = false;
        if (document.formulario_editar.nombre_usuario.value === "") {
            error_nomUsuario = true;
            alert("Debe ingresar un nombre de usuario");
            document.formulario_editar.nombre_usuario.focus();
            return;
        }


        if (document.formulario_editar.nombre_propio.value === "") {
            error_nomPropio = true;
            alert("Debe ingresar un nombre propio");
            document.formulario_editar.nombre_propio.focus();
            return;
        }
        if (document.formulario_editar.correo.value === "") {
            error_correo = true;
            alert("Debe ingresar un correo");
            document.formulario_editar.correo.focus();
            return;
        } else {
            if (!document.formulario_editar.correo.value.includes("@") || !document.formulario_editar.correo.value.includes(".")) {
                error_correo = true;
                alert("Debes colocar una \"Dirección de Email\" válida");
                document.formulario_editar.correo.focus(); //Esto recorna el cursor al campo "Email"
                return;
            }
        }

        if (document.formulario_editar.contrasena.value === "") {
            error_contrasena = true;
            alert("Debe ingresar una contraseña");
            document.formulario_editar.contrasena.focus();
            return;
        }

        if (error_nomUsuario === false &&
                error_nomPropio === false &&
                error_correo === false &&
                error_contrasena === false
                )
        {
            document.formulario_editar.submit();
            alert('Usuario Actualizado con exito');
            windown.location.href = 'mostrar_usuarios.php';
            return;
        }


    }


</script>





<script>
    $(document).on("ready", function () {
        loadData();
    });
    var loadData = function ()
    {

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
              //  $("#contrasena").attr('value', editar[i].contrasena);
                $("#id_usuario").attr('value', editar[i].id_usuario);
            }
        });
        $("#editar_usuarios").submit(function () {
            alert('Usuario Actualizado con exito');
            window.location.href = 'mostrar_usuarios.php';
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
