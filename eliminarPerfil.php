<?php
 include 'ConexionABaseDeDatos.php';


 if(isset($_GET["cto"])){
 $id_contacto=$_GET['cto'];
 
  
$update="update contactos SET id_estado=4 where id_contacto=?";
$resultado_update=$con->prepare($update);
$resultado_update->bind_param("i",$id_contacto);
$resultado_update->execute();
 }else{
     print json_encode('Revise los parametros de su request.');
 }
 
$con->close();
 
?> 