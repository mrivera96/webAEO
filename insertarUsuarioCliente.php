<?php

include 'ConexionABaseDeDatos.php';
include 'Errores.inc.php';
$flag = array();

$error_nomUsuario = false;
$error_nomPropio = false;
$error_correo = false;
$error_contrasena = false;


if (!isset($_POST['nombre_usuario']) || empty($_POST['nombre_usuario'])) {
    $error_nomUsuario = true;
    print json_encode(ERROR10);
    return;
}
if (!isset($_POST['nombre_propio']) || empty($_POST['nombre_propio'])) {
    $error_nomPropio = true;
    print json_encode(ERROR11);
    return;
}

if (!isset($_POST['correo']) || empty($_POST['correo'])) {
    $error_correo = true;
    print json_encode(ERROR32);
    return;
} else {
    if (strpos($_POST['correo'], "@") === false || strpos($_POST['correo'], ".") === false) {
        $error_correo = true;
        print json_encode(ERROR12);
        return;
    }
}

if (!isset($_POST['contrasena']) || empty($_POST['contrasena'])) {
    $error_contrasena = true;
    print json_encode(ERROR25);
    return;
}

if ($error_nomUsuario === false &&
        $error_nomPropio === false &&
        $error_correo === false &&
        $error_contrasena === false
) {

    $nombre_usuario = $_POST['nombre_usuario'];
    $nombre_propio = $_POST['nombre_propio'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    $conexion = mysqli_connect($host, $uname, $pwd, $db);

    $insert = "INSERT INTO usuarios(nombre_usuario,nombre_propio,correo,contrasena,rol,estado_usuario)VALUES(?,
?,?,?,2,1)";
    $resultado_insert = $con->prepare($insert);
    $resultado_insert->bind_param("ssss", $nombre_usuario, $nombre_propio, $correo, $contrasena);
    $resultado_insert->execute();
} else {
    print json_encode("Ocurrió un error con los paramámetros recibidos.");
}


$con->close();
?> 
