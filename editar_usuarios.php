<?php
$titulo = 'Edición de Cuenta';
session_start();
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/navbar_panel_de_control.inc.php';
include_once 'Errores.inc.php';

if (isset($_SESSION['user_id'])) {
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
                        <form  name="formulario_editar" id="editar_usuarios" role="form" method="post" action="actualizacion_de_un_usuario.php" target="formDestination" >


                            <div class="group">
                                <input  id="nombre_usuario" type="text" onkeyup="escribiendoUsuario()" required name="nombre_usuario">
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
                                <input id="correo" type="email" required="" onkeyup="escribiendoEmail()" name="correo">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Correo</label>
                            </div>

                <!-- <div class="group">                            <input id="contrasena" type="password" required="" name="contrasena" >
                     <span class="highlight"></span>
                     <span class="bar"></span>
                     <label >Contraseña</label>
                 </div>-->
                            <!-- CUADRO MODAL DE ELIMINACION DE UN USUARIO-->
                            <iframe class="oculto"  name="formDestination"></iframe>
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
                                            <p><?php print (ERROR24) ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="id_eliminar" class="btn btn-primary">Sí, borrar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--modal de insercion-->
                            <div class="modal" id="Modal1" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><span class="glyphicon glyphicon-user"></span> Actualizar Usuario.</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><?php print (ERROR13) ?></p>
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
                    '<h5 class="modal-title"><span class="glyphicon glyphicon-remove-circle"></span> Error al actualizar el usuario</h5>' +
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
                    mostrarError(document.formulario_editar.nombre_usuario, <?php print json_encode(ERROR30); ?>);



                } else
                    $('#nombre_usuario').css("color", "black");
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
                    mostrarError(document.formulario_editar.correo,<?php print json_encode(ERROR31); ?>);


                } else
                    $('#correo').css("color", "black");
            });
        }

        function validarFormulario() {

            var error_nomUsuario = false;
            var error_nomPropio = false;
            var error_correo = false;
            var error_contrasena = false;
            if (document.formulario_editar.nombre_usuario.value === "") {
                error_nomUsuario = true;
                mostrarError(document.formulario_editar.nombre_usuario, <?php print json_encode(ERROR10); ?>);
                return;

            }


            if (document.formulario_editar.nombre_propio.value === "") {
                error_nomPropio = true;
                $("#Modal3").modal("show");
                mostrarError(document.formulario_editar.nombre_propio, <?php print json_encode(ERROR11); ?>);
                return;
            }
            if (document.formulario_editar.correo.value === "") {
                error_correo = true;
                $("#Modal3").modal("show");
                mostrarError(document.formulario_editar.correo,"");
                return;
            } else {
                if (!document.formulario_editar.correo.value.includes("@") || !document.formulario_editar.correo.value.includes(".")) {
                    error_correo = true;
                    $("#Modal3").modal("show");
                    mostrarError(document.formulario_editar.correo, <?php print json_encode(ERROR4); ?>);
                    return;
                }
            }
            /*
             if (document.formulario_editar.contrasena.value === "") {
             error_contrasena = true;
             alert("Debe ingresar una contraseña");
             document.formulario_editar.contrasena.focus();
             return;
             }*/

            if (error_nomUsuario === false &&
                    error_nomPropio === false &&
                    error_correo === false
                    //error_contrasena === false
                    )
            {
                document.formulario_editar.submit();

                $("#Modal1").modal('show');

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
                data: {'id_usuario':<?php echo $_GET['usuario'] ?>}
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
                //   alert('Usuario Actualizado con exito');
                //window.location.href = 'mostrar_usuarios.php';
            });
        }
    </script>



    <script>
        document.getElementById("id_eliminar").onclick = function () {
            if (document.formulario_editar.id_usuario.value == 1) {
                mostrarError(document.formulario_editar.id_eliminar, "No se puede eliminar el usuario administrador.");


            } else {
                    myFunction();
                }
            /*else {
               
                if (document.formulario_editar.id_usuario.value == <?php  echo isset($_SESSION['user_id']) ?>) {
                    myFunction();
                    session_unset();
                    session_destroy();
    
                } else {
                    myFunction();
                }

            }*/

        };

        function myFunction() {
            $.ajax({
                type: "POST",
                url: "eliminacion_de_un_usuario.php",
                data: {'id_usuario':<?php echo $_GET['usuario'] ?>}
            });

            window.location.href = 'cerrarSessionLogin.php';
        }
    </script>



    <?php
    include_once 'plantillas/documento-cierre.inc.php';
    ?>

    <?php
} else {
    header('Location: /webaeo');
}