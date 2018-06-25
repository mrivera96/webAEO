<?php
 
 include 'ConexionABaseDeDatos.php';
 
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
        $id_usuario=$_POST['id_usuario'];
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
                '{$nomborg_rec}', 
                '{$numtel_rec}', 
                '{$numcel_rec}', 
                '{$direccion_rec}',
                '{$desc_rec}',
                '{$email_rec}', 
                '{$id_categoria}', 
                '{$lat_rec}', 
                '{$longitud_rec}', 
                '{$id_region}', 
                '{$id_usuario}',
                2,
                '".mysqli_real_escape_string($con,$url)."')";
    }else{
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
            id_estado
            )
            VALUES(
                '{$nomborg_rec}', 
                '{$numtel_rec}', 
                '{$numcel_rec}', 
                '{$direccion_rec}',
                '{$desc_rec}',
                '{$email_rec}', 
                '{$id_categoria}', 
                '{$lat_rec}', 
                '{$longitud_rec}', 
                '{$id_region}', 
                '{$id_usuario}',
                2)";
    }
 
$query_exec =mysqli_query($con,$query_search);


$con->close();
 
?>