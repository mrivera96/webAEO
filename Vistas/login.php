
 <?php
  $titulo = 'Acceder a la cuenta';
include_once '../plantillas/documento-inicio.inc.php';
include_once '../plantillas/barra-de-navegacion-navbar.inc.php';

        
 //session_start();
    if(isset($_POST['tkn']) && !empty($_POST['tkn'])){

      if($_POST['estado'] != 2){
        $_SESSION['token'] = $_POST['tkn'];
        $_SESSION['idUrs'] = $_POST['id'];
        $_SESSION['rol'] = $_POST['rol'];
      }

    }
    if(isset($_SESSION['token']) && !empty($_SESSION['token'])){
          if (($_SESSION['rol'] == 2) ) {
        header('Location: /webaeo/Vistas/contactosUsuario.php');
    } else if (($_SESSION['rol'] == 1)) {
        header('Location: /webaeo/Vistas/mostrar_usuarios.php');
    } else {
        $message = 'Usuario o Contraseña incorrectas ';
    }
    }

    
//session_start();
/*if (isset($_SESSION['user_id'])) {
    if (($_SESSION['normal'] == 2) && ($_SESSION['actividad'] == 1)) {
        header('Location: /webaeo/Vistas/contactosUsuario.php');
    } else if (($_SESSION['normal'] == 1) && ($_SESSION['actividad'] == 1)) {
        header('Location: /webaeo/Vistas/mostrar_usuarios.php');
    } else {
        $message = 'Usuario o Contraseña incorrectas ';
    }
}
require '../config/database.php';
if (!empty($_POST['nombre_usuario']) && (!empty($_POST['password']))) {

    $records = $conn->prepare('SELECT id_usuario, nombre_usuario, contrasena,rol,estado_usuario FROM usuarios WHERE nombre_usuario = :nombre_usuario');
    $records->bindParam(':nombre_usuario', $_POST['nombre_usuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    if (isset($results['nombre_usuario'])) {

        if (count($results) > 0 && (password_verify($_POST['password'], $results['contrasena']) )) {
            $_SESSION['user_id'] = $results['id_usuario'];
            $_SESSION['normal'] = $results['rol'];
            $_SESSION['actividad'] = $results['estado_usuario'];
            if ($results['rol'] == 2 && $results['estado_usuario'] == 1) {
                header('Location: /webaeo/Vistas/contactosUsuario.php');
            }
            if ($results['rol'] == 1 && $results['estado_usuario'] == 1) {
                header("Location: /webaeo/Vistas/mostrar_usuarios.php");
            }
            if (($results['rol'] == 1 && $results['estado_usuario'] == 2) || ($results['rol'] == 2 && $results['estado_usuario'] == 2)) {
                $message = 'Usuario o contraseña Incorrecta ';
            }
            
        } else {
            $message = 'Usuario o contraseña Incorrecta ';
        }
    } else {
        $message = 'Es probable que el usuario no este registrado ';
    }
}*/
?>
<head>
    <link href="../css/estiloslogin.css" rel="stylesheet">
</head>

<?php if (!empty($message)): ?>

    <p> <div class="alert alert-primary" role="alert"  align="center"> 
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>
                <?=
                $message
                ?>
            </strong> 
        </div>

    </div> </p>
<?php endif; ?>

<div  class="container well" id="contenedor">
    <div class="row">
        <div class="col-xs-12">
            <img src="../imagenes/LoginUsuario.png" class="img-responsive" id="imagen">
        </div>
        <p><h5>
            <strong><center style="color: #005662">   Acceder a la Cuenta</center></strong>
        </h5></p>
    </div>

<form class="form" name="log">
    
    <div class="group">
        <input  type="text" required oninvalid="setCustomValidity('Ingrese el usuario')" oninput="setCustomValidity('')"   name="usern" pattern="|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ_-0-9]*$|" title="No se permiten espacios">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label >  <span class="glyphicon glyphicon-user"></span> Usuario</label>
        </div>

        <div class="group">
            <input  type="password"  required oninvalid="setCustomValidity('Ingrese la contraseña')" oninput="setCustomValidity('')" name="pass" >
            <span class="highlight"></span>
            <span class="bar"></span>
            <label ><span class="glyphicon glyphicon-lock"></span> Password</label>
        </div>
        
        <br>
        
        <button id="btn-card"  class="btn btn-lg btn-block"  type="button"  onclick="loguear()" style=" background-color: #005662; color:white;">Ingresar</button>

          <form style="display: hidden" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="form">
                            <input type="hidden" id="tkn" name="tkn" value=""/>
                            <input type="hidden" id="rol" name="rol" value=""/>
                            <input type="hidden" id="id" name="id" value=""/>
                            <input type="hidden" id="stado" name="estado" value=""/>
                </form>

</div>

    <script src="jquery.js" type="text/javascript"></script>
 <script>
  loguear = function(){

            var usr = document.log.usern.value;
            var pass = document.log.pass.value;
            $.ajax({
                type: "POST",
                url: "../WebServices/validar_usuario.php",
                data:{'usern':usr,'pass':pass}
            }).done(function (data) {
                        var dataParse = JSON.parse(data);

                        if(dataParse != "Credenciales incorrectos"){


                              $("#tkn").val(dataParse.token);
                              $("#rol").val(dataParse.rol);
                              $("#id").val(dataParse.idUrs);
                              $("#estado").val(dataParse.ste);


                            $("#form").submit();
                            $("#form").detach();

                        }else{
                            window.location.href = 'index.php';
                        }

            }
            );
        };
        </script>
        
<?php
include_once '../plantillas/documento-cierre.inc.php';
?>
