<?php
$titulo = 'Agenda Electrónica Oriental';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
?>
<script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous"></script>

<div  class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-7">
                    <br>
                    <div class="form-group">
                        <input type="search" class="form-control"name="caja_busqueda" placeholder="Contacto a buscar">
                    </div>

                </div>
                <div class="col-md-2">
                    <br>
                    <form method="post">
                        <select class="form-control" name="xcategoria">
                            <option>Categorias</option>
                            <option>Emergencia</option>
                            <option>Educación</option>
                            <option>Centros Asistenciales</option>
                            <option>Bancos</option>
                            <option>Hostelería y turismo</option>
                            <option>Instituciones Públicas</option>
                            <option>Comercio de Bienes</option>
                            <option>Comercio de Servicios</option>
                            <option>Bienes y Raíces</option>
                            <option>Asesoría Legal</option>
                            <option>Funeraria</option>
                        </select>
                    </form>
                </div>
                <div class="col-md-2">
                    <br>
                    <form method="post">
                        <select class="form-control" name="xregion">
                            <option>Regiones</option>
                            <option>Danlí</option>
                            <option>El Paraíso</option>
                        </select>
                    </form>

                </div>

                <div class="col-md-1">
                    <br>
                    <form method="post">
                        <button  class="btn btn-buscar">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
