<?php
 
include 'ConexionABaseDeDatos.php';
if(isset($_GET['id_estado'])){
    $id_estado=$_GET['id_estado'];
}
 
$query ="SELECT c.id_contacto, c.nombre_organizacion, c.imagen, u.nombre_usuario FROM contactos as c join usuarios as u on c.id_usuario=u.id_usuario where c.id_estado='{$id_estado}'";
$resultado=$con->query($query);
 
while($row =$resultado->fetch_assoc()) {
 
	$flag[] = $row;
}
 if(isset($flag)){
     print(json_encode($flag));
 }else{
     print("No hay resultados");
 }

$con->close();
 
?>