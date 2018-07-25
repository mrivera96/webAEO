<?php

include 'ConexionABaseDeDatos.php';

session_start();

if (isset($_POST["nomborg_rec"]) && isset($_POST["numtel_rec"]) && isset($_POST["numcel_rec"]) && isset($_POST["direccion_rec"]) && isset($_POST["email_rec"]) && isset($_POST["desc_rec"]) && isset($_POST["id_categoria"]) && isset($_POST["lat_rec"]) && isset($_POST["longitud_rec"]) && isset($_POST["id_region"])) {
    $nomborg_rec = $_POST['nomborg_rec'];
    $numtel_rec = $_POST['numtel_rec'];
    $numcel_rec = $_POST['numcel_rec'];
    $direccion_rec = $_POST['direccion_rec'];
    $email_rec = $_POST['email_rec'];
    $desc_rec = $_POST['desc_rec'];
    $id_categoria = $_POST['id_categoria'];
    $lat_rec = $_POST['lat_rec'];
    $longitud_rec = $_POST['longitud_rec'];
    $id_region = $_POST['id_region'];

    $id_usuario = $_SESSION['user_id'];
}


$query = "INSERT INTO contactos(nombre_organizacion,numero_fijo,numero_movil,direccion, descripcion_organizacion, e_mail, id_categoria, latitud,  longitud, id_region, id_usuario, id_estado)VALUES(?,?,?,?,?,?,?,?,?,?,?,1)";

$resultado = $con->prepare($query);
$resultado->bind_param("ssssssiddii", $nomborg_rec, $numtel_rec, $numcel_rec, $direccion_rec, $desc_rec, $email_rec, $id_categoria, $lat_rec, $longitud_rec, $id_region, $id_usuario);
$resultado->execute();
//$query_exec =mysqli_query($con,$query_search);


$con->close();
?>