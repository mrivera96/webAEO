<?php
$busquedas = null;
?>
<script
    src="/js/jquery-2.2.4.min.js"
></script>


<div  class="container" style="padding:0px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div  class="panel-heading" style="background-color: #005662;height:55px; border-radius: 8px" >
                    <form role="form" method="get" action="resultado_busqueda.php" >
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <input class="form-control" id="busqueda" name="busqueda"  placeholder="Contacto a buscar"
                                       required oninvalid="setCustomValidity('Ingrese la busqueda.')" oninput="setCustomValidity('')">
                            </div>
                        </div> 

                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">

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

                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
                            <select class="form-control" name="region">
                                <option value="0" >Todas las Regiones</option>
                                <option value="4" >El Paraíso</option>
                                <option value="3">Danlí</option>
                            </select>              
                        </div>
                        <div class="col-md-2 col-xs-2 col-sm-2">
                            <button id="btn-card" class="form-control btn btn-primary btn-buscar" type="submit"  style=" background-color: white; color:black;"><strong><span class="glyphicon glyphicon-search"></span></strong></button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>