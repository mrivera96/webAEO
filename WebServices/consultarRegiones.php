<?php
 include '../config/ConexionABaseDeDatos.php';

 
$query="select * from regiones";
$resultado=$con->query($query);

 while($row =$resultado->fetch_assoc()) {
 
	$flag[] = $row;
}
 
print(json_encode($flag));
$con->close();
 
?>  