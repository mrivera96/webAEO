<?php
include_once 'ConexionABaseDeDatos.php';
$busqueda = $_GET['busqueda'];

$categoria=$_GET['categoria'];

$region=$_GET['region'];

$sql="";


 
if ($region == 0) {

    if ($categoria == 0) {

        $sql = "SELECT c.nombre_organizacion, c.imagen, c.id_contacto,c.numero_fijo,c.numero_movil,r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region where id_estado=2 and c.nombre_organizacion like CONCAT('%',?,'%') or id_estado=2 and c.numero_fijo like CONCAT('%',?,'%')or id_estado=2 and c.numero_movil like CONCAT('%',?,'%') ";//'%'||?||'%'
         $resultado=$con->prepare($sql);
    $resultado->bind_param("sss",$busqueda,$busqueda,$busqueda);
    $resultado->execute();
    $resul=$resultado->get_result();    
    } else if ($categoria != 0) {

        $sql = "SELECT c.nombre_organizacion, c.imagen, c.id_contacto, c.numero_fijo,c.numero_movil, r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region where id_estado=2 and c.nombre_organizacion like CONCAT('%',?,'%') and id_categoria= ? or id_estado=2 and c.numero_fijo like  CONCAT('%',?,'%')  and id_categoria=? or id_estado=2 and c.numero_movil like  CONCAT('%',?,'%') and id_categoria=?";
         $resultado=$con->prepare($sql);
    $resultado->bind_param("sisisi", $busqueda,$categoria, $busqueda,$categoria,$busqueda,$categoria);
    $resultado->execute();
    $resul=$resultado->get_result();
    }
} else if ($region != 0) {

    if ($categoria == 0) {

        $sql = "SELECT c.nombre_organizacion, c.imagen, c.id_contacto,c.numero_fijo,c.numero_movil,  r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region where id_estado=2 and c.nombre_organizacion like CONCAT('%',?,'%') and c.id_region= ? or id_estado=2 and c.numero_fijo like  CONCAT('%',?,'%') and c.id_region= ? or id_estado=2 and c.numero_movil like  CONCAT('%',?,'%') and c.id_region= ?";
                    
          $resultado=$con->prepare($sql);
    $resultado->bind_param("sisisi",$busqueda,$region,$busqueda,$region,$busqueda,$region);
    $resultado->execute();
    $resul=$resultado->get_result();
    } else if ($categoria != 0) {

        $sql = "SELECT c.nombre_organizacion, c.imagen, c.id_contacto,c.numero_fijo,c.numero_movil,  r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region where id_estado=2 and c.nombre_organizacion like CONCAT('%',?,'%') and c.id_region=? and c.id_categoria=? or id_estado=2 and c.numero_fijo like CONCAT('%',?,'%') and c.id_region=? and c.id_categoria=? or id_estado=2 and c.numero_movil like CONCAT('%',?,'%') and c.id_region=? and c.id_categoria= ?";
        
         $resultado=$con->prepare($sql);
     $resultado->bind_param("siisiisii",$busqueda,$region, $categoria,$busqueda,$region,$categoria,$busqueda,$region,$categoria);
    $resultado->execute();
    $resul=$resultado->get_result();
    }
}

    while($row =$resul->fetch_assoc())
    {       
	$flag[]=$row;

    }
    if (isset($flag)){
    
    print (json_encode($flag));
    
    } else {
        print 'Ocurrio un error, revise los datos de su solicitud';    
    } 

$con->close();

?>
