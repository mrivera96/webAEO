<?php
 include '../config/ConexionABaseDeDatos.php';


 if(isset($_GET["cto"])){
 $id_contacto=$_GET['cto'];
 
$update="update contactos SET id_estado=2 where id_contacto=?";
$resultado=$con -> prepare($update);
$resultado -> bind_param("i",$id_contacto);
$resultado -> execute();
 }else{
     print json_encode(ERROR22);
 }

   
$con->close();
 
?> 