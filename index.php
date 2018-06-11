<?php
$titulo = 'Agenda Electrónica Oriental';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
include_once 'plantillas/buscador.inc.php';

?>

<div  class="container">
    <h3 class="Opcion iluminada"><strong>Categorías</strong></h3> 
</div>

<!--Contenedor de tarjetas-->

<div id="estilo-contenedor" class="container pre-scrollable" >
    <div class="row">
        <div class="col-sm-6 col-md-4" >
            <a  href="contactos.php"> <div class="thumbnail">
                    <div  class="panel-heading"  >
                        <span aria-hidden="true"></span> <strong>Emergencia</strong> 
                        <h6>6 Contactos</h6>
                    </div> 
                    <img src="imagenes/emergencia.jpg"  alt="Responsive image" >

                </div></a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a  href="#"> <div class="thumbnail">
                    <div class="panel-heading"  >
                        <span aria-hidden="true"></span> <strong>Educacion</strong> 
                        <h6>6 Contactos</h6>
                    </div> 
                    <img src="imagenes/educacion.jpg"  alt="Responsive image" >
                </div></a>
        </div>

        <div class="col-sm-6 col-md-4">
            <a  href="#"> <div class="thumbnail">
                    <div class="panel-heading"  >
                        <span aria-hidden="true"></span> <strong>Centros Asistenciales</strong> 
                        <h6>6 Contactos</h6>
                    </div> 
                    <img src="imagenes/centrosasistenciales.jpg"  alt="Responsive image" >
                </div></a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-4">
            <a  href="#"> <div class="thumbnail">
                    <div class="panel-heading"  >
                        <span aria-hidden="true"></span> <strong>Bancos</strong> 
                        <h6>6 Contactos</h6>
                    </div> 
                    <img src="imagenes/bancos.jpg"  alt="Responsive image" >
                </div></a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a  href="#"><div class="thumbnail">
                    <div class="panel-heading"  >
                        <span aria-hidden="true"></span> <strong>Hostelería y Turismo</strong> 
                        <h6>6 Contactos</h6>
                    </div> 
                    <img src="imagenes/hoteleria_y_turismo.jpg"  alt="Responsive image" >
                </div></a>
        </div>

        <div class="col-sm-6 col-md-4">
            <a  href="#"><div class="thumbnail">
                    <div class="panel-heading"  >
                        <span aria-hidden="true"></span> <strong>Institucions Publicas</strong> 
                        <h6>6 Contactos</h6>
                    </div> 
                    <img src="imagenes/gobierno.jpg"  alt="Responsive image" >
                </div></a>
        </div>
    </div>
</div>


<?php
include_once 'plantillas/documento-cierre.inc.php';
?>