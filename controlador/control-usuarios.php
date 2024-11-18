<?php
// incluir modelo usuario
include_once('vista/vista-usuario.php');
include_once('modelo/modelo-usuario.php');

class ControlaUsuario {
//     private $modeloUsuario;
    
    //crea nuevas instancias de modelos y vistas
    function __construct() {
        $this->vistaUsuario = new vistaUsuario();
        $this->modeloUsuario = new modeloUsuario();
    }

    function mostrarHome() {
        $this->vistaUsuario->showHome();
    }

    function mostrarNosotros() {
        $this->vistaUsuario->showNosotros();
    }

    function mostrarlogin() {
        if (!isset($_SESSION['usuario'])) {
            $this->vistaUsuario->showlogin();
        } else {
            echo "error 404";
        }
    }

    function verificarUsuario() {
        $usuario = $_POST['usuario'];
        $contra = $_POST['contra'];
        $this->modeloUsuario->validar($usuario, $contra);
    }

    function registrarUsuario() {
        $nombreUser = $_POST['nombre_usuario'];
        $contra = $_POST['contra'];
        $contra2 = $_POST['contra2'];
        $email = $_POST['email'];
        $this->modeloUsuario->registrarUsuario($nombreUser, $contra, $contra2, $email);
    }

    function desloguear() {
        $this->modeloUsuario->desloguear();
    }

    function contactar() {
        if (isset($_SESSION['usuario'])) {
            $nombre = $_SESSION['usuario'];
        } else {
            $nombre = "usuario_restaurante";
        }
        $correo = $_POST['inputM'];
        $asunto = $_POST['input-asunto'];
        $mensaje = $_POST['contact']; 
        $this->modeloUsuario->contactar($nombre, $correo, $asunto, $mensaje);
    }

    function mostrarFormUsuario() {  
        if (isset($_SESSION['usuario'])) {
            $user = $this->modeloUsuario->getUser();
            $this->vistaUsuario->formEdit($user);
        } else {
            echo "error 404";
        }
    }

    function actualizarUsuario() {
        $usuario = $_POST['usuario-act'];
        $contra = $_POST['contra-act'];
        $id = isset($_POST['id'])?(int)$_POST['id'] :0;
        $this->modeloUsuario->guardarUsuario($usuario,$contra,$id);
        header('location: home');
    }
}
?>