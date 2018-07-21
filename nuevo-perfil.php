<?php
include_once 'plantillas/documento-inicio.inc.php';

?>
<head><link href="css/estilos_melvin.css" rel="stylesheet"></head>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span> 
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> 
            <a  href="index.php"><img class="btn-card" src="imagenes/aeo.png"   align="left" height="50"></a><!--Para ponerle una img ala pagina -->
            <a class="navbar-brand" href="#"><strong>Agenda Electrónica Oriental</strong></a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            
            <ul class="nav navbar-nav navbar-right">
                
                
                <li id="boton" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <strong>Panel de Control</strong><span class="caret"></span></a>
                    <ul id="despliege" class="dropdown-menu" role="menu">
                        <li><a href="mostrar_usuarios.php"><img src="imagenes/administracioncuenta.jpg" height="15"> <strong>Administración de Cuenta</strong></a></li>
                        <li><a href="administracion-de-perfiles.php"><img src="imagenes/administracionperfil.jpg" height="15"> Administración de Perfiles</a></li>
                    </ul>
                </li>
           
            </ul>
        </div> 
    </div>   
    
</nav>

<div class="container responsive">
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading " style="height: 40px">

                    <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>   Nuevo Perfil</h3>     
                </div>

                <div class="panel-body">
                    <form id="formularioCrear" name="formularioCrear" role="form" method="post" action="crearPerfil.php" target="formDestination">
<br/>
                        <div class="group">   
                            <input type="text" required name="nomborg_rec" id="nombreOrg">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-credit-card"></span> Nombre de Organización</label>
                        </div>

                        <div class="group">

                            <input type="tel" id="numtelOrg" name="numtel_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-earphone"></span> Número fijo</label>
                        </div>


                        <div class="group">
                            <input type="tel" id="numcelOrg" name="numcel_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-phone"></span> Número móvil</label>
                        </div>


                        <div class="group">      
                            <input type="text" required id="dirOrg" name="direccion_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-transfer"></span> Dirección</label>
                        </div>


                        <div class="group">
                            <input type="email" id="emailOrg" name="email_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-envelope"></span> e-mail</label>
                        </div>



                        <div class="group">    
                            <input type="text" required id="descOrg" name="desc_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-align-left"></span> Descripción de la organización</label>
                        </div>
                        
           
                        <div class="group">     
                            <input  type="text" id="latOrg" required name="lat_rec" >
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-map-marker"></span> Latitud</label>
                        </div>


                        <div class="group">   
                            <input type="text" id="longOrg" required name="longitud_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-map-marker"></span> Longitud</label>
                        </div>
                        <div
                        <h5>Ingrese su Ubicación</h5>
                        </div>
                         <script type="text/javascript" 
                            src="https://maps.google.com/maps/api/js?sensor=false"> 
                        </script> 

                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjOpSe_s3D6bX5abrOcQ5Yg8GGmUdhQn8&callback=initMap"
                         type="text/javascript"></script>
  
                            <script type="text/javascript"> 
                           function getCoords(marker){ 
                               $("#latOrg").attr("value",marker.getPosition().lat()); 
                                 $("#longOrg").attr("value",marker.getPosition().lng()); 
                                
                           } 
                           function initialize() { 
                               var myLatlng = new google.maps.LatLng(14.041458, -86.568061);



                               var myOptions = { 
                                   zoom: 15, 
                                   center: myLatlng, 
                                   mapTypeId: google.maps.MapTypeId.satelite, 
                               } 
                               var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 

                              marker = new google.maps.Marker({ 
                                     position: myLatlng, 
                                     draggable: true,
                                     title:'danli',
                               }); 
                               google.maps.event.addListener(marker, "dragend", function() {

                                               getCoords(marker); 

                               }); 

                                 marker.setMap(map); 
                               getCoords(marker); 


                             } 

                           </script> 
                           <body onload="initialize()">
                               <div id="map_canvas" style="width:100%; height:200px"></div><br> 
          
                    </body

                        <h5>Región</h5>
                        <select class="form-control" id="region" name="id_region"></select>

                        <h5>Categoría</h5>
                        <select class="form-control" id="categoria" name="id_categoria"></select>
                        <h5>Usuario</h5>
                        <select class="form-control" id="usuario" name="id_usuario"></select>
                        <br>   
                        <input type="hidden" name="imagen" value=""/>
                        <input type="hidden" name="nombre_imagen" value=""/>
                        <iframe class="oculto"  name="formDestination"></iframe>
                        <button class="form-control" name="guardar" id="guardar"  type="button" style="background-color:#005662; color:white;" ><span class="glyphicon glyphicon-floppy-disk"></span>  Guardar</button>
   
                    </form>

                </div>

                


            </div>


        </div>  

    </div>
</div>
<br>

<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/nuevoPerfil.js"></script>



<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
