<?php

include 'ConexionABaseDeDatos.php';
 include 'Errores.inc.php';

if (isset($_GET["nombre_usuario"])) {
    $nombre_usua = $_GET['nombre_usuario'];

    $query = "SELECT  nombre_usuario FROM usuarios where nombre_usuario=? ";
    $resultado = $con->prepare($query);
    $resultado->bind_param("s", $nombre_usua);
    $resultado->execute();

    $result = $resultado->get_result();



    while ($row = $result->fetch_assoc()) {

        $flag[] = $row;
    }
    if (isset($flag)) {
        print ('1');
    } else {
        print ('0');
    }
} else {
 print json_encode(ERROR22);   
}
$con->close();
?>
