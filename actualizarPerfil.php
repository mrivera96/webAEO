<?php
 
 include 'ConexionABaseDeDatos.php';
 
    $id_contacto=$_POST['id_contacto'];
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
    $imagen=base64_decode($_POST['imagen']);
    $nombre_imagen=$_POST['nombre_imagen'];
    $query_search;
        
        $path="imagenes/$nombre_imagen";
        file_put_contents($path,$imagen);
        $bytesImagen = file_get_contents($path);
 
 if($nombre_imagen!=""){
      
     $url="http://aeo.web-hn.com/".$path;
     $query_search="update contactos SET nombre_organizacion='{$nomborg_rec}',numero_fijo='{$numtel_rec}',numero_movil='{$numcel_rec}',direccion='{$direccion_rec}',e_mail='{$email_rec}',descripcion_organizacion='{$desc_rec}', id_categoria='{$id_categoria}', latitud='{$lat_rec}', longitud='{$longitud_rec}', id_region='{$id_region}', imagen='".mysqli_real_escape_string($con,$url)."' where id_contacto='{$id_contacto}'";

 }else{
          $query_search="update contactos SET nombre_organizacion='{$nomborg_rec}',numero_fijo='{$numtel_rec}',numero_movil='{$numcel_rec}',direccion='{$direccion_rec}',e_mail='{$email_rec}',descripcion_organizacion='{$desc_rec}', id_categoria='{$id_categoria}', latitud='{$lat_rec}', longitud='{$longitud_rec}', id_region='{$id_region}' where id_contacto='{$id_contacto}'";
 }
  
if($query_exec =mysqli_query($con,$query_search)){
    echo "realizado correctamente";
}else{
    echo "Para escapar caracteres se hace \"así\".";
}


$con->close();
 
?>