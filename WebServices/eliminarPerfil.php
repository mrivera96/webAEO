<?php
 include '../config/ConexionABaseDeDatos.php';
 include_once '../config/Errores.inc.php';


 if(isset($_GET["cto"])){
 $id_contacto=$_GET['cto'];
 
  
$update="update contactos SET id_estado=4 where id_contacto=?";
$resultado_update=$con->prepare($update);
$resultado_update->bind_param("i",$id_contacto);
$resultado_update->execute();
 }else{
     print json_encode(ERROR22);
 }
 
$con->close();
 
?> 