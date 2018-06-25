<?php
 include 'ConexionABaseDeDatos.php';

$flag=array();

 if(isset($_GET["id_contacto"])){
 $id_contacto=$_GET['id_contacto'];
 
 }
 

 
$update="update contactos SET id_estado=4 where id_contacto='{$id_contacto}'";
$resultado_update=mysqli_query($con,$update);

 

 

$con->close();
 
?> 