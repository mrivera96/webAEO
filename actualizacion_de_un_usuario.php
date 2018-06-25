<?php
 
 include 'ConexionABaseDeDatos.php';
$flag=array();


  if(isset($_POST["id_usuario"]) && isset($_POST["nombre_usuario"]) && isset($_POST["nombre_propio"])&& isset($_POST["correo"]) && isset($_POST["contrasena"])){
      
 $id_usuario=$_POST['id_usuario'];
  $nombre_usuario=$_POST['nombre_usuario'];
   $nombre_propio=$_POST['nombre_propio'];
    $correo=$_POST['correo'];
    $contrasena=$_POST['contrasena'];
 
  }
 
 
$query_search="update usuarios SET nombre_usuario='{$nombre_usuario}',nombre_propio='{$nombre_propio}',correo='{$correo}',contrasena='{$contrasena}' where id_usuario='{$id_usuario}'";

$query_exec =mysqli_query($con,$query_search);

header("Location:mostrar_usuarios.php?id_usuario=" . $id_usuario);
exit();



$con->close();
 
?>