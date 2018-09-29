<?php
 include '../config/ConexionABaseDeDatos.php';
 include '../Errores.inc.php';


$flag=array();

 if(isset($_POST["usuario"])&& isset($_POST['tkn']) && !empty($_POST['tkn'])){
    if( Token::existeToken($_POST['tkn']) ){
        if(Token::vigenciaToken($_POST['tkn'])){
            $id_usua=$_POST['usuario'];
            $update="update usuarios SET estado_usuario=2 where id_usuario=?";


           $resultado_update = $con->prepare($update);
           $resultado_update->bind_param("i", $id_usua);
           $resultado_update->execute();
        }else{
          print json_encode("El Token ya expiró.");
        }
    }else{
        print json_encode("El token recibido NO existe en la base de datos.");
    }
 }else{
 print json_encode(ERROR22);   
 }
 $con->close();
 
?> 