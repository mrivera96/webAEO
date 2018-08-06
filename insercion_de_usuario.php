<?php

include 'ConexionABaseDeDatos.php';
$flag = array();
 
/*if(isset($_POST["nombre_usuario"])===""){
   // echo 'el usuario no puede estar vacio';
    print (json_encode('el usuario no puede estar vacio'));  
}else if(isset($_POST["nombre_propio"])===""){
        print (json_encode('el nombre propio no puede estar vacio'));   
}else if(isset($_POST["correo"])===""){   
    print (json_encode('el correo no puede estar vacio')); 
}else if(isset($_POST["contrasena"])===""){
    print (json_encode('la contraseña no puede estar vacio'));    
}else if(isset($_POST["rol"])===""){
    print (json_encode('el rol no puede estar vacio'));  
}else*/

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


}else{
        print (json_encode('No se recivieron las variables'));
}


$con->close();
?> 