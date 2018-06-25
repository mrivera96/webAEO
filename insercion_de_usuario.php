<?php
 
 include 'ConexionABaseDeDatos.php';
$flag=array();

 if(isset($_POST["nombre_usuario"])&& isset($_POST["nombre_propio"])&& isset($_POST["correo"])&& isset($_POST["contrasena"])&& isset($_POST["rol"]) ){
 $nombre_usuario=$_POST['nombre_usuario'];
  $nombre_propio=$_POST['nombre_propio'];
    $correo=$_POST['correo'];
   $contrasena=$_POST['contrasena'];
      $rol=$_POST['rol'];
	   
 }
 
$conexion =mysqli_connect($host,$uname,$pwd,$db);
 
$insert="INSERT INTO usuarios(nombre_usuario,nombre_propio,correo,contrasena,rol,estado_usuario)VALUES('{$nombre_usuario}',
'{$nombre_propio}','{$correo}','{$contrasena}','{$rol}',1)";
$resultado_insert=mysqli_query($con,$insert);

header("Location:mostrar_usuarios.php?nombre_usuario=" . $nombre_usuario);
exit();

 

 

$con->close();
 
?> 