<?php
$titulo = 'Formulario de  Registro';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
include 'Errores.inc.php';
?>

<head>
    <link href="css/estilos_alan.css" rel="stylesheet">
</head>

<h3 align="center">Registrar</h3><br>

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div  class="panel-heading" style="height: 40px">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-pencil"></span>  Nuevo Usuario
                    </h3>
                </div>
                <div class="panel-body">
                    <form name="formulario" role="form" id="editar_usuarios"  method="post"style="padding-top: 15px"action="insertarUsuarioCliente.php" target="formDestination" >

                        <div class="group">
                            <input id="nombre_propio" type="text" required name="nombre_propio">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Nombre Propio</label>
                        </div>
                        <div class="group">
                            <input name="nombre_usuario" id="nombre_usuario" onkeyup="escribiendoUsuario()" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ_-]*$|" title="No se permiten espacios" required type="text">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Nombre de Usuario</label>
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
                        <div class="group">
                            <input id="correo" onkeyup="escribiendoEmail()"type="email"required name="correo">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Correo</label>
                        </div>
                        <iframe class="oculto"  name="formDestination"></iframe>

                        <br>
                        <button type="button" onclick="validarFormulario()" id="btn" class="form-control"   name="Submit"  style="width:100%; background-color:#005662; color:white;">  <span class="glyphicon glyphicon-floppy-disk"></span>  Guardar</button>


                        <div class="modal" id="Modal1" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><span class="glyphicon glyphicon-user"></span> Crear Usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>El Usuario se ha creado con éxito.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onClick="javascript:(function () {
                                                    window.location.href = 'login.php';
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
                '<h5 class="modal-title"><span class="glyphicon glyphicon-remove-circle"></span> Error al ingresar un usuario.</h5>' +
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

    function escribiendoUsuario() {
        $.ajax({
            type: "GET",

            url: "verificar_usuario.php?nombre_usuario=" + $('#nombre_usuario').val(),
        }).done(function (data) {
            console.log(data);
            if (data == 1) {
                $('#nombre_usuario').css("color", "red");
                // mostrarErrorto(document.formulario.nombre_usuario, "error no .");
                mostrarError(document.formulario.nombre_usuario, "Este nombre de usuario ya existe \" Ingrese un usuario valido\"");



            } else
                $('#nombre_usuario').css("color", "black");
            // mostrarError(document.formulario.nombre_usuario, "Nombre de usuario valido.");


        });
    }

    function escribiendoEmail() {
        $.ajax({
            type: "GET",

            url: "verificar_email.php?correo=" + $('#correo').val(),
        }).done(function (data) {
            console.log(data);
            if (data == 1) {
                $('#correo').css("color", "red");
                mostrarError(document.formulario.correo, "Este e-mail ya existe \" Ingrese un e-mail valido\"");



            } else
                $('#correo').css("color", "black");

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
            mostrarError(document.formulario.nombre_usuario, <?php print json_encode(ERROR10); ?>);
            return;
        }

        if (document.formulario.nombre_propio.value === "") {
            error_nomPropio = true;
            $("#Modal3").modal("show");
            mostrarError(document.formulario.nombre_propio,<?php print json_encode(ERROR11); ?>);
            return;
        }
        if (document.formulario.correo.value === "") {
            error_correo = true;
            $("#Modal3").modal("show");
            mostrarError(document.formulario.correo, <?php print json_encode(ERROR32); ?>);
            return;
        } else {
            if (!document.formulario.correo.value.includes("@") || !document.formulario.correo.value.includes(".")) {
                error_correo = true;
                $("#Modal3").modal("show");
                mostrarError(document.formulario.correo, <?php print json_encode(ERROR12); ?>);
                return;
            }
        }

        if (document.formulario.contrasena.value === "") {
            error_contrasena = true;
            $("#Modal3").modal("show");
            mostrarError(document.formulario.contrasena, <?php print json_encode(ERROR25); ?>);
            return;
        }

        if (document.formulario.contrasena1.value === "") {
            error_contrasena = true;
            $("#Modal3").modal("show");
            mostrarError(document.formulario.contrasena1, <?php print json_encode(ERROR27); ?>);
            return;
        } else {
            if (document.formulario.contrasena.value !== document.formulario.contrasena1.value) {
                error_contrasena1 = true;
                $("#Modal3").modal("show");
                mostrarError(document.formulario.contrasena1, <?php print json_encode(ERROR28); ?>);


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



<?php
include_once 'plantillas/documento-cierre.inc.php';
?>


