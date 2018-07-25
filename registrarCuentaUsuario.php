<?php
$titulo = 'Formulario de  Registro';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';


require 'database.php';
$message = "";
$stmt = "";
if (!empty($_POST['nombre_usuario']) && !empty($_POST['password']) && !empty($_POST['nombre_propio']) && !empty($_POST['correo']) && !empty($_POST['password2'])) {
   if($_POST['password'] == $_POST['password2']){
       
   
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
        $message = 'no de a creado su usuardio';
    }
    } else {
        $message = 'las contraseñas no son iguales';
    }
}
?>

<head>
    <link href="css/estiloLogin.css" rel="stylesheet">
</head>

<?php
//require 'partials/header.php';
?>

<?php if (!empty($message)): ?>
    <p> <?= $message ?></p>
<?php endif; ?>

<h1>Registrarse</h1>
<form action="registrarCuentaUsuario.php" method="post">

    <input name="nombre_propio" required type="text" placeholder="Ingrese su Nombre" >
    <input name="nombre_usuario" required type="text" placeholder="Ingrese Nombre de Usuario">
    <input name="password" required type="password" placeholder="Ingrese su Contraseña">
    <input name="password2" required type="password" placeholder="Confirmar su Contraseña">
   <!-- <input name="confir_password" type="password" placeholder="Confirmar Contraseña"> -->
    <input name="correo" type="email" required placeholder="Ingrese su correo">
    <br>
    <br>

    <input type="submit" value="Enviar ">

</form>




<?php
include_once 'plantillas/documento-cierre.inc.php';
?>


