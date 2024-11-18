<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once('modelo.php');
class modeloUsuario extends modelo {

    //valida login
    
    function validar($usuario, $contra) {
        $db = $this->getDb();
        $_SESSION['contrasena'] = $contra;
        $contra1 = md5($contra);

        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '".$usuario."' AND contrasena_usuario = '".$contra1."'";
        $query = $db->prepare($sql);
        $query->execute();
        $db = null;

        if ($query->rowCount() > 0)
        {
            $_SESSION['usuario'] = $usuario;
            $filas = $query->fetch(PDO::FETCH_OBJ);
            $_SESSION['cargo']= $filas->cargo;
            header('location:home');
            return TRUE;        
        }else{
            echo "<script>
            window.location = 'login';
            alert('Error, nombre de ususario o contraseña incorrecto');
            </script>";
        }
    }

    function desloguear() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        session_unset();
        session_destroy(); //corta la sesion
        header('location:home');
    }

    function registrarUsuario($nombreUser, $contra, $contra2, $email) {
        // BUSCAR TODAS LAS COINDICIENDAS EN LA BASE DE DATOS 
        // SI TRAJE USUARIOS EN LA BASE DE DATOS ES PORQUE HAY UN UNO (MANDAR A HOME CON UN ERROR)
        // SINO DEJARLO QUE INGRESE A LA BASE DE DATOS
        if ($contra === $contra2) {
            $db = $this->getDb();
            $_SESSION['contrasena'] = $contra;
            $contraHasheada = md5($contra);
            $cargo = "";

            $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '".$nombreUser."'";
            $query = $db->prepare($sql);
            $query->execute();

            $resultado = $query->fetch(PDO::FETCH_ASSOC);
            
            if ($resultado) {
                echo "<script>
                    window.location = 'login';
                    alert('Error, nombre de usuario repetido, por favor ingrese otro');
                </script>";
            } else {
                $consultaInsercion = "INSERT INTO usuarios(nombre_usuario,contrasena_usuario,email_usuario,cargo) VALUES ('".$nombreUser."','".$contraHasheada."','".$email."','".$cargo."')";
                $query = $db->prepare($consultaInsercion);
                $query->execute();
                $_SESSION['email'] = $email;
                $_SESSION['cargo'] = $cargo;
                $_SESSION['usuario'] = $nombreUser;
                header("location:home");
            }
        } else {
            echo "<script>
                    window.location = 'login';
                    alert('Error, la contraseña debe ser igual en los dos campos');
                </script>";
        }
    }

    function getUser() {
        $db = $this->getDb();
        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '".$_SESSION['usuario']."'";
        $query = $db->prepare($sql);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }

    function guardarUsuario($usuario, $contra, $id) {
        $db = $this->getDb();
        $contrah = md5($contra);
        $query = $db->prepare('UPDATE usuarios SET nombre_usuario = ?, contrasena_usuario = ? WHERE id_usuario = ?');
        $query->execute([$usuario, $contrah ,$id]);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['contrasena'] = $contra;
    }

    function contactar($nombre, $correo, $asunto, $mensaje) {

        if (isset($_POST['submit-contacto'])) {

            $body = "Nombre: ". $nombre ."<br>Correo: ". $correo ."<br>Mensaje: ". $mensaje;
    
            require 'PHPMailer/Exception.php';
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

                $mail->Username   = 'elefantephp@gmail.com';                     //SMTP username
                $mail->Password   = 'gqzpyljpxyasnzfy';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('elefantephp@gmail.com', $nombre);

                $mail->addAddress('elefantephp@gmail.com');     //Add a recipient
                // $mail->addAddress('francojosezappia@gmail.com');               //Name is optional

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $asunto; //asunto
                $mail->Body    = $body; //mensaje

                $mail->CharSet = 'UTF-8';
                $mail->send();
                echo "<script>
                    alert('El mensaje se envio correctamente');
                    window.location = 'home';
                </script>";
            } catch (Exception $e) {
                echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
            }
        }
    }

}

?>