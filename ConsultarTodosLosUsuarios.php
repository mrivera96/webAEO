<?php

include 'ConexionABaseDeDatos.php';
include 'Errores.inc.php';

if (isset($_POST['estado_usuario'])) {
    $estado_usuario = $_POST['estado_usuario'];
    $query = "SELECT u.id_usuario, u.nombre_usuario,r.descripcion_rol FROM usuarios as u JOIN roles as r on u.rol=r.id_rol where estado_usuario=? ORDER BY u.nombre_usuario";
    $resultado = $con->prepare($query);
    $resultado->bind_param("i", $estado_usuario);
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