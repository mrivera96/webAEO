<?php
 
include 'ConexionABaseDeDatos.php';

 if(isset($_GET["id_contacto"])){
 $id_contacto=$_GET['id_contacto'];
}

$query ="SELECT imagen,nombre_organizacion,numero_fijo,numero_movil,e_mail,direccion,descripcion_organizacion,latitud,longitud FROM contactos WHERE id_contacto='{$id_contacto}'";
$resultado=$con->query($query);
 
 while($row=mysqli_fetch_array($resultado)){
		$result["imagen"]=($row['imagen']);
			$result["nombre_organizacion"]=$row['nombre_organizacion'];
				$result["numero_fijo"]=$row['numero_fijo'];
					$result["numero_movil"]=$row['numero_movil'];
						$result["e_mail"]=$row['e_mail'];
							$result["direccion"]=$row['direccion'];
								$result["descripcion_organizacion"]=$row['descripcion_organizacion'];
									$result["latitud"]=$row['latitud'];
										$result["longitud"]=$row['longitud'];
			
			
	$flag[]=$result;
}
 
print(json_encode($flag));
$con->close();
 
?>