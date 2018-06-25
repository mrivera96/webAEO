<?php
 
include 'ConexionABaseDeDatos.php';
if(isset($_GET["id_contacto"])){
 $id_contacto=$_GET['id_contacto'];
}

 
$query ="SELECT * FROM contactos where id_contacto='{$id_contacto}'";
$resultado=$con->query($query);
 
 
 while($row=mysqli_fetch_array($resultado)){
	$result["id_contacto"]=$row['id_contacto'];
	$result["nombre_organizacion"]=$row['nombre_organizacion'];
	$result["numero_fijo"]=$row['numero_fijo'];
	$result["numero_movil"]=$row['numero_movil'];
	$result["direccion"]=$row['direccion'];
	$result["imagen"]=$row['imagen'];
	$result["e_mail"]=$row['e_mail'];
	$result["descripcion_organizacion"]=$row['descripcion_organizacion'];
	$result["latitud"]=$row['latitud'];
	$result["longitud"]=$row['longitud'];
	$result["id_categoria"]=$row['id_categoria'];
	$result["id_region"]=$row['id_region'];
	$flag['perfiles'][]=$result;
}
 

print(json_encode($flag));
$con->close();
 
?>
