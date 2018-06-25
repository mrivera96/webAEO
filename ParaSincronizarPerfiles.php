<?php   
 
include 'ConexionABaseDeDatos.php';
 
$query ="SELECT c.*, r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region";

$resultado=$con->query($query);
 
while($row =$resultado->fetch_assoc()){
            
	$flag[]=$row;
}

print (json_encode($flag));


$con->close();
 
?>