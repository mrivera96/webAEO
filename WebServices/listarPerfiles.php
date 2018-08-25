<?php   
 
include 'ConexionABaseDeDatos.php';
include_once 'Errores.inc.php';
if(isset($_GET['ctg'])){ 
    $categoria=$_GET['ctg']; 

    $query ="SELECT c.nombre_organizacion,c.numero_movil, c.numero_fijo, c.imagen, c.id_contacto,  "
            . "r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region where id_estado=2 and id_categoria=?";

    $resultado=$con->prepare($query);
    $resultado -> bind_param("i",$categoria);
    $resultado->execute();
    $resul=$resultado->get_result();

    while($row=$resul->fetch_assoc()){

            $flag[]=$row;
    }
    if(isset($flag)){
        print (json_encode($flag));
    }else{
        print json_encode(' Ocurrió un error, revise los datos de su request');
    }
}else{print json_encode(ERROR22);}

$con->close();
 
?>