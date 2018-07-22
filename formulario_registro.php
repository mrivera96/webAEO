<?php

$titulo = 'Formulario de Registro';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/navbar_panel_de_control.inc.php';
?>

<script src="js/jquery-2.2.4.min.js"></script> 
<link href="css/estilos_alan.css" rel="stylesheet">





<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div  class="panel-heading" style="height: 40px">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-pencil"></span>  Formulario de Registro
                    </h3>
                </div>
                <div class="panel-body">
                    <form name="formulario" role="form" id="editar_usuarios"  method="post"tyle="padding-top: 15px"action="insercion_de_usuario.php" target="formDestination" >
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

                        <div class="group">
                            <input id="contrasena1" type="password" required name="contrasena1" >
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Repite la Contraseña</label>
                        </div>
                        <iframe class="oculto"  name="formDestination"></iframe>
                        <select name="rol" class="form-control" id="id_rol_usuario">
                        </select>
                        <br>
                        <button type="button" onclick="validarFormulario()" id="btn" class="form-control"   name="Submit"  style="width:100%; background-color:#005662; color:white;">  <span class="glyphicon glyphicon-floppy-disk"></span>  Guardar</button>


                        <div class="modal" id="Modal1" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Inserción de Usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>El Usuario se ha ingresado con éxito.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onClick="javascript:(function () {
                                                    window.location.href = 'mostrar_usuarios.php';
                                                })()">Aceptar</button>

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
    function mostrarError(componente, error) {

        $("#editar_usuarios").append('<div class="modal" id="Modal3" tabindex="-1" role="dialog">' +
                '<div class="modal-dialog" role="document">' +
                '<div class="modal-content">' +
                '<div class="modal-header">' +
                '<h5 class="modal-title">Error al ingresar un usuario</h5>' +
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '</div>' +
                ' <div class="modal-body">' +
                '<p>' + error + '</p>' +
                '</div>' +
                '<div class="modal-footer">' +
                '<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>');
        $("#Modal3").modal("show");
        $('#Modal3').on('hidden.bs.modal', function () {
            componente.focus();
            $("#Modal3").detach();
        });

    }

    function validarFormulario() {

        var error_nomUsuario = false;
        var error_nomPropio = false;
        var error_correo = false;
        var error_contrasena = false;
        var error_contrasena1 = false;

        if (document.formulario.nombre_usuario.value === "") {
            error_nomUsuario = true;
            mostrarError(document.formulario.nombre_usuario, "Debe ingresar un nombre de usuario.");
            return;
        } /*else {
         var usuario ;
         $.ajax({
         type: "GET",
         url: "verificar_usuario.php"
         }).done(function (data) {
         if (data = 1) {
         usuario=1;
         
         }
         });
         if(usuario=1){
         error_nomUsuario = true;
         alert("Este nombre de usuario ya esta en uso");
         
         }
         
         }*/


        if (document.formulario.nombre_propio.value === "") {
            error_nomPropio = true;
            $("#Modal3").modal("show");
            mostrarError(document.formulario.nombre_propio, "Debe ingresar un nombre propio");
            return;
        }
        if (document.formulario.correo.value === "") {
            error_correo = true;
            $("#Modal3").modal("show");
            mostrarError(document.formulario.correo, "Debe ingresar un correo");
            return;
        } else {
            if (!document.formulario.correo.value.includes("@") || !document.formulario.correo.value.includes(".")) {
                error_correo = true;
                $("#Modal3").modal("show");
                mostrarError(document.formulario.correo, "Debes colocar una \"Dirección de Email\" válida");
                return;
            }
        }

        if (document.formulario.contrasena.value === "") {
            error_contrasena = true;
            $("#Modal3").modal("show");
            mostrarError(document.formulario.contrasena, "Debe ingresar una contraseña");
            return;
        }

        if (document.formulario.contrasena1.value === "") {
            error_contrasena = true;
            $("#Modal3").modal("show");
            mostrarError(document.formulario.contrasena1, "Porfavor repita su contraseña");
            return;
        } else {
            if (document.formulario.contrasena.value !== document.formulario.contrasena1.value) {
                error_contrasena1 = true;
                $("#Modal3").modal("show");
                mostrarError(document.formulario.contrasena1, "Ambas contraseñas deben de coincidir..");


            }
        }

        if (error_nomUsuario === false &&
                error_nomPropio === false &&
                error_correo === false &&
                error_contrasena === false &&
                error_contrasena1 === false) {
            document.formulario.submit();
            $("#Modal1").modal('show');

            return;


        }


    }


</script>





<script>

    $.ajax({
        type: "GET",
        url: "consultar_los_roles.php"
    }).done(function (data) {
        var roles = JSON.parse(data);

        for (var i in roles) {
            $("#id_rol_usuario").append('<option value="' + roles[i].id_rol + '"> ' + roles[i].descripcion_rol + '</option >');
        }
    });
</script>


<?php

include_once 'plantillas/documento-cierre.inc.php';
?>