<?php
 
include 'ConexionABaseDeDatos.php';
$id_estado=2;
$id_stado=1;




$usuario= isset($_GET['id_usuario']) ? $_GET['id_usuario'] : 0;

 
$records = $conn->prepare ("SELECT COUNT[id_usuario] * FROM contactos where id_usuario = ? and id_estado = 1 or id_usuario = ? and id_estado = 2");

$records->bindParam(':nombre_usuario', $_POST['nombre_usuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
 if (count($results) > 0 && (password_verify($_POST['password'], $results['contrasena']) )) {
	//$resultado=$con->query($query);
//$flag = array();

while($row =$resultado->fetch_assoc()) {
 
	$flag[] = $row;
}

//if(count($flag))
    print(json_encode($flag));
//else
    //print("{data: []}");
	
}else{
	print(json_encode("error "));
}
