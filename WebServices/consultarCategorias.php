<?php
 include 'ConexionABaseDeDatos.php';

 
$query="select nombre_categoria, id_categoria from categorias";
$resultado=$con->prepare($query);
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



