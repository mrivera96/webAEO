<?php
require_once '../php-jwt-master/src/JWT.php';
require_once '../php-jwt-master/src/BeforeValidException.php';
require_once '../php-jwt-master/src/ExpiredException.php';
require_once '../php-jwt-master/src/SignatureInvalidException.php';


use Firebase\JWT\JWT;

class Token{


    public static function getKey(){
        $key = "@e%o$2&0!1/8";
       return $key;
    }
    //Verifica la existencia de un token
    public static function existeToken($tkn){

        include 'ConexionABaseDeDatos.php';


        $existeTkn = "SELECT * FROM usuarios WHERE token = ?";
        $stm = $con -> prepare($existeTkn);
        $stm -> bind_param("s",  $tkn);
        $stm -> execute();
        $results = $stm->get_result();

        if( mysqli_num_rows($results) > 0 ){
          return true;
        }else{
          return false;
        }

    }

    //Hace la consulta, genera y devuelve el token
    public static function generarToken($usr){
        include 'ConexionABaseDeDatos.php';
        
        $query = "SELECT * FROM usuarios WHERE nombre_usuario = ?";
        $resultado = $con -> prepare($query);
        $resultado -> bind_param("s", $usr);
        $resultado -> execute();
        $results = $resultado->get_result();
        $con -> close();

        while($row=$results->fetch_assoc()){
            
            $result['nUsr']=$row['nombre_usuario'];
            $result['idUsr']=$row['id_usuario'];
            $result['rolUsr']=$row['rol'];
            $result['estUsr']=$row['estado_usuario'];

	    $flag['datos'][]=$result;
        }

        $time = time();

        $token = array(
                'iat' => $time,
                'exp' =>  $time + 259200,
                'nUsuario' => $flag['datos'][0]['nUsr'],
                'idUsuario' => $flag['datos'][0]['idUsr'],
                'rolUsr' => $flag['datos'][0]['rolUsr'],
                'usrSts' => $flag['datos'][0]['estUsr']
            );

        $jwt = JWT::encode($token, self::getKey() );


        self ::insertToken($jwt, $flag['datos'][0]['idUsr']);     //Llama al método que inserta el token
        return $jwt;
    }

    //Este metodo inserta el token en la base de datos
    private static function insertToken($jwt, $id){
        include 'ConexionABaseDeDatos.php';
        $updToken = "UPDATE usuarios SET token = ? where id_usuario = ?";
        $stm = $con -> prepare($updToken);
        $stm -> bind_param("si", $jwt , $id);
        $stm -> execute();
    }

    public static function revocarToken($tkn){
        include 'ConexionABaseDeDatos.php';
        $clave = self::getKey();
        try{
            $data = JWT::decode( $tkn, $clave, array('HS256') );
            $id = $data -> idUsuario;
            $updToken = "UPDATE usuarios SET token = '' WHERE id_usuario = ? AND token = ?";
            $stm = $con -> prepare($updToken);
            $stm -> bind_param("is", $id, $tkn );
            $stm -> execute();

        }catch(Exception $e){
            $e -> getMessage();
        }

    }

    public static function vigenciaToken($tkn){
        try{
          $data = JWT::decode( $tkn, self::getKey(), array('HS256') );

          if(date('m/d/Y',time()) > date('m/d/Y', $data -> exp)   ){
            return false;
          }else{
            return true;
          }
        }catch(Exception $e){

        }
    }
}

?>