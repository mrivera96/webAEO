<?php

include '../config/ConexionABaseDeDatos.php';
 include '../config/Errores.inc.php';

if (isset($_GET["verificausu"])) {
    $nombre_usua = $_GET['verificausu'];

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
