<?php
include_once 'ConexionABaseDeDatos.php';


$busqueda=$_POST['busqueda'];

$categoria=$_POST['categoria'];

$region=$_POST['region'];

$sql="";


 
if ($region == 0) {

    if ($categoria == 0) {

        $sql = "SELECT c.nombre_organizacion, c.imagen, c.id_contacto,  r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region where id_estado=2 and c.nombre_organizacion like '%{$busqueda}%' or id_estado=2 and c.numero_fijo like  '%{$busqueda}%' "
                . "or id_estado=2 and c.numero_movil like  '%{$busqueda}%'";
    } else if ($categoria != 0) {

        $sql = "SELECT c.nombre_organizacion, c.imagen, c.id_contacto,  r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region where id_estado=2 and c.nombre_organizacion like '%{$busqueda}%' and id_categoria='{$categoria}' or id_estado=2 and c.numero_fijo like  '%{$busqueda}%'  and id_categoria='{$categoria}'"
                . "or id_estado=2 and c.numero_movil like  '%{$busqueda}%' and id_categoria='{$categoria}'";
    }
} else if ($region != 0) {

    if ($categoria == 0) {

        $sql = "SELECT c.nombre_organizacion, c.imagen, c.id_contacto,  r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region where id_estado=2 and c.nombre_organizacion like '%{$busqueda}%' and c.id_region='{$region}' or id_estado=2 and c.numero_fijo like  '%{$busqueda}%' and c.id_region='{$region}' "
                . "or id_estado=2 and c.numero_movil like  '%{$busqueda}%' and c.id_region='{$region}'";
    } else if ($categoria != 0) {

        $sql = "SELECT c.nombre_organizacion, c.imagen, c.id_contacto,  r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region where id_estado=2 and c.nombre_organizacion like '%{$busqueda}%' and c.id_region='{$region}' and c.id_categoria='{$categoria}' or id_estado=2 and c.numero_fijo like  '%{$busqueda}%' "
                . " and c.id_region='{$region}'and c.id_categoria='{$categoria}'"
                . "or id_estado=2 and c.numero_movil like  '%{$busqueda}%' and c.id_region='{$region}' and c.id_categoria='{$categoria}'";
    }
}

$resultado=$con->query($sql);

while($row =$resultado->fetch_assoc())
{

            
	$flag[]=$row;

}



print (json_encode($flag));



$con->close();

?>
