<?php
 include '../config/ConexionABaseDeDatos.php';
 include '../config/Errores.inc.php';


$flag=array();


$query="select id_rol,descripcion_rol from roles";
$resultado=$con->prepare($query);
$resultado->execute();


 $result=$resultado->get_result();
 

while($row =$result->fetch_assoc()){
            
	$flag[]=$row;
}
if( isset($flag)){
    print (json_encode($flag));
  
}else {
 print json_encode(ERROR22);   
 
}
  $con->close();
 

?>
