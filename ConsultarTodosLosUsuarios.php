<?php
 
include 'ConexionABaseDeDatos.php';
 
$query ="SELECT id_usuario, nombre_usuario FROM usuarios where estado_usuario=1";
$resultado=$con->prepare($query);
 $resultado->execute();
  $result=$resultado->get_result();
 

 
while($row =$result->fetch_assoc()){
            
	$flag[]=$row;
}
if( isset($flag)){
    print (json_encode($flag));
  
}else {
    print'Ocurrio un error , por favor rivise sus datos ';
}
  $con->close();
 
?>




