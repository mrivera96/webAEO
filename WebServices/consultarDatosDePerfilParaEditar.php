<?php
 
include 'ConexionABaseDeDatos.php';
include_once 'Errores.inc.php';
if(isset($_GET["cto"])){
 $id_contacto=$_GET['cto'];
  
$query ="SELECT * FROM contactos where id_contacto=?";
$resultado=$con->prepare($query);
    $resultado -> bind_param("i",$id_contacto);
    $resultado->execute();
    $resul=$resultado->get_result();
 
 
 while($row=mysqli_fetch_array($resul)){
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
 
if(isset($flag)){
    print(json_encode($flag));
} else {
    print json_encode(ERROR38);
}

}else{print json_encode(ERROR22);}


$con->close();
 
?>