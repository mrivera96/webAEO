<?php
$titulo = 'Acceder ala cuenta';
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
  if (!empty($_POST['nombre_usuario']) && !empty($_POST['password'])) {
     $records = $conn->prepare('SELECT id_usuario, nombre_usuario, contrasena,rol,estado_usuario FROM usuarios WHERE nombre_usuario = :nombre_usuario'); $records->bindParam(':nombre_usuario', $_POST['nombre_usuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
   if (count($results) > 0 && ($_POST['password'] == $results['contrasena']) ) {
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
    <link href="css/estiloLogin.css" rel="stylesheet">
</head>
<?php
	//require 'partials/header.php';
	?>

	<?php if(!empty($message)): ?>
	      <p> <?= $message ?></p>
	    <?php endif; ?>

	
	<h1>Login</h1>
        
<form action="login.php" method="post">
	 <input name="nombre_usuario" type="text" placeholder="Ingrese su usuario">
      <input name="password" type="password" placeholder="Ingrese su Contraseña">
      <input type="submit" value="Enviar ">
	
</form>





<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
