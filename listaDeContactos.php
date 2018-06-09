<?php
    include 'ConexionABaseDeDatos.php';

 
$query ="SELECT c.nombre_organizacion, c.numero_fijo, c.numero_movil, c.imagen, c.id_contacto,  r.nombre_region from contactos as c join regiones as r on c.id_region=r.id_region";

$resultado=$con->query($query);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Lista de contactos</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>

    <body>
        
        <!-- NAVBAR-->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">   
                    <a class="navbar-brand" href="#">Agenda Electrónica Oriental</a>
                </div>

            </div>
        </nav>
      
        <div class="container" style="background-color: skyblue; height: 60px; width: 80% ; align-content: center;"><h3>Nombre de categoría</h3></div>
        
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
        
        
        <!-- Footer -->
        <div class="navbar navbar-default navbar-fixed-bottom">
            <div class="container">
                <p class="navbar-text pull-left">© 2014 - Site Built By Mr. M.
                    <a href="http://tinyurl.com/tbvalid" target="_blank" >HTML 5 Validation</a>
                </p>

                <a href="http://youtu.be/zJahlKPCL9g" class="navbar-btn btn-danger btn pull-right">
                    <span class="glyphicon glyphicon-star"></span>  Subscribe on YouTube</a>
            </div>
        </div>
        <!-- Footer -->
        
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>

    
</html>