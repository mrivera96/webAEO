<?php

include '../config/ConexionABaseDeDatos.php';
require '../funcs/funcs.php';

$user_id= $con->real_escape_string($_POST['user_id']);
$token= $con->real_escape_string($_POST['token']);
$password= $con->real_escape_string($_POST['password']);
$con_password= $con->real_escape_string($_POST['con_password']);


if(validaPassword($password,$con_password)){
    $pass_hash = hashPassword($password);
    
    if(cambiaPassword($password,$user_id,$token)){
        echo "Contraseña modificada con éxito!";
        echo "<br> <a href='../Vistas/login.php'>Iniciar Sesión</a>";
    } else {
        echo 'Error al modificar la contraseña';
    }
}else{
    echo 'Las contraseñas no coinciden';
}

?>
