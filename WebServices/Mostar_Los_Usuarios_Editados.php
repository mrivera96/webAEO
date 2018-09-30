<?php

include '../config/ConexionABaseDeDatos.php';
include '../config/Errores.inc.php';

 if(isset($_POST["usuario"]) && isset($_POST['tkn']) && !empty($_POST['tkn'])){
 $id_usua=$_GET['usuario'];
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
 print json_encode(ERROR22);
}
  $con->close();




?>
