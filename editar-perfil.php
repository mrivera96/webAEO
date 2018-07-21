<?php
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
?>
<head><link href="css/estilos_melvin.css" rel="stylesheet"></head>
<div class="container">
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading " style="height: 40px">

                    <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>   Edición de Perfil</h3>     
                </div>

                <div class="panel-body">
                    <form id="formularioEditar" name="formularioEditar" role="form" method="post" action="actualizarPerfil.php" target="formDestination">
                        <div class="form-group text-center">
                            <img style="width: 250px; height: 250px" class="img-circle img-circle" id="imganenOrg">
                        </div><br><br>


                        <div class="group" id="nombreDeOrg">   
                            <input  type="text" required name="nomborg_rec" id="nombreOrg">
                            <span id="lbNomb" class="highlight"></span>
                            <span class="bar"></span>
                            <label ><span class="glyphicon glyphicon-credit-card"></span> Nombre de Organización</label>
                        </div>

                        <div class="group">

                            <input class="input" type="tel" id="numtelOrg" name="numtel_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-earphone"></span> Número fijo</label>
                        </div>


                        <div class="group">
                            <input class="input" type="tel" id="numcelOrg" name="numcel_rec">
                            <span class="highlight"></span>
                            <span class="barn"></span>
                            <label><span class="glyphicon glyphicon-phone"></span> Número móvil</label>
                        </div>


                        <div class="group">      
                            <input class="input" type="text" required id="dirOrg" name="direccion_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-transfer"></span> Dirección</label>
                        </div>


                        <div class="group">
                            <input class="input" type="email" id="emailOrg" name="email_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-envelope"></span> e-mail</label>
                        </div>



                        <div class="group">    
                            <input class="input" type="text" required id="descOrg" name="desc_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-align-left"></span> Descripción de la organización</label>
                        </div>



                        <div class="group">     
                            <input class="input" type="text" id="latOrg" required name="lat_rec" >
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-map-marker"></span> Latitud</label>
                        </div>


                        <div class="group">   
                            <input class="input" type="text" id="longOrg" required name="longitud_rec">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><span class="glyphicon glyphicon-map-marker"></span> Longitud</label>
                        </div>

                        <h5>Región</h5>
                        <select class="form-control" id="region" name="id_region"></select>

                        <h5>Categoría</h5>
                        <select class="form-control" id="categoria" name="id_categoria"></select>
                        <br>
                        <br>
                        <input type="hidden" name="contacto" value="<?php echo $_GET['contacto'] ?>"/>
                        <input type="hidden" name="imagen" value=""/>
                        <input type="hidden" name="nombre_imagen" value=""/>
                        <iframe class="oculto"  name="formDestination"></iframe>
                        <button class="form-control" name="guardar" id="guardar" type="button" style="width:100%; background-color:#005662; color:white;" ><span class="glyphicon glyphicon-floppy-disk"></span>  Guardar</button>
                        
                        <br>
                        <button class="form-control" data-toggle="modal" data-target="#Modal"   type="button" style="width:100%; background-color:#ff9191; color:white;" ><span class="glyphicon glyphicon-trash"></span>  Eliminar Perfil</button>

                        <div class="modal" id="Modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Eliminar Perfil</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Eliminará el perfil ¿Desea continuar?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="eliminar" class="btn btn-primary">Sí, borrar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal" id="Modal1" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Actualizar Perfil</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>El Perfil se ha actualizado con éxito.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onClick="javascript:(function(){window.location.href = 'administracion-de-perfiles.php';})()">Aceptar</button>
                                        
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
<script type="text/javascript" src="js/EdicionPerfil.js"></script>


<?php
include_once 'plantillas/documento-cierre.inc.php';
?>