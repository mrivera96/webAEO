<?php

$error_nomb=false;
$error_tel=false; 
$error_cel=false; 
$error_mail=false; 
$error_desc=false;
$error_dir=false;
$error_reg=false;
$error_cat=false;
$error_contacto=false;
$error_lat = false;
$error_long = false;

 include 'ConexionABaseDeDatos.php';
 include_once 'Errores.inc.php';
 
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
     print json_encode(ERROR1);
     return;
 }
 
 if (!isset($_POST['email_rec']) || empty($_POST['email_rec'])) {
    
} else {
    if (strpos($_POST['email_rec'], "@") === false || strpos($_POST['email_rec'], ".") === false) {
        $error_mail = true;
        print json_encode(ERROR4);
        return;
    }
}

if (!isset($_POST['numtel_rec']) || empty($_POST['numtel_rec'])) {
    if (!isset($_POST['numcel_rec']) || empty($_POST['numcel_rec'])) {
        $error_tel = true;
        print json_encode(ERROR2);
        return;
    }
} else {
    if (strlen($_POST['numtel_rec']) < 8 || strpos($_POST['numtel_rec'],"2")!==0 || strlen($_POST['numtel_rec']) > 8) {
        $error_tel = true;
        print json_encode(ERROR3);
        return;
    }
}

if (!isset($_POST['numcel_rec']) || empty($_POST['numcel_rec'])) {
    if (!isset($_POST['numtel_rec']) || empty($_POST['numtel_rec'])) {
        $error_cel = true;
        print json_encode(ERROR2);
        return;
    }
} else {
    if (strlen($_POST['numcel_rec']) < 8 || strlen($_POST['numcel_rec']) > 8) {
        $error_cel = true;
        print json_encode(ERROR3);
        return;
    }
}

if (!isset($_POST['direccion_rec']) || empty($_POST['direccion_rec'])) {
    $error_dir = true;
    print json_encode(ERROR5);
    return;
}

if (!isset($_POST['desc_rec']) || empty($_POST['desc_rec'])) {
    $error_desc = true;
    print json_encode(ERROR6);
    return;
}

if ($_POST['id_region'] < 3 || $_POST['id_region'] > 4) {
    $error_reg = true;
    print json_encode(ERROR8);
    return;
}

if ($_POST['id_categoria'] < 1 || $_POST['id_categoria'] > 11) {
    $error_cat = true;
    print json_encode(ERROR9);
    return;
}

if(!isset($_POST['cto']) || empty($_POST['cto'])){
    $error_contacto = true;
    print json_encode("se necesita un contacto.");
    return;
}
 
 
 
 
 if($error_nomb    === false &&
    $error_nomb   === false && 
    $error_tel    === false &&
    $error_cel    === false &&
    $error_dir    === false &&
    $error_mail   === false &&
    $error_desc   === false &&
    $error_reg    === false &&
    $error_cat    === false &&
    $error_contacto === false &&
    $error_lat === false &&
    $error_long === false){
     
        $id_contacto=$_POST['cto'];
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
        $imagen="";
        $nombre_imagen="";
        $query_search;
        $resultado;
        
        if(isset($_POST['imagen'])){
            $imagen=base64_decode($_POST['imagen']);
        }
        
         if(isset($_POST['nombre_imagen'])){
            $nombre_imagen=$_POST['nombre_imagen'];
        }
        
 
        if($nombre_imagen!=""){
            $path="imagenes/$nombre_imagen";
            file_put_contents($path,$imagen);
            $bytesImagen = file_get_contents($path);
            $url="http://aeo.web-hn.com/".$path;
            $query_search="update contactos SET nombre_organizacion=?, numero_fijo=?, numero_movil=?, direccion=?, e_mail=?, descripcion_organizacion=?, id_categoria=?, latitud=?, longitud=?, id_region=?, imagen=? where id_contacto=?";
            $resultado=$con->prepare($query_search);
            $resultado->bind_param("ssssssiddisi",$nomborg_rec,$numtel_rec,$numcel_rec,$direccion_rec,$email_rec,$desc_rec,$id_categoria,$lat_rec,$longitud_rec,$id_region,mysqli_real_escape_string($con,$url),$id_contacto);
            $resultado->execute();
        }else{
            $query_search="update contactos SET nombre_organizacion=?, numero_fijo=?, numero_movil=?, direccion=?, e_mail=?, descripcion_organizacion=?, id_categoria=?, latitud=?, longitud=?, id_region=? where id_contacto=?";
            $resultado=$con->prepare($query_search);
            $resultado->bind_param("ssssssiddii", $nomborg_rec, $numtel_rec, $numcel_rec, $direccion_rec, $email_rec, $desc_rec, $id_categoria, $lat_rec, $longitud_rec, $id_region, $id_contacto);
            $resultado->execute();
        }
       
 print json_encode(ERROR37);
}else{
        print json_encode(ERROR22);
        
}
$con->close();
 
?>