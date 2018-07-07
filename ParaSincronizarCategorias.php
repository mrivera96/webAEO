<?php   
 
include 'ConexionABaseDeDatos.php';
 
$query ="SELECT A.* ,COUNT(C.id_estado) as coun FROM categorias AS A JOIN contactos AS C ON A.id_categoria=C.id_categoria WHERE C.id_estado= 2 GROUP BY A.id_categoria";

$resultado=$con->prepare($query);
 $resultado->execute();
 $result=$resultado->get_result();
 
while($row =$result->fetch_assoc()){
            
	$flag[]=$row;
}
if( isset($flag)){
    print (json_encode($flag));
}else{
    print'Ocurrio un error , por favor rivise sus datos ';
}


$con->close();
 
?>


