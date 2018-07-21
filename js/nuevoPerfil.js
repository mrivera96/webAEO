
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
        $.ajax({
            type: "GET",
            url: "ConsultarTodosLosUsuarios.php"
        }).done(function (data) {
            var usuarios = JSON.parse(data);

            for (var i in usuarios) {
                $("#usuario").append('<option value="' + usuarios[i].id_usuario +'">' + usuarios[i].nombre_usuario + '</option>');
            }
        }); 

};

document.getElementById("guardar").onclick=function(){validarFormulario();};

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
                
                window.location.href = 'administracion-de-perfiles.php';
                return;
        }
    }



