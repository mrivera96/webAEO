<?php
    include_once 'ConexionABaseDeDatos.php';
    include_once 'plantillas/documento-inicio.inc.php';
    include_once 'plantillas/barra-de-navegacion-navbar.inc.php';

 
$query ="SELECT c.nombre_organizacion, c.numero_fijo, c.numero_movil, c.imagen, c.id_contacto,  r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region";

$resultado=$con->query($query);
?>
      
        <div class="container" style="background-color: skyblue; width: 80% ; align-content: center;"><h3>Nombre de categoría</h3></div>
        
        <div class="container pre-scrollable" style="width: 80%;  background-color: white " >
            <div class="row" style="margin-top: 10px;" >

                <?php
                while ($row = mysqli_fetch_array($resultado)) {
                   
                   $salida=' <div class = "col-md-12">'.
                    '<div class = "media">'.
                    '<div class = "media-left">'.
                    '<a href = "#">';
                   if($row['imagen']!==""){
                       $salida = $salida . '<img class="img-circle" src="'.$row['imagen'].'" style="width:150px; height:150px;">';
                   }else{
                       $salida = $salida . '<img class="img-circle" src="https://cdn.icon-icons.com/icons2/510/PNG/512/ios7-contact_icon-icons.com_50286.png" style="width:150px; height:150px;">';
                   }
                   $salida = $salida . 
                    '</a>'.
                    '</div>'.
                    '<div class = "media-body">'.
                    '<h2 class = "media-heading">'.$row['nombre_organizacion'].'</h2>';
                   if($row['numero_fijo']!==""){
                       $salida = $salida . '<h3>'.$row['numero_fijo'].'</h3>';
                   }else{
                       $salida = $salida . '<h3>'.$row['numero_movil'].'</h3>';
                   }
                    $salida = $salida.
                    '<h3>'.$row['nombre_region'].'</h3>'.
                    '<hr/>'.
                    '</div>'.
                    '</div>'.
                    '</div>';
                   echo $salida;
                }
                ?>
                

            </div>

        </div>
        
  <?php
  include_once 'plantillas/documento-cierre.inc.php';
  
  ?>
        

    
</html>