<?php
 include '../config/ConexionABaseDeDatos.php';
 include_once '../config/Errores.inc.php';
 include_once '../config/Token.php';


 if(isset($_POST["cto"]) && isset($_POST['tkn']) && !empty($_POST['tkn'])){

        if( Token::existeToken($_POST['tkn']) ){
            if(Token::vigenciaToken($_POST['tkn'])){
                $id_contacto=$_POST['cto'];


               $update="update contactos SET id_estado=4 where id_contacto=?";
               $resultado_update=$con->prepare($update);
               $resultado_update->bind_param("i",$id_contacto);
               $resultado_update->execute();

               print json_encode("Perfil Eliminado.");

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
