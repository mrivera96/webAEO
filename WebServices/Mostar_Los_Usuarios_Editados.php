<?php

include '../config/ConexionABaseDeDatos.php';
include '../config/Errores.inc.php';
include '../config/Token.php';

if(isset($_POST["usuario"]) && isset($_POST['tkn']) && !empty($_POST['tkn'])){
  if( Token::existeToken($_POST['tkn']) ){
    if(Token::vigenciaToken($_POST['tkn'])){
      $id_usua=$_POST['usuario'];

      $query ="SELECT * FROM usuarios WHERE  id_usuario=?";
      $resultado=$con->prepare($query);
      $resultado->bind_param("i", $id_usua);
      $resultado->execute();

      $result=$resultado->get_result();



      while($row =$result->fetch_assoc()){

        $flag[]=$row;
      }
      if( isset($flag)){
        print (json_encode($flag));

      }else {
        print json_encode(ERROR22);
      }
      $con->close();
    }else{
      print json_encode("El Token ya expiró.");
    }

  }else{
    print json_encode("El token recibido NO existe en la base de datos.");
  }
}
?>
