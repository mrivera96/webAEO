<?php

function isNull($nombre, $user, $pass, $pass_con, $email) {
    if (strlen(trim($nombre)) < 1 || strlen(trim($user)) < 1 || strlen(trim($pass)) < 1 || strlen(trim($pass_con)) < 1 || strlen(trim($email)) < 1) {
        return true;
    } else {
        return false;
    }
}

//fin de function isNull

function isEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

//FIN DE function isEmail

function validaPassword($var1, $var2) {
    if (strcmp($var1, $var2) !== 0) {
        return false;
    } else {
        return true;
    }
}

function generateToken() {
    $gen = md5(uniqid(mt_rand(), false));
    return $gen;
}

//fin de function generateToken

function hashPassword($password) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    return $hash;
}

//fin de function hashPassword

function generaTokenPass($user_id) {
    global $con;
    $token = generateToken();
    $query = $con->prepare("UPDATE usuarios SET token_password=?, password_request =1 WHERE id_usuario = ?");


    $query->bind_param("si", $token, $user_id);
    $query->execute();
    $query->close();

    return $token;
}

//fin de function generarTokenPass

function verificaTokenPass($user_id, $token) {
    global $con;

    $query = $con->prepare("SELECT activacion from usuarios WHERE id_usuario=? AND token_password = ? AND password_request = 1 LIMIT = 1");

    $query->bind_param("is", $user_id, $token);
    $query->execute();
    $query->store_result();
    $num = $query->num_rows;

    if ($num > 0) {
        $query->bind_result($activacion);
        $query->fetch();
        if ($activacion == 1) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

//fin de function verificaTokenPass

function getValor($campo, $campoWhere, $valor) {
    global $con;
    $query = $con->prepare("SELECT $campo FROM usuarios WHERE $campoWhere = ? LIMIT 1");


    $query->bind_param("s", $valor);
    $query->execute();
    $query->store_result();
    $num = $query->num_rows;

    if ($num > 0) {
        $query->bind_result($_campo);
        $query->fetch();
        return $_campo;
    } else {
        return false;
    } 
}

//fin de function getValor

function emailExiste($email) {
    global $con;

    $query = $con->prepare("SELECT id_usuario FROM usuarios WHERE correo = ? LIMIT 1");


    $query->bind_param("s", $email);
    $query->execute();
    $query->store_result();
    $num = $query->num_rows;
    $query->close();

    if ($num > 0) {
        return true;
    } else {
        return false;
    }
}

//fin de function emailExiste

function enviarEmail($email, $nombre, $asunto, $cuerpo) {
    //include_once 'PHPMailer/PHPMailerAutoload.php';
    require("PHPMailer/class.phpmailer.php");
    require("PHPMailer/class.smtp.php");

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->HOST = 'smtp.gmail.com';
    $mail->Port = '587';

    $mail->Username = 'shessag@gmail.com';
    $mail->Password = 'shessasanchez';

    $mail->setFrom('shessag@gmail.com', 'aeo');
    $mail->addAddress($email, $nombre);

    $mail->Subject = $asunto;
    $mail->Body = $cuerpo;
    $mail->IsHTML(true);

    if ($mail->send()) {
        return true;
    } else {
        return false;
    }
}

function minMax($min, $max, $valor) {
    if (strlen(trim($valor)) < $min) {
        return true;
    } else if (strlen(trim($valor)) > $max) {
        return true;
    } else {
        return false;
    }
}

//fin de function minMax

function resultBlock($errors) {
    if (count($errors) > 0) {
        echo "<div id='error' class='alert alert-danger' role='alert'><a href='#' onclick=\"showHide('error');\">[X]</a><ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
}

function cambiaPassword($password, $user_id, $token) {
    global $con;

    $query = $con->prepare("UPDATE usuarios SET contrasena = ?, token_password = '',password_request=0 WHERE id_usuario = ? AND token_password=?");
    $query->bind_param("sis", $password, $user_id, $token);

    if ($query->execute()) {
        return true;
    } else {
        return false;
    }
}

?>
