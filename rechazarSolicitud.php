<?php
 include 'ConexionABaseDeDatos.php';


 if(isset($_GET["id_contacto"])){
 $id_contacto=$_GET['id_contacto'];
  
$update="update contactos SET id_estado=3 where id_contacto=?";
$resultado=$con -> prepare($update);
$resultado -> bind_param("i",$id_contacto);
$resultado -> execute();
 }else{
     print json_encode('Revise los parámetros de su request.');
 }


$con->close();
 
?> 