<?php
include_once 'ConexionABaseDeDatos.php';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
?>

<script src="js/jquery-2.2.4.min.js"></script>

<div id="encabezado_resultado" class="container responsive">
    <h4 class="text-center" id="nombreCategoria">Ubicación</h4>
</div>
<br/>
<div class="container responsive" id="contenedor_resultado"> 
    <br>
    <script type="text/javascript" 
            src="https://maps.google.com/maps/api/js?sensor=false">
    </script> 

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEOxwsMZ7J9V7kqTr82JflRNORJchV4mM&callback=initMap"
    type="text/javascript"></script>

    <script>
                $(document).on("ready", function () {
                    loadData();
                });
                var loadData = function ()
                {
                    $.ajax({
                        type: "get",
                        url: "mostrar_perfil.php",
                        data: {'id_contacto':<?php echo $_GET['id_contacto'] ?>}
                    }).done(function (data)
                    {
                        var coordenadas = JSON.parse(data);
                        var latitud;
                        var longitud;
                     

                        for (var i in coordenadas)
                        {
                          
                            
                            $("#titulo").append(
                                    '<h3' + coordenadas[i].nombre_organizacion + '</h3>'
                                  

                                    );

                            if (coordenadas[i].latitud && coordenadas[i].longitud != "") {
                                var myLatlng = new google.maps.LatLng(latitud = coordenadas[i].latitud, longitud = coordenadas[i].longitud);

                                var myOptions = {
                                    zoom: 15,
                                    center: myLatlng,
                                    mapTypeId:google.maps.MapTypeId.ROADMAP,
                                }
                                var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

                                marker = new google.maps.Marker({
                                    position: myLatlng,
                                    title: coordenadas[i].nombre_organizacion,
                                   
                                });
                                google.maps.event.addListener(marker, "dragend", function () {

                                    getCoords(marker);

                                });

                                marker.setMap(map);
                                getCoords(marker);




                            } else {
                                latitud = "No disponible";
                                longitud = "No disponible";
                            }
                            
                            $("#map_canvas").append(
                                    '<h5>ubicación:' + latitud + '</h5>' 
                                  
                                    );
                        }
                    });
                }
    </script>	
    <body >
        <div id="map_canvas" style="width:100%; height:435px"></div><br> 

    </body>

    <?php
    include_once 'plantillas/documento-cierre.inc.php';
    ?>