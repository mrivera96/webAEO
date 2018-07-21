<?php

include 'ConexionABaseDeDatos.php';
$flag = array();
 

if (isset($_POST["nombre_usuario"]) && isset($_POST["nombre_propio"]) && isset($_POST["correo"]) && isset($_POST["contrasena"]) && isset($_POST["rol"])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $nombre_propio = $_POST['nombre_propio'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
    $rol = $_POST['rol'];
    $conexion = mysqli_connect($host, $uname, $pwd, $db);

$insert = "INSERT INTO usuarios(nombre_usuario,nombre_propio,correo,contrasena,rol,estado_usuario)VALUES(?,
?,?,?,?,1)";
$resultado_insert = $con->prepare($insert);
$resultado_insert->bind_param("ssssi",$nombre_usuario, $nombre_propio, $correo, $contrasena, $rol);
$resultado_insert->execute();
header("Location:mostrar_usuarios.php?nombre_usuario=" . $nombre_usuario);

}else{
        print (json_encode('No se recivieron las variables'));
}


$con->close();
?> 