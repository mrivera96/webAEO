<?php


include 'ConexionABaseDeDatos.php';


    if (isset($_GET["nombre_usuario"]) && isset($_GET["contrasena"])) {
        $usuario = $_GET['nombre_usuario'];
        $password = $_GET['contrasena'];

        $query = "SELECT * FROM usuarios WHERE nombre_usuario = ? ";
        $resultado = $con->prepare($query);
        $resultado->bind_param("s", $usuario);
        $resultado->execute();
        $results=$resultado->get_result();

        while($row=$results->fetch_assoc()){

                $flag['datos']=$row;
        }
        if(mysqli_num_rows($results)>0 && password_verify($password,$flag['datos']['contrasena']) ){


         print(json_encode($flag));
       }else{
         print json_encode("nada");
       }

    } else {

    }

$con->close();
?>
