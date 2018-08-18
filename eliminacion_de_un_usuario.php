<?php
 include 'ConexionABaseDeDatos.php';
 include 'Errores.inc.php';


$flag=array();

 if(isset($_POST["usuario"])){
 $id_usua=$_POST['usuario'];
 
 $update="update usuarios SET estado_usuario=2 where id_usuario=?";


$resultado_update = $con->prepare($update);
$resultado_update->bind_param("i", $id_usua);
$resultado_update->execute();

 
 }else{
 print json_encode(ERROR22);   
 }
 $con->close();
 
?> 