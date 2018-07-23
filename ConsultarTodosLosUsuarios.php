<?php
 
include 'ConexionABaseDeDatos.php';
 
$query ="SELECT u.id_usuario, u.nombre_usuario,r.descripcion_rol FROM usuarios as u JOIN roles as r on u.rol=r.id_rol where estado_usuario=1";
$resultado=$con->prepare($query);
 $resultado->execute();
  $result=$resultado->get_result();
 

 
while($row =$result->fetch_assoc()){
            
	$flag[]=$row;
}
if( isset($flag)){
    print (json_encode($flag));
  
}else {
    print'Ocurrio un error , por favor revise sus datos ';
}
  $con->close();
 
?>




