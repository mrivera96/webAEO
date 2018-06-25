<?php   
 
include 'ConexionABaseDeDatos.php';
$id_categoria=$_GET['id_categoria'];

 
$query ="SELECT c.nombre_organizacion,c.numero_movil, c.numero_fijo, c.imagen, c.id_contacto,  r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region where id_estado=2 and id_categoria='{$id_categoria}'";

$resultado=$con->query($query);
 
while($row =$resultado->fetch_assoc()){
            
	$flag[]=$row;
}

print (json_encode($flag));


$con->close();
 
?>