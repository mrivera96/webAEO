<?php
 
 include 'ConexionABaseDeDatos.php';
 if(isset($_POST['id_contacto'])    &&
    isset($_POST['nomborg_rec'])    &&
    isset($_POST['numtel_rec'])     &&
    isset($_POST['numcel_rec'])     &&
    isset($_POST['direccion_rec'])  &&
    isset($_POST['email_rec'])      &&
    isset($_POST['desc_rec'])       &&
    isset($_POST['id_categoria'])   &&
    isset($_POST['lat_rec'])        &&
    isset($_POST['longitud_rec'])   &&
    isset($_POST['id_region'])      &&
    isset($_POST['imagen'])         &&
    isset($_POST['nombre_imagen'])){
     
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
        $resultado;
        
        $path="imagenes/$nombre_imagen";
        file_put_contents($path,$imagen);
        $bytesImagen = file_get_contents($path);
 
        if($nombre_imagen!=""){

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
       

}else{
        print json_encode('ERROR Revise los parametros de su request.');
        
}
$con->close();
 
?>