<?php
$titulo = 'Formulario de  Registro';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';


require 'database.php';
$message = "";
$stmt = "";
if (!empty($_POST['nombre_usuario']) && !empty($_POST['password']) && !empty($_POST['nombre_propio']) && !empty($_POST['correo']) && !empty($_POST['password2'])) {
    if ($_POST['password'] == $_POST['password2']) {


        $sql = "INSERT INTO usuarios (nombre_usuario,nombre_propio,contrasena,correo,rol,estado_usuario) VALUES (:nombre_usuario,:nombre_propio,:contrasena,:correo,2,1)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $_POST['nombre_usuario']);


        $stmt->bindParam(':nombre_propio', $_POST['nombre_propio']);

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $password = ($password);
        $stmt->bindParam(':contrasena', $password);

        $stmt->bindParam(':correo', $_POST['correo']);

        if ($stmt->execute()) {

            $message = 'Su usuario se a creado con exito';
            header('Location: /webaeo/login.php');
        } else {
            $message = 'no de a creado su usuario';
        }
    } else {
        $message = 'las contraseñas no son iguales';
    }
}
?>

<head>
    <link href="css/estilos_alan.css" rel="stylesheet">
</head>

<?php
//require 'partials/header.php';
?>

<?php if (!empty($message)): ?>
    <p> <?= $message ?></p>
<?php endif; ?>

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
                    <form action="registrarCuentaUsuario.php" method="post">
                        <div class="group">
                            <input name="nombre_propio" id="nombre_propio"  required type="text">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Nombre Propio</label>
                        </div>
                        <div class="group">
                            <input name="nombre_usuario" id="nombre_usuario" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ_-]*$|" title="No se permiten espacios" required type="text">
                            <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nombre de Usuario</label>
                            </div>
                        
                           
                         <div class="group">
                            <input name="password" id="contrasena" required type="password">
                            <span class="highlight"></span>
                                <span class="bar"></span>
                                <label >Contraseña</label>
                            </div>
                            
                             <div class="group">
                            <input  id="contrasena1" name="password2"  required type="password">
                            <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Repite la Contraseña</label>
                            </div>
                            
                            
                           <!-- <input name="confir_password" type="password" placeholder="Confirmar Contraseña"> -->
                        <div class="group">
                            <input name="correo" id="correo" type="email" required>
                             <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Correo</label>
                            </div>
                            <br>
                            <br>

                            <button type="submit" value="Enviar " class="form-control" style="width:100%; background-color:#005662; color:white;" ><span class="glyphicon glyphicon-floppy-disk"></span>&nbspRegistrar</button>
                            </form>
                        </div>
                </div>   
            </div>
        </div>

    </div>




    <?php
    include_once 'plantillas/documento-cierre.inc.php';
    ?>


