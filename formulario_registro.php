<?php

$titulo = 'Formulario de Registro';
session_start();
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/navbar_panel_de_control.inc.php';
include_once 'Errores.inc.php';
  if (isset($_SESSION['user_id'])&&($_SESSION['normal'] == 1) && ($_SESSION['actividad'] == 1)) {
    ?>


    <script src="js/jquery-2.2.4.min.js"></script> 
    <link href="css/estilos_alan.css" rel="stylesheet">

    <div class="container" >
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default ">
                    <div  class="panel-heading" style="height: 40px ">
                        <h3 class="panel-title">
                            <span class="glyphicon glyphicon-pencil"></span>  Nuevo Usuario
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form name="formulario" role="form" id="editar_usuarios"  method="post"style="padding-top: 15px"action="insercion_de_usuario.php" target="formDestination" >
                            <div class="group">
                                <input  id="nombre_usuario" type="text"   onkeyup="escribiendoUsuario()" required name="usuarionombre">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nombre de Usuario</label>
                            </div>
                            <div class="group">
                                <input id="nombre_propio" type="text" required name="usuariopropio">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nombre Propio</label>
                            </div>
                            <div class="group">
                                <input id="correo" onkeyup="escribiendoEmail()"type="email"required name="usuarioemail">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Correo</label>
                            </div>
                            <div class="group">
                                <input id="contrasena" type="password" required name="usariopassword" >
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label >Contraseña</label>
                            </div>

                            <div class="group">
                                <input id="contrasena1" type="password" required name="usariopassword1" >
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Repite la Contraseña</label>
                            </div>
                            <iframe class="oculto"  name="formDestination"></iframe>
                            <select name="usuariosroles" class="form-control" id="id_rol_usuario">
                            </select>
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
                                            <p><?php print (ERROR34) ?></p>
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

                url: "verificar_usuario.php?verificausu=" + $('#nombre_usuario').val(),
            }).done(function (data) {
                console.log(data);
                if (data == 1) {
                    $('#nombre_usuario').css("color", "red");
                    mostrarError(document.formulario.usuarionombre, <?php print json_encode(ERROR30); ?>);
                 


                } else
                    $('#nombre_usuario').css("color", "black");


            });
        }

        function escribiendoEmail() {
            $.ajax({
                type: "GET",

                url: "verificar_email.php?verificaemail=" + $('#correo').val(),
            }).done(function (data) {
                console.log(data);
                if (data == 1) {
                    $('#correo').css("color", "red");
                    mostrarError(document.formulario.usuarioemail,<?php print json_encode(ERROR31); ?>);



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

            if (document.formulario.usuarionombre.value === "") {
                error_nomUsuario = true;
                mostrarError(document.formulario.usuarionombre,<?php print json_encode(ERROR10); ?>);
                return;
            }

            if (document.formulario.usuariopropio.value === "") {
                error_nomPropio = true;
                $("#Modal3").modal("show");
                mostrarError(document.formulario.usuariopropio,<?php print json_encode(ERROR11); ?>);
                return;
            }
            if (document.formulario.usuarioemail.value === "") {
                error_correo = true;
                $("#Modal3").modal("show");
                mostrarError(document.formulario.usuarioemail,<?php print json_encode(ERROR32); ?>);
                return;
            } else {
                if (!document.formulario.usuarioemail.value.includes("@") || !document.formulario.usuarioemail.value.includes(".")) {
                    error_correo = true;
                    $("#Modal3").modal("show");
                    mostrarError(document.formulario.usuarioemail, <?php print json_encode(ERROR4); ?>);
                    return;
                }
            }

            if (document.formulario.usariopassword.value === "") {
                error_contrasena = true;
                $("#Modal3").modal("show");
                mostrarError(document.formulario.usariopassword, <?php print json_encode(ERROR25); ?>);
                return;
            }

            if (document.formulario.usariopassword1.value === "") {
                error_contrasena = true;
                $("#Modal3").modal("show");
                mostrarError(document.formulario.usariopassword1, <?php print json_encode(ERROR27); ?>);
                return;
            } else {
                if (document.formulario.usariopassword.value !== document.formulario.usariopassword1.value) {
                    error_contrasena1 = true;
                    $("#Modal3").modal("show");
                    mostrarError(document.formulario.usariopassword1, <?php print json_encode(ERROR28); ?>);

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

    <?php

} else {
    header('Location: /webaeo');
}