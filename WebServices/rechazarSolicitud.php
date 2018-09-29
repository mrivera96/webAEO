<?php
include '../config/ConexionABaseDeDatos.php';
include_once '../config/Errores.inc.php';
include '../config/Token.php';
require_once '../php-jwt-master/src/JWT.php';
require_once '../php-jwt-master/src/BeforeValidException.php';
require_once '../php-jwt-master/src/ExpiredException.php';
require_once '../php-jwt-master/src/SignatureInvalidException.php';
use Firebase\JWT\JWT;

if(isset($_POST["cto"]) && isset($_POST['tkn']) && !empty($_POST['tkn'])){
  if( Token::existeToken($_POST['tkn']) ){
  //El token recibido SI existe en la base de datos.
      if(Token::vigenciaToken($_POST['tkn'])){
          $data = JWT::decode($_POST['tkn'],Token::getKey(),array('HS256'));

          if($data -> rolUsr == 1){
              $id_contacto=$_POST['cto'];

              $update="update contactos SET id_estado=3 where id_contacto=?";
              $resultado=$con -> prepare($update);
              $resultado -> bind_param("i",$id_contacto);
              $resultado -> execute();
              $con->close();
          }
      }
  }
}else{
  print json_encode(ERROR22);
}
?>
