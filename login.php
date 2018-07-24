<?php
$titulo = 'Acceder a la cuenta';
include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';

//session_start();
 if (isset($_SESSION['user_id'])) {
    if(($_SESSION['normal'] == 2) && ($_SESSION['actividad'] == 1)){
        header('Location: /webaeo/contactosUsuario.php');
    } else if(($_SESSION['normal'] == 1) && ($_SESSION['actividad'] == 1)){
        header('Location: /webaeo/mostrar_usuarios.php');
    } else {
        $message = 'Usuario o Contraseña incorrectas ';
    }
    
  }
  require 'database.php';
  if (!empty($_POST['nombre_usuario']) && (!empty($_POST['password']))) {

     $records = $conn->prepare('SELECT id_usuario, nombre_usuario, contrasena,rol,estado_usuario FROM usuarios WHERE nombre_usuario = :nombre_usuario'); 
     $records->bindParam(':nombre_usuario', $_POST['nombre_usuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
   if (count($results) > 0 && (password_verify($_POST['password'] , $results['contrasena']) )) {
      $_SESSION['user_id'] = $results['id_usuario'];
      $_SESSION['normal'] = $results['rol'];
      $_SESSION['actividad'] = $results['estado_usuario'];
      if($results['rol'] == 2 && $results['estado_usuario']== 1){
           header('Location: /webaeo/contactosUsuario.php');
      }
       if($results['rol'] == 1 && $results['estado_usuario']== 1){
          header("Location: /webaeo/mostrar_usuarios.php");
      }
 
    } else {
      $message = 'Usuario o Contraseña incorrectas ';
    }
  }

?>
<head>
	<link href="css/estiloslogin.css" rel="stylesheet">
</head>
<?php
	//require 'partials/header.php';
	?>

	<?php if(!empty($message)): ?>
	      <p> <?= $message ?></p>
	    <?php endif; ?>



<div  class="container well" id="contenedor">
    <div class="row">
        <div class="col-xs-12">
            <img src="imagenes/LoginUsuario.png" class="img-responsive" id="imagen">
        </div>
        <p><h5>
            <strong><center style="color: #005662">   Acceder a la Cuenta</center></strong>
        </h5></p>
    </div>

    <form action="login.php" method="post"  class="login"  >


        <div class="group">
            <input  type="text" required name="nombre_usuario" >
                 <span class="highlight"></span>
            <span class="bar"></span>
            <label >  <span class="glyphicon glyphicon-user"></span> Usuario</label>
        </div>



        <div class="group">
            <input  type="password" required name="password" >
            <span class="highlight"></span>
            <span class="bar"></span>
            <label ><span class="glyphicon glyphicon-lock"></span> Password</label>
        </div>

        <button id="btn-card" class="btn btn-lg btn-block" type="submit" value="Enviar" style=" background-color: #005662; color:white;">Ingresar</button>



    </form>

</div>
<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
