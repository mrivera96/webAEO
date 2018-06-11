<?php   
 
include 'ConexionABaseDeDatos.php';
 
$query ="SELECT A.* ,COUNT(C.id_estado) as coun FROM categorias AS A JOIN contactos AS C ON A.id_categoria=C.id_categoria WHERE C.id_estado= 2 GROUP BY A.id_categoria";

$resultado=$con->query($query);
 
while($row =$resultado->fetch_assoc()){
            
	$flag[]=$row;
}

print (json_encode($flag));


$con->close();
 
?>