<?php   
 
include 'ConexionABaseDeDatos.php';
 if (isset($_GET['id_estado'])) {
    $id_estado = $_GET['id_estado'];
$query ="SELECT A.* ,COUNT(C.id_estado) as coun FROM categorias AS A JOIN contactos AS C ON A.id_categoria=C.id_categoria WHERE C.id_estado= ? GROUP BY A.id_categoria";

$resultado = $con->prepare($query);
    $resultado->bind_param("i", $id_estado);
    $resultado->execute();
    $resul = $resultado->get_result();

    while ($row = $resul->fetch_assoc()) {

        $flag[] = $row;
    }
    if (isset($flag)) {
        print(json_encode($flag));
    } else {
 print json_encode(ERROR38); 
    }
} else {
     print json_encode(ERROR22); 

}

$con->close();
?>