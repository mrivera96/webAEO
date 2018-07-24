<?php

include 'ConexionABaseDeDatos.php';
$flag = array();


if (isset($_POST["id_usuario"]) && isset($_POST["nombre_usuario"]) && isset($_POST["nombre_propio"]) && isset($_POST["correo"]) ) {

    $id_usua = $_POST['id_usuario'];
    $nombre_usua = $_POST['nombre_usuario'];
    $nombre_pro = $_POST['nombre_propio'];
    $corr = $_POST['correo'];

     /* $contra = $_POST['contrasena'];*/
//$contra = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    $query_search = "update usuarios SET nombre_usuario=?,nombre_propio=?,correo=? where id_usuario=?";

    $resultado = $con->prepare($query_search);
    $resultado->bind_param("sssi", $nombre_usua, $nombre_pro, $corr,  $id_usua);
    $resultado->execute();

} else {
    print (json_encode('No se recivieron las variables'));
}



$con->close();
?>