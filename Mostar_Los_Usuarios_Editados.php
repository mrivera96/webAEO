<?php
 
include 'ConexionABaseDeDatos.php';

 if(isset($_GET["id_usuario"])){
 $id_usuario=$_GET['id_usuario'];
}

$query ="SELECT * FROM usuarios WHERE  id_usuario='{$id_usuario}'";
$resultado=$con->query($query);
 
while($row =$resultado->fetch_assoc()) {
 
	$flag[] = $row;
}
print(json_encode($flag));
$con->close();
 
?>
