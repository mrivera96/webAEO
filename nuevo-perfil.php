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
                            <input type="text" id="latOrg" required name="lat_rec" >
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
                        <button class="form-control" name="guardar" id="guardar" onClick="validarFormulario()" type="button" style="background-color:#005662; color:white;" ><span class="glyphicon glyphicon-floppy-disk"></span>  Guardar</button>
   
                    </form>

                </div>

                


            </div>


        </div>  

    </div>
</div>
<br>

<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/nuevoPerfil.js"></script>
<script type="text/javascript">
   
    
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
            alert('Debe ingresar un nombre de organización.');
            document.formularioCrear.nomborg_rec.focus();
            return;
        }
        
        if(document.formularioCrear.email_rec.value===""){

        }else{
            if(!document.formularioCrear.email_rec.value.includes("@") || !document.formularioCrear.email_rec.value.includes(".")){
                error_mail=true;
                alert('Ingrese un e-mail válido.');
                document.formularioCrear.email_rec.focus();
                return;
            }
        }

        
        if(document.formularioCrear.numtel_rec.value===""){
            if(document.formularioCrear.numcel_rec.value===""){
                error_tel=true;
                alert('Debe ingresar al menos un número telefónico.');
                document.formularioCrear.numtel_rec.focus();
                return;
            }
        }else{
            if(document.formularioCrear.numtel_rec.value.length < 8 || !document.formularioCrear.numtel_rec.value.startsWith("2") || document.formularioCrear.numtel_rec.value.length>8){
                error_tel=true;
                alert('El número telefónico ingresado no es válido.');
                document.formularioCrear.numtel_rec.focus();
                return;
            }
        }

        if(document.formularioCrear.numcel_rec.value===""){
            if(document.formularioCrear.numtel_rec.value===""){
                error_cel=true;
                alert('Debe ingresar al menos un número telefónico.');
                document.formularioCrear.numcel_rec.focus();
                return;
            }
        }else{
            if(document.formularioCrear.numcel_rec.value.length<8 || document.formularioCrear.numcel_rec.value.length>8){
                error_cel=true;
                alert('El número telefónico ingresado no es válido.');
                document.formularioCrear.numcel_rec.focus();
                return;
            }
        }

        if(document.formularioCrear.direccion_rec.value===""){
            error_dir=true;
            alert('Debe ingresar la dirección de la organización.');
            document.formularioEditar.direccion_rec.focus();
            return;
        }
        if(document.formularioCrear.desc_rec.value===""){
            error_desc=true;
            alert('Debe escribir una descripción de la organización.');
            document.formularioCrear.desc_rec.focus();
            return;
        }
        if(document.formularioCrear.id_region.value < 3 && document.formularioCrear.id_region.value > 4){
            error_reg=true;
            alert('La región seleccionada no existe.');
            document.formularioCrear.id_region.focus();
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
                alert('Perfil creado con éxito');
                window.location.href = 'administracion-de-perfiles.php';
                return;
        }
    }
    
</script>
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
