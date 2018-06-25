<?php
 
include 'ConexionABaseDeDatos.php';
 
$query ="SELECT id_usuario, nombre_usuario FROM usuarios where estado_usuario=1";
$resultado=$con->query($query);
 
while($row =$resultado->fetch_assoc()) {
 
	$flag[] = $row;
}
 
print(json_encode($flag));
$con->close();
 
?>