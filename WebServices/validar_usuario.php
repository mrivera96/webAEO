<?php
require_once '../php-jwt-master/src/JWT.php';
require_once '../php-jwt-master/src/BeforeValidException.php';
require_once '../php-jwt-master/src/ExpiredException.php';
require_once '../php-jwt-master/src/SignatureInvalidException.php';

use Firebase\JWT\JWT;

  require '../config/Token.php';

    if (isset($_POST["nombre_usuario"]) && isset($_POST["contrasena"])) {
        $usuario = $_POST['nombre_usuario'];
        if(auth($usuario,$_POST['contrasena'])){
            
           $token = Token::generarToken( $usuario, $_POST["contrasena"] );
          $data = JWT::decode($token, Token::getKey(), array('HS256'));
          $datosSalida = array('token' => $token, 'rol' => $data -> rolUsr, 'idUrs' => $data -> idUsuario, 'ste' => $data -> usrSts);
            print json_encode($datosSalida);
        } else {
               print json_encode("Credenciales incorrectos");
        }
    } else {
        print json_encode('No envió credenciales.');
    }
    
    function auth($usuario,$contrasena){
        
        include '../config/ConexionABaseDeDatos.php';
        
        $query = "SELECT * FROM usuarios WHERE nombre_usuario = ? ";
        $resultado = $con->prepare($query);
        $resultado->bind_param("s", $usuario);
        $resultado->execute();
        $results=$resultado->get_result();
        $con->close();
       
        while($row=$results->fetch_assoc()){
            $result['usuario']=$row['nombre_usuario'];
            $result['contrasena']=$row['contrasena'];
            $result['idUsuario']=$row['id_usuario'];
            $result['rolUrs']=$row['rol'];
            $result['usrSts']=$row['estado_usuario'];
            $flag['datos'][]=$result;
        }
        if(mysqli_num_rows($results)>0 && password_verify($contrasena,$flag['datos'][0]['contrasena']) ){

            return true;
       }else{
           return false;
       }
    }
    


?>
