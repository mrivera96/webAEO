<?php
 include 'ConexionABaseDeDatos.php';

 
$query="select nombre_categoria, id_categoria from categorias";
$resultado=$con->query($query);

 while($row =$resultado->fetch_assoc()) {
 
	$flag[] = $row;
}
 
print(json_encode($flag));
$con->close();
 
?>  