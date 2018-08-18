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
                <div  class="panel-body" style="background-color: #005662; border-radius: 8px; padding-top: 3px;padding-bottom: 3px;
                    " >
                    <div class="form-group" >
                        <form role="form" method="get" action="resultado_busqueda.php" >


                            <div id="separador" class="col-md-3  ">

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

                            <div id="separador"class=" col-md-3  ">
                                <select class="form-control" name="region">
                                    <option value="0" >Todas las Regiones</option>
                                    <option value="4" >El Paraíso</option>
                                    <option value="3">Danlí</option>
                                </select>              
                            </div>
                       <div  id="separador"class="col-md-6 col-ms-6  ">
                                <div class="input-group">
                                    <input id="busqueda" type="text" class="form-control" name="busqueda"  placeholder="Contacto a buscar"
                                           required oninvalid="setCustomValidity('Ingrese la busqueda.')" oninput="setCustomValidity('')">
                                    <span class="input-group-btn">
                                        <button id="btn-card" class="btn btn-default" type="submit"style="  color:black;"><strong><span class="glyphicon glyphicon-search"></span></strong></button>
                                    </span>
                                </div><!-- /input-group -->
                            </div>
                    </form>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>