<?php
 
include 'ConexionABaseDeDatos.php';
$id_estado=2;
$id_stado=1;




$usuario= isset($_POST['id_usuario']) ? $_POST['id_usuario'] : 0;

 
$query ="SELECT * FROM contactos where id_usuario like'{$usuario}'and id_estado like'{$id_estado}' or id_usuario like'{$usuario}'and id_estado like'{$id_stado}'";
$resultado=$con->query($query);
$flag = array();

while($row =$resultado->fetch_assoc()) {
 
	$flag[] = $row;
}

//if(count($flag))
    print(json_encode($flag));
//else
    //print("{data: []}");
$con->close();
 
?>