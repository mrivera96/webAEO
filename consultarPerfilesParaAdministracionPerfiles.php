<?php
 
include 'ConexionABaseDeDatos.php';
if(isset($_POST['ste'])){
    $id_estado=$_POST['ste'];
    
    $query ="SELECT c.id_contacto, c.nombre_organizacion, c.imagen, u.nombre_usuario FROM contactos as c join usuarios as u on c.id_usuario=u.id_usuario where c.id_estado=? order by c.nombre_organizacion";
    $resultado=$con->prepare($query);
    $resultado -> bind_param("i",$id_estado);
    $resultado->execute();
    $resul=$resultado->get_result();

    while ($row = $resul->fetch_assoc()) {

        $flag[] = $row;
    }
    if (isset($flag)) {
        print(json_encode($flag));
    } else {
        print("No hay resultados");
    }
}else{print 'No se recibieron variables';}

$con->close();
 
?>