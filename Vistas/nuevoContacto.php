<?php
$titulo = 'Formulario Registro '; 
include_once '../plantillas/documento-inicio.inc.php';
include_once '../plantillas/barra-de-navegacion-navbar.inc.php';
if (isset($_SESSION['idUrs'])&& isset($_SESSION['token']) && !empty($_SESSION['token'])) {
    
?>
<head>
    <link href="../css/nuevoperfil.css" rel="stylesheet">
    <link href="../css/estilos_melvin.css" rel="stylesheet">
</head>

<div class="container responsive">
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading " style="height: 40px">

                    <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>   Nuevo Perfil</h3>     
                </div>

                <div class="panel-body">
                    <form id="formularioCrear" name="formularioCrear" role="form" method="post" action="../WebServices/insertarPerfilUsuario.php" target="formDestination">
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
                        
                        <h5>Ingrese su Ubicación</h5>
                        
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
                                   mapTypeId: google.maps.MapTypeId.satelite
                               } 
                               var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 

                              marker = new google.maps.Marker({ 
                                     position: myLatlng, 
                                     draggable: true,
                                     title:'danli'
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
                        
                        
                        <input type="hidden" name="imagen" value=""/>
                        <input type="hidden" name="nombre_imagen" value=""/>
                        <iframe class="oculto"  name="formDestination"></iframe>
                        <button class="form-control" name="guardar" id="guardar"  type="button" style="background-color:#005662; color:white;" ><span class="glyphicon glyphicon-floppy-disk"></span>  Guardar</button>
                     
                        <div class="modal" id="Modal1" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Crear Perfil</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>El Perfil se ha creado con éxito.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onClick="javascript:(function(){window.location.href = 'contactosUsuario.php';})()">Aceptar</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

                


            </div>


        </div>  

    </div>
</div>
<br>

<script src="../js/jquery-2.2.4.min.js"></script>
<script src="../js/vrcontactocrear.js"></script>



<?php
include_once '../plantillas/documento-cierre.inc.php';
?>

<?php
   } else {
       header('Location: /webaeo');
    }
?>
