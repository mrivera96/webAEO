<?php
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
if (isset($_SESSION['user_id'])) {
    
?>
<head>
    <link href="css/estiloLogin.css" rel="stylesheet">
    <link href="css/estilos_melvin.css" rel="stylesheet">
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
                    <form id="formularioCrear" name="formularioCrear" role="form" method="post" action="insertarPerfilUsuario.php" target="formDestination">
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
                        
                        <br>   
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

<script src="js/jquery-2.2.4.min.js"></script>
<script>
    $(document).on("ready", function(){ loadData(); });

var loadData = function(){
        $.ajax({
            type: "GET",
            url: "consultarRegiones.php"
        }).done(function (data) {
            var regiones = JSON.parse(data);

            for (var i in regiones) {
                $("#region").append('<option value="' + regiones[i].id_region +'">' + regiones[i].nombre_region + '</option>');
            }
        });

        $.ajax({
            type: "GET",
            url: "consultarCategorias.php"
        }).done(function (data) {
            var categorias = JSON.parse(data);

            for (var i in categorias) {
                $("#categoria").append('<option value="' + categorias[i].id_categoria +' "> ' + categorias[i].nombre_categoria + '</option>');
            }
        });
        
};

document.getElementById("guardar").onclick=function(){validarFormulario();};

function mostrarError(componente, error){
        
         $("#formularioCrear").append('<div class="modal" id="Modal3" tabindex="-1" role="dialog">'+
                            '<div class="modal-dialog" role="document">'+
                                '<div class="modal-content">'+
                                    '<div class="modal-header">'+
                                        '<h5 class="modal-title">Error al crear el perfil</h5>'+
                                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                            '<span aria-hidden="true">&times;</span>'+
                                        '</button>'+
                                    '</div>'+
                                   ' <div class="modal-body">'+
                                        '<p>'+error+'</p>'+
                                    '</div>'+
                                    '<div class="modal-footer">'+
                                        '<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>');
                $("#Modal3").modal("show");
                $('#Modal3').on('hidden.bs.modal', function () {
                    componente.focus();   
                    $("#Modal3").detach();
                });
                
    }
function validarFormulario(){
        var error_nomb=false;
        var error_tel=false; 
        var  error_cel=false; 
        var error_mail=false; 
        var error_desc=false;
        var error_dir=false;
        var error_reg=false;
        var error_cat=false;
        
        
         if(document.formularioCrear.nomborg_rec.value===""){
            error_nomb=true;                  
            mostrarError(document.formularioCrear.nomborg_rec,"Debe ingresar un nombre de organización.");
            return;
        }
        
        if(document.formularioCrear.email_rec.value===""){

        }else{
            if(!document.formularioCrear.email_rec.value.includes("@") || !document.formularioCrear.email_rec.value.includes(".")){
                error_mail=true;
                
                mostrarError(document.formularioCrear.email_rec,"Ingrese un e-mail válido.");
                return;
            }
        }

        
        if(document.formularioCrear.numtel_rec.value===""){
            if(document.formularioCrear.numcel_rec.value===""){
                error_tel=true;
                
                mostrarError(document.formularioCrear.numtel_rec,"Debe ingresar al menos un número telefónico.");
                return;
            }
        }else{
            if(document.formularioCrear.numtel_rec.value.length < 8 || !document.formularioCrear.numtel_rec.value.startsWith("2") || document.formularioCrear.numtel_rec.value.length>8){
                error_tel=true;
                
                mostrarError(document.formularioCrear.numtel_rec,"El número telefónico ingresado no es válido.");
                return;
            }
        }

        if(document.formularioCrear.numcel_rec.value===""){
            if(document.formularioCrear.numtel_rec.value===""){
                error_cel=true;
               
                mostrarError(document.formularioCrear.numcel_rec,"Debe ingresar al menos un número telefónico.");
                return;
            }
        }else{
            if(document.formularioCrear.numcel_rec.value.length<8 || document.formularioCrear.numcel_rec.value.length>8){
                error_cel=true;
                $("#Modal3").modal("show");
                mostrarError(document.formularioCrear.numcel_rec,"El número telefónico ingresado no es válido.");
                return;
            }
        }

        if(document.formularioCrear.direccion_rec.value===""){
            error_dir=true;
          
            mostrarError(document.formularioCrear.direccion_rec,"Debe ingresar la dirección de la organización.");
            return;
        }
        if(document.formularioCrear.desc_rec.value===""){
            error_desc=true;
           
            mostrarError(document.formularioCrear.desc_rec,"Debe escribir una descripción de la organización.");
            return;
        }
        if(document.formularioCrear.id_region.value < 3 && document.formularioCrear.id_region.value > 4){
            error_reg=true;
            alert('La región seleccionada no existe.');
            document.formularioEditar.id_region.focus();
            return;
        }
        if(document.formularioCrear.id_categoria.value < 1 && document.formularioCrear.id_categoria.value > 11 ){
            error_cat=true;
            alert('La categoría seleccionada no existe.');
            document.formularioCrear.id_categoria.focus();
            return;
        }
        
        if(error_nomb   ===false && 
           error_tel    ===false &&
           error_cel    ===false &&
           error_dir    ===false &&
           error_mail   ===false &&
           error_desc   ===false &&
           error_reg    ===false &&
           error_cat    ===false){
                document.formularioCrear.submit();
                $("#Modal1").modal('show');
                
                return;
        }
    }



</script>



<?php
include_once 'plantillas/documento-cierre.inc.php';
?>

<?php
   } else {
       header('Location: /webaeo');
    }
?>

