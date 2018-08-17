<?php
 
include 'ConexionABaseDeDatos.php';


if (isset($_POST["id_usuario"])) {


$usuario= isset($_POST['id_usuario']) ? $_POST['id_usuario'] : 0;

 
$query ="SELECT * FROM contactos where id_usuario =? and id_estado=1";
$resultado = $con->prepare($query);
$resultado->bind_param("i", $usuario);
$resultado->execute();
$resul = $resultado->get_result();



while($row =$resul->fetch_assoc()) {
 
	$flag[] = $row;
}

 if(isset($flag)){
         print(json_encode($flag));
    } else {
        print("No hay resultados");
    }
}else {
        print("No se recibieron variables");
}

$con->close();
 
?>
