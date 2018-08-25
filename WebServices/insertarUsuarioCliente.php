<?php

include 'ConexionABaseDeDatos.php';
include 'Errores.inc.php';
$flag = array();

$error_nomUsuario = false;
$error_nomPropio = false;
$error_correo = false;
$error_contrasena = false;


if (!isset($_POST['usuarionombre']) || empty($_POST['usuarionombre'])) {
    $error_nomUsuario = true;
    print json_encode(ERROR10);
    return;
}
if (!isset($_POST['usuariopropio']) || empty($_POST['usuariopropio'])) {
    $error_nomPropio = true;
    print json_encode(ERROR11);
    return;
}

if (!isset($_POST['usuarioemail']) || empty($_POST['usuarioemail'])) {
    $error_correo = true;
    print json_encode(ERROR32);
    return;
} else {
    if (strpos($_POST['usuarioemail'], "@") === false || strpos($_POST['usuarioemail'], ".") === false) {
        $error_correo = true;
        print json_encode(ERROR4);
        return;
    }
}

if (!isset($_POST['usariopassword']) || empty($_POST['usariopassword'])) {
    $error_contrasena = true;
    print json_encode(ERROR17);
    return;
}

if ($error_nomUsuario === false &&
        $error_nomPropio === false &&
        $error_correo === false &&
        $error_contrasena === false
) {

    $nombre_usuario = $_POST['usuarionombre'];
    $nombre_propio = $_POST['usuariopropio'];
    $correo = $_POST['usuarioemail'];
    $contrasena = password_hash($_POST['usariopassword'], PASSWORD_DEFAULT);

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
