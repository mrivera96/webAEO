<?php

include 'ConexionABaseDeDatos.php';

if (isset($_GET["id_contacto"])) {
    $id_contacto = $_GET['id_contacto'];


    $query = "SELECT id_contacto, imagen,nombre_organizacion,numero_fijo,numero_movil,e_mail,direccion,descripcion_organizacion,latitud,longitud FROM contactos WHERE id_contacto=?";

    $resultado = $con->prepare($query);
    $resultado->bind_param("i", $id_contacto);
    $resultado->execute();
    $resul = $resultado->get_result();
    
    while ($row = mysqli_fetch_array($resul)) {
         $result["id_contacto"] = ($row['id_contacto']);
        $result["imagen"] = ($row['imagen']);
        $result["nombre_organizacion"] = $row['nombre_organizacion'];
        $result["numero_fijo"] = $row['numero_fijo'];
        $result["numero_movil"] = $row['numero_movil'];
        $result["e_mail"] = $row['e_mail'];
        $result["direccion"] = $row['direccion'];
        $result["descripcion_organizacion"] = $row['descripcion_organizacion'];
        $result["latitud"] = $row['latitud'];
        $result["longitud"] = $row['longitud'];


        $flag[] = $result;
    }
    
    if(isset($flag)){
        print(json_encode($flag));
    } else {
        print json_encode("Ocurrió un error");
    }
}
 else {
        print(json_encode("No se recibieron variables"));
}
$con->close();

?>