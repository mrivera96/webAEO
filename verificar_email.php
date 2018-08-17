<?php

include 'ConexionABaseDeDatos.php';
 include 'Errores.inc.php';

if (isset($_GET["correo"])) {
    $corre = $_GET['correo'];

    $query = "SELECT  correo FROM usuarios where correo=? ";
    $resultado = $con->prepare($query);
    $resultado->bind_param("s", $corre);
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
