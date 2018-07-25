<?php
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
if (isset($_SESSION['user_id'])) {
    ?>
    <head>
        <link href="css/estiloLogin.css" rel="stylesheet">
        <link href="css/estilos_melvin.css" rel="stylesheet">
    </head>
    <div class="container">
        <br/>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading " style="height: 40px">

                        <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>   Edición de Perfil</h3>     
                    </div>

                    <div class="panel-body">
                        <form id="formularioEditar" name="formularioEditar" role="form" method="post" action="actualizarPerfil.php" target="formDestination">
                            <div class="form-group text-center">
                                <img style="width: 250px; height: 250px" class="img-circle img-circle" id="imganenOrg">
                            </div><br><br>


                            <div class="group" id="nombreDeOrg">   
                                <input  type="text" required name="nomborg_rec" id="nombreOrg">
                                <span id="lbNomb" class="highlight"></span>
                                <span class="bar"></span>
                                <label ><span class="glyphicon glyphicon-credit-card"></span> Nombre de Organización</label>
                            </div>

                            <div class="group">

                                <input class="input" type="tel" id="numtelOrg" name="numtel_rec">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><span class="glyphicon glyphicon-earphone"></span> Número fijo</label>
                            </div>


                            <div class="group">
                                <input class="input" type="tel" id="numcelOrg" name="numcel_rec">
                                <span class="highlight"></span>
                                <span class="barn"></span>
                                <label><span class="glyphicon glyphicon-phone"></span> Número móvil</label>
                            </div>


                            <div class="group">      
                                <input class="input" type="text" required id="dirOrg" name="direccion_rec">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><span class="glyphicon glyphicon-transfer"></span> Dirección</label>
                            </div>


                            <div class="group">
                                <input class="input" type="email" id="emailOrg" name="email_rec">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><span class="glyphicon glyphicon-envelope"></span> e-mail</label>
                            </div>



                            <div class="group">    
                                <input class="input" type="text" required id="descOrg" name="desc_rec">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><span class="glyphicon glyphicon-align-left"></span> Descripción de la organización</label>
                            </div>



                            <div class="group">     
                                <input class="input" type="text" id="latOrg" required name="lat_rec" >
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><span class="glyphicon glyphicon-map-marker"></span> Latitud</label>
                            </div>


                            <div class="group">   
                                <input class="input" type="text" id="longOrg" required name="longitud_rec">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label><span class="glyphicon glyphicon-map-marker"></span> Longitud</label>
                            </div>

                            <h5>Región</h5>
                            <select class="form-control" id="region" name="id_region"></select>

                            <h5>Categoría</h5>
                            <select class="form-control" id="categoria" name="id_categoria"></select>
                            <br>
                            <br>
                            <input type="hidden" name="contacto" value="<?php echo $_GET['contacto'] ?>"/>
                            <input type="hidden" name="imagen" value=""/>
                            <input type="hidden" name="nombre_imagen" value=""/>
                            <iframe class="oculto"  name="formDestination"></iframe>
                            <button class="form-control" name="guardar" id="guardar" type="button" style="width:100%; background-color:#005662; color:white;" ><span class="glyphicon glyphicon-floppy-disk"></span>  Guardar</button>

                            <br>
                            <button class="form-control" data-toggle="modal" data-target="#Modal"   type="button" style="width:100%; background-color:#ff9191; color:white;" ><span class="glyphicon glyphicon-trash"></span>  Eliminar Perfil</button>

                            <div class="modal" id="Modal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminar Perfil</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Eliminará el perfil ¿Desea continuar?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="eliminar" class="btn btn-primary">Sí, borrar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal" id="Modal1" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Actualizar Perfil</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>El Perfil se ha actualizado con éxito.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" onClick="javascript:(function () {
                                                            window.location.href = 'contactosUsuario.php';
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
    <br>

    <script src="js/jquery-2.2.4.min.js"></script>
    <script>
                                                $(document).on("ready", function () {
                                                    loadData();
                                                });
                                                function $_GET(param) {
                                                    var vars = {};
                                                    window.location.href.replace(location.hash, '').replace(
                                                            /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
                                                            function (m, key, value) { // callback
                                                                vars[key] = value !== undefined ? value : '';
                                                            }
                                                    );

                                                    if (param) {
                                                        return vars[param] ? vars[param] : null;
                                                    }
                                                    return vars;
                                                }
                                                var loadData = function () {
                                                    $.ajax({
                                                        type: "GET",
                                                        url: "consultarRegiones.php"
                                                    }).done(function (data) {
                                                        var regiones = JSON.parse(data);

                                                        for (var i in regiones) {
                                                            $("#region").append('<option class="form-control" value="' + regiones[i].id_region + '">' + regiones[i].nombre_region + ' </option>');
                                                        }
                                                    });
                                                    $.ajax({
                                                        type: "GET",
                                                        url: "consultarCategorias.php"
                                                    }).done(function (data) {
                                                        var categorias = JSON.parse(data);
                                                        for (var i in categorias) {
                                                            $("#categoria").append('<option class="form-control" value="' + categorias[i].id_categoria + '">' + categorias[i].nombre_categoria + '</option>');
                                                        }
                                                    });
                                                    var id_contacto = $_GET('contacto');
                                                    $.ajax({
                                                        type: "GET",
                                                        url: "consultarDatosDePerfilParaEditar.php",
                                                        data: {'contacto': id_contacto}
                                                    }).done(function (data) {

                                                        var perfiles = JSON.parse(data);
                                                        var imagen;
                                                        for (var i in perfiles["perfiles"]) {
                                                            if (perfiles["perfiles"][i].imagen !== "") {
                                                                imagen = perfiles["perfiles"][i].imagen;
                                                            } else {
                                                                imagen = "https://cdn.icon-icons.com/icons2/37/PNG/512/contacts_3695.png";
                                                            }
                                                            ;
                                                            $("#imganenOrg").attr("src", imagen);
                                                            $("#nombreOrg").attr("value", perfiles["perfiles"][i].nombre_organizacion);
                                                            $("#numtelOrg").attr("value", perfiles["perfiles"][i].numero_fijo);
                                                            $("#numcelOrg").attr("value", perfiles["perfiles"][i].numero_movil);
                                                            $("#dirOrg").attr("value", perfiles["perfiles"][i].direccion);
                                                            $("#emailOrg").attr("value", perfiles["perfiles"][i].e_mail);
                                                            $("#descOrg").attr("value", perfiles["perfiles"][i].descripcion_organizacion);
                                                            $("#latOrg").attr("value", perfiles["perfiles"][i].latitud);
                                                            $("#longOrg").attr("value", perfiles["perfiles"][i].longitud);
                                                            $("#region option[value=" + perfiles["perfiles"][i].id_region + "]").attr("selected", true);
                                                            $("#categoria option[value=" + perfiles["perfiles"][i].id_categoria + "]").attr("selected", true);
                                                        }



                                                    });
                                                };
                                                document.getElementById("eliminar").onclick = function () {
                                                    eliminarPerfil();
                                                };
                                                function eliminarPerfil() {
                                                    $.ajax({
                                                        type: "GET",
                                                        url: "eliminarPerfil.php",
                                                        data: {'contacto': $_GET('contacto')}
                                                    });
                                                    window.location.href = 'contactosUsuario.php';
                                                }

                                                document.getElementById("guardar").onclick = function () {
                                                    validarFormulario();
                                                };
                                                function mostrarError(componente, error) {

                                                    $("#formularioEditar").append('<div class="modal" id="Modal3" tabindex="-1" role="dialog">' +
                                                            '<div class="modal-dialog" role="document">' +
                                                            '<div class="modal-content">' +
                                                            '<div class="modal-header">' +
                                                            '<h5 class="modal-title">Error al actualizar el perfil</h5>' +
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
                                                    var error_nomb = false;
                                                    var error_tel = false;
                                                    var error_cel = false;
                                                    var error_mail = false;
                                                    var error_desc = false;
                                                    var error_dir = false;
                                                    var error_reg = false;
                                                    var error_cat = false;
                                                    if (document.formularioEditar.nomborg_rec.value === "") {
                                                        error_nomb = true;
                                                        mostrarError(document.formularioEditar.nomborg_rec, "Debe ingresar un nombre de organización.");
                                                        return;
                                                    }

                                                    if (document.formularioEditar.email_rec.value === "") {

                                                    } else {
                                                        if (!document.formularioEditar.email_rec.value.includes("@") || !document.formularioEditar.email_rec.value.includes(".")) {
                                                            error_mail = true;
                                                            mostrarError(document.formularioEditar.email_rec, "Ingrese un e-mail válido.");
                                                            return;
                                                        }
                                                    }


                                                    if (document.formularioEditar.numtel_rec.value === "") {
                                                        if (document.formularioEditar.numcel_rec.value === "") {
                                                            error_tel = true;
                                                            mostrarError(document.formularioEditar.numtel_rec, "Debe ingresar al menos un número telefónico.");
                                                            return;
                                                        }
                                                    } else {
                                                        if (document.formularioEditar.numtel_rec.value.length < 8 || !document.formularioEditar.numtel_rec.value.startsWith("2") || document.formularioEditar.numtel_rec.value.length > 8) {
                                                            error_tel = true;
                                                            mostrarError(document.formularioEditar.numtel_rec, "El número telefónico ingresado no es válido.");
                                                            return;
                                                        }
                                                    }

                                                    if (document.formularioEditar.numcel_rec.value === "") {
                                                        if (document.formularioEditar.numtel_rec.value === "") {
                                                            error_cel = true;
                                                            mostrarError(document.formularioEditar.numcel_rec, "Debe ingresar al menos un número telefónico.");
                                                            return;
                                                        }
                                                    } else {
                                                        if (document.formularioEditar.numcel_rec.value.length < 8 || document.formularioEditar.numcel_rec.value.length > 8) {
                                                            error_cel = true;
                                                            $("#Modal3").modal("show");
                                                            mostrarError(document.formularioEditar.numcel_rec, "El número telefónico ingresado no es válido.");
                                                            return;
                                                        }
                                                    }

                                                    if (document.formularioEditar.direccion_rec.value === "") {
                                                        error_dir = true;
                                                        mostrarError(document.formularioEditar.direccion_rec, "Debe ingresar la dirección de la organización.");
                                                        return;
                                                    }
                                                    if (document.formularioEditar.desc_rec.value === "") {
                                                        error_desc = true;
                                                        mostrarError(document.formularioEditar.desc_rec, "Debe escribir una descripción de la organización.");
                                                        return;
                                                    }
                                                    if (document.formularioEditar.id_region.value < 3 && document.formularioEditar.id_region.value > 4) {
                                                        error_reg = true;
                                                        alert('La región seleccionada no existe.');
                                                        document.formularioEditar.id_region.focus();
                                                        return;
                                                    }
                                                    if (document.formularioEditar.id_categoria.value < 1 && document.formularioEditar.id_categoria.value > 11) {
                                                        error_cat = true;
                                                        alert('La categoría seleccionada no existe.');
                                                        document.formularioEditar.id_categoria.focus();
                                                        return;
                                                    }

                                                    if (error_nomb === false &&
                                                            error_tel === false &&
                                                            error_cel === false &&
                                                            error_dir === false &&
                                                            error_mail === false &&
                                                            error_desc === false &&
                                                            error_reg === false &&
                                                            error_cat === false) {
                                                        document.formularioEditar.submit();
                                                        $("#Modal1").modal('show');
                                                        return;
                                                    }
                                                }


    </script>


    <?php
    include_once 'plantillas/documento-cierre.inc.php';
    ?>
    <?php
} else {
    header('Location: /webaeo');
}
?>
