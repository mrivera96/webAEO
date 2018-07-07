<?php
 include 'ConexionABaseDeDatos.php';


 if(isset($_GET["id_contacto"])){
 $id_contacto=$_GET['id_contacto'];
 
  
$update="update contactos SET id_estado=4 where id_contacto=?";
$resultado_update=$con->prepare($update);
$resultado_update->bind_param("i",$id_contacto);
$resultado_update->execute();
 }else{
     print json_encode('Revise los parametros de su request.');
 }
 
$con->close();
 
?> 