<?php
$titulo = 'Recuperación de contraseña';

include_once 'plantillas/documento-inicio.inc.php';
include_once 'plantillas/barra-de-navegacion-navbar.inc.php';
require 'funcs/funcs.php';
include_once 'ConexionABaseDeDatos.php';


$errors = array();

if (!empty($_POST)) {

    $email = $con->real_escape_string($_POST['email']);

    if (!isEmail($email)) {
        $errors[] = "Debe ingresar un correo electrónico valido";
    }
    if (emailExiste($email)) {
        $user_id = getValor('id_usuario', 'correo', $email);
        $nombre = getValor('nombre_usuario', 'correo', $email);

        $token = generaTokenPass($user_id);
        
        $url = ' http://'.$_SERVER["SERVER_NAME"].'/login/cambia_pass.php?user_id='.$user_id.'&token='.$token;
        
        $asunto = 'Recuperación de contraseña - aeo';
        $cuerpo = "Hola $nombre: <br/><br/> Se ha solicitado un reinicio de contraseña,<br/><br/> para restaurar la contraseña visita la siguiente dirección: <a href='$url'>Cambiar Contraseña</a>";


        if (enviarEmail($email, $nombre, $asunto, $cuerpo)) {
            echo "Hemos enviado un correo electrónico a la dirección $email para restablecer tu contraseña. <br/>";
            echo "<a href='login.php'>Iniciar Sesión</a>";
            exit;
        } else {
            $errors[] = "Error al enviar el email";
        }
    } else {
        $errors[] = "El correo electrónico que ingresó no coincide con un correo registrado";
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div style="margin-top: 17%" class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>Recuperación de contraseña</h4>

                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                        <h4>Introduce tu email</h4>
                        <br>
                        <p>
                            Ingresa la dirección de correo electrónico con la que te registraste y te enviaremos un email
                            con el que podrás restablecer tu contraseña.
                        </p>
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                               required autofocus>
                        <br>
                        <button type="submit" name="enviar_email" class="btn btn-lg btn-primary btn-block" id="btn_enviar_email">
                            Enviar
                        </button>
                    </form>
<?php echo resultBlock($errors); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
