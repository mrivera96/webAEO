<?php

include '../config/ConexionABaseDeDatos.php';
include 'Errores.inc.php';
$flag = array();
$error_nomUsuario = false;
$error_nomPropio = false;
$error_correo = false;


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



if ($error_nomUsuario === false &&
        $error_nomPropio === false &&
        $error_correo === false 
      
) {

//if (isset($_POST["id_usuario"]) && isset($_POST["nombre_usuario"]) && isset($_POST["nombre_propio"]) && isset($_POST["correo"]) ) {

    $id_usua = $_POST['usuario'];
    $nombre_usua = $_POST['usuarionombre'];
    $nombre_pro = $_POST['usuariopropio'];
    $corr = $_POST['usuarioemail'];

    

    $query_search = "update usuarios SET nombre_usuario=?,nombre_propio=?,correo=? where id_usuario=?";

    $resultado = $con->prepare($query_search);
    $resultado->bind_param("sssi", $nombre_usua, $nombre_pro, $corr,  $id_usua);
    $resultado->execute();
 print json_encode(ERROR13);
} else {
    print json_encode(ERROR22);
}



$con->close();
?>