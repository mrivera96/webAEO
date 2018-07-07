<?php
 
include 'ConexionABaseDeDatos.php';

 if(isset($_GET["id_usuario"])){
 $id_usua=$_GET['id_usuario'];
}

$query ="SELECT * FROM usuarios WHERE  id_usuario=?";
$resultado=$con->prepare($query);
$resultado->bind_param("i", $id_usua);
$resultado->execute();

 $result=$resultado->get_result();
 

 
while($row =$result->fetch_assoc()){
            
	$flag[]=$row;
}
if( isset($flag)){
    print (json_encode($flag));
  
}else {
   print (json_encode('No se recivieron las variables'));
 
}
  $con->close();
 
 

 
?>
