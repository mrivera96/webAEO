<?php

include 'ConexionABaseDeDatos.php';
include 'Errores.inc.php';
$flag = array();
$error_nomUsuario = false;
$error_nomPropio = false;
$error_correo = false;


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
    print json_encode(ERROR12);
    return;
} else {
    if (strpos($_POST['correo'], "@") === false || strpos($_POST['correo'], ".") === false) {
        $error_correo = true;
        print json_encode(ERROR4);
        return;
    }
}



if ($error_nomUsuario === false &&
        $error_nomPropio === false &&
        $error_correo === false 
      
) {

//if (isset($_POST["id_usuario"]) && isset($_POST["nombre_usuario"]) && isset($_POST["nombre_propio"]) && isset($_POST["correo"]) ) {

    $id_usua = $_POST['id_usuario'];
    $nombre_usua = $_POST['nombre_usuario'];
    $nombre_pro = $_POST['nombre_propio'];
    $corr = $_POST['correo'];

    

    $query_search = "update usuarios SET nombre_usuario=?,nombre_propio=?,correo=? where id_usuario=?";

    $resultado = $con->prepare($query_search);
    $resultado->bind_param("sssi", $nombre_usua, $nombre_pro, $corr,  $id_usua);
    $resultado->execute();

} else {
    print json_encode(ERROR22);
}



$con->close();
?>