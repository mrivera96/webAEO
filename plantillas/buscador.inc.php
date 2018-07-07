<?php
$busquedas = null;
$titulo = 'Agenda Electrónica Oriental';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
?>
<script
    src="/js/jquery-2.2.4.min.js"
></script>

<div  class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                 <form role="form" method="get" action="resultado_busqueda.php" >
                        <div class="col-md-7">
                            <br>
                                <div class="form-group">
                       
                            <input class="form-control" id="busqueda" name="busqueda"  placeholder="Contacto a buscar"
                                   required>
                                </div>
                                </div>      
                                <div class="col-md-2">
                        <br>
                        <select class="form-control" name="categoria">

                            <option value="0">Todas las Categorías</option>
                            <option value="1" >Emergencia</option>
                            <option value="2" >Educación</option>
                            <option value="3">Centros Asistenciales</option>
                            <option value="4">Bancos</option>
                            <option value="5" >Hostelería y turismo</option>
                            <option value="6" >Instituciones Públicas</option>
                            <option value="7">Comercio de Bienes</option>
                            <option value="8" >Comercio de Servicios</option>
                            <option value="9">Bienes y Raíces</option>
                            <option value="10">Asesoría Legal</option>
                            <option value="11">Funeraria</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <select class="form-control" name="region">
                            <option value="0" >Todas las Regiones</option>
                            <option value="4" >El Paraíso</option>
                            <option value="3">Danlí</option>
                        </select>
                    </div>

                    <div class="col-md-1">

                        <br>
                        <button type="submit" class="form-control btn btn-primary btn-buscar">Buscar</button>

                    </div>
                    <br>
                </form>

            </div>
        </div>
    </div>
</div>