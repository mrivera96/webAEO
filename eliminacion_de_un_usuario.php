<?php
 include 'ConexionABaseDeDatos.php';

$flag=array();

 if(isset($_POST["id_usuario"])){
 $id_usuario=$_POST['id_usuario'];
 
 }
 

 
$update="update usuarios SET estado_usuario=2 where id_usuario='{$id_usuario}'";
$resultado_update=mysqli_query($con,$update);

 

 

$con->close();
 
?> 