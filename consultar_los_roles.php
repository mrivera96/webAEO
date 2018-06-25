<?php
 include 'ConexionABaseDeDatos.php';

$flag=array();


 

 
$query="select id_rol,descripcion_rol from roles";
$resultado=$con->query($query);

 while($row =$resultado->fetch_assoc()) {
 
	$flag[] = $row;
}
 
print(json_encode($flag));
$con->close();
 
?> 