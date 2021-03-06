<?php

include '../config/ConexionABaseDeDatos.php';

session_start();
 
$error_nomb=false;
$error_tel=false; 
$error_cel=false; 
$error_mail=false; 
$error_desc=false;
$error_dir=false;
$error_reg=false;
$error_cat=false;
$error_lat = false;
$error_long = false;



    
if(!isset($_POST['lat_rec'])){
    $error_lat=true;
    print json_encode('se necesita latitud.');
    return;
}

if(!isset($_POST['longitud_rec'])){
    $error_long=true;
    print json_encode("se necesita longitud.");
    return;
}


 if(!isset($_POST['nomborg_rec']) || empty($_POST['nomborg_rec'])){
     $error_nomb=true;
     print json_encode("Se necesita un nombre.");
     return;
 }
 
 if (!isset($_POST['email_rec']) || empty($_POST['email_rec'])) {
    
} else {
    if (strpos($_POST['email_rec'], "@") === false || strpos($_POST['email_rec'], ".") === false) {
        $error_mail = true;
        print json_encode("e-mail incorrecto.");
        return;
    }
}

if (!isset($_POST['numtel_rec']) || empty($_POST['numtel_rec'])) {
    if (!isset($_POST['numcel_rec']) || empty($_POST['numcel_rec'])) {
        $error_tel = true;
        print json_encode("ingrese al menos un número.");
        return;
    }
} else {
    if (strlen($_POST['numtel_rec']) < 8 || strpos($_POST['numtel_rec'],"2")!==0 || strlen($_POST['numtel_rec']) > 8) {
        $error_tel = true;
        print json_encode("número inválido.");
        return;
    }
}

if (!isset($_POST['numcel_rec']) || empty($_POST['numcel_rec'])) {
    if (!isset($_POST['numtel_rec']) || empty($_POST['numtel_rec'])) {
        $error_cel = true;
        print json_encode("ingrese al menos un número.");
        return;
    }
} else {
    if (strlen($_POST['numcel_rec']) < 8 || strlen($_POST['numcel_rec']) > 8) {
        $error_cel = true;
        print json_encode("número inválido.");
        return;
    }
}

if (!isset($_POST['direccion_rec']) || empty($_POST['direccion_rec'])) {
    $error_dir = true;
    print json_encode("se necesita una dirección.");
    return;
}

if (!isset($_POST['desc_rec']) || empty($_POST['desc_rec'])) {
    $error_desc = true;
    print json_encode("se necesita una descripción.");
    return;
}

if ($_POST['id_region'] < 3 || $_POST['id_region'] > 4) {
    $error_reg = true;
    print json_encode("región inválida.");
    return;
}

if ($_POST['id_categoria'] < 1 || $_POST['id_categoria'] > 11) {
    $error_cat = true;
    print json_encode("categoría inválida.");
    return;
}


if( $error_nomb    === false &&
    $error_nomb   === false && 
    $error_tel    === false &&
    $error_cel    === false &&
    $error_dir    === false &&
    $error_mail   === false &&
    $error_desc   === false &&
    $error_reg    === false &&
    $error_cat    === false &&
    $error_lat === false &&
    $error_long === false
    ){
     
        $nomborg_rec=$_POST['nomborg_rec'];
        $numtel_rec=$_POST['numtel_rec'];
        $numcel_rec=$_POST['numcel_rec'];
        $direccion_rec=$_POST['direccion_rec'];
        $email_rec=$_POST['email_rec'];
        $desc_rec=$_POST['desc_rec'];
        $id_categoria=$_POST['id_categoria'];
        $lat_rec=$_POST['lat_rec'];
        $longitud_rec=$_POST['longitud_rec'];
        $id_region=$_POST['id_region'];
		$id_usuario =$_SESSION['idUrs'];
        $imagen="";
        $nombre_imagen="";
        
        if(isset($_POST['imagen'])){
            $imagen=base64_decode($_POST['imagen']);
        }
        
        if(isset($_POST['nombre_imagen'])){
            $nombre_imagen=$_POST['nombre_imagen'];
        }
  
    $query_search;
    
    
  
    if($nombre_imagen!=""){
        $path="imagenes/$nombre_imagen";
        file_put_contents($path,$imagen);
        $bytesImagen = file_get_contents($path);
        $url="http://aeo.web-hn.com/".$path;
        $query_search="INSERT INTO contactos(
            nombre_organizacion,
            numero_fijo,
            numero_movil,
            direccion, 
            descripcion_organizacion, 
            e_mail, 
            id_categoria, 
            latitud,  
            longitud, 
            id_region, 
            id_usuario, 
            id_estado,
            imagen)
            VALUES(
                ?, 
                ?, 
                ?, 
                ?,
                ?,
                ?, 
                ?, 
                ?, 
                ?, 
                ?, 
                ?,
                1,
                ?)";
        $resultado=$con->prepare($query_search);
            $resultado->bind_param("ssssssiddiis",$nomborg_rec,$numtel_rec,$numcel_rec,$direccion_rec,$desc_rec,$email_rec,
                    $id_categoria,$lat_rec,$longitud_rec,$id_region,$id_usuario,mysqli_real_escape_string($con,$url));
            $resultado->execute();
    }else{
        $query_search = "INSERT INTO contactos(
            nombre_organizacion,
            numero_fijo,
            numero_movil,
            direccion, 
            descripcion_organizacion, 
            e_mail, 
            id_categoria, 
            latitud,  
            longitud, 
            id_region, 
            id_usuario, 
            id_estado
            )
            VALUES(
                ?, 
                ?, 
                ?, 
                ?,
                ?,
                ?, 
                ?, 
                ?, 
                ?, 
                ?, 
                ?,
                1)";
        $resultado = $con->prepare($query_search);
        $resultado->bind_param("ssssssiddii", $nomborg_rec, $numtel_rec, $numcel_rec, 
                $direccion_rec, $desc_rec, $email_rec, $id_categoria, $lat_rec, $longitud_rec, $id_region, $id_usuario);
        $resultado->execute();
    }
    print json_encode("Perfil creado correctamente.");
    }else{
        print json_encode("Ocurrió un error con los paramámetros recibidos.");
    }
       
$con->close();
 
?>