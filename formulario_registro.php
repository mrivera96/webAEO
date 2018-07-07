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
                    <form name="formulario" role="form" id="editar_usuarios"  method="post"tyle="padding-top: 15px"action="insercion_de_usuario.php"  >
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
                        <button type="button" onclick="validarFormulario()" id="btn" class="form-control"   name="Submit"  style="width:100%; background-color:#005662; color:white;">  <span class="glyphicon glyphicon-floppy-disk"></span>  Guardar</button>



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

        if (document.formulario.nombre_usuario.value === "") {
            error_nomUsuario = true;
            alert("Debe ingresar un nombre de usuario");
            document.formulario.nombre_usuario.focus();
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
            alert("Debe ingresar un nombre propio");
            document.formulario.nombre_propio.focus();
            return;
        }
        if (document.formulario.correo.value === "") {
            error_correo = true;
            alert("Debe ingresar un correo");
            document.formulario.correo.focus();
            return;
        } else {
            if (!document.formulario.correo.value.includes("@") || !document.formulario.correo.value.includes(".")) {
                error_correo = true;
                alert("Debes colocar una \"Dirección de Email\" válida");
                document.formulario.correo.focus(); //Esto recorna el cursor al campo "Email"
                return;
            }
        }

        if (document.formulario.contrasena.value === "") {
            error_contrasena = true;
            alert("Debe ingresar una contraseña");
            document.formulario.contrasena.focus();
            return;
        }

        if (error_nomUsuario === false &&
                error_nomPropio === false &&
                error_correo === false &&
                error_contrasena === false
                )
        {
            document.formulario.submit();
            alert('Usuario insertado con exito ');
            windown.location.href = 'mostrar_usuarios.php';
            return;


        }


    }


</script>


<script>


    var id_usuario = $_GET('id_usuario');




    $("#editar_usuarios").submit(function () {

        alert('Usuario Insertado Con exito');
        window.location.href = 'mostrar_usuarios.php';


    });
</script>


<script>

    $.ajax({
        type: "GET",
        url: "verificar_usuario.php"
                data: {'nombre_usuario':<?php echo $_GET['nombre_usuario'] ?>}

    })
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