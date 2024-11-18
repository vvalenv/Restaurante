<?php
// incluir modelo usuario
include_once('vista/vista-productos.php');
include_once('modelo/modelo-productos.php');

class ControlaProductos {

    function __construct() {
        $this->vistaProductos = new vistaProductos();
        $this->modeloProductos = new modeloProductos();
    }

    /*PIZZAS*/

    function mostrarPizzas() {
        $result = $this->modeloProductos->mostrarP();
        $this->vistaProductos->showPizzas($result);
    }
    
    function buscarPizza() {
        $busqueda = $_GET['input-buscarP'];
        $buscado = $this->modeloProductos->buscarP($busqueda);
        $result = $this->modeloProductos->mostrarP();
        $this->vistaProductos->pizzaBuscada($result, $buscado);
    }

    function agregarPizza() {
        $this->modeloProductos->agregarP();
        echo "<script>
                 window.location = 'pizzas';
        </script>";
    }

    function editarPizza() {
        if (isset($_SESSION['cargo'])) {
            if ($_SESSION['cargo'] == "admin") {
                $id = isset($_POST['idP'])?(int)$_POST['idP'] :0;
                $producto = $this->modeloProductos->getP($id);
                $this->vistaProductos->editarP($producto);
            } else {
                echo "error 404";
            }
        } else {
                echo "error 404";
            }
    }

    function actualizarPizza() {
        $nombre = $_POST['nombreP_a'];
        $precio = $_POST['precioP_a'];
        $desc = $_POST['descP_a'];
        $id = isset($_POST['idP'])?(int)$_POST['idP'] :0;
        $this->modeloProductos->actualizarP($nombre,$precio,$desc,$id);
        header('location: pizzas');
    }

    function borrarPizza() {
        $id = isset($_POST['id'])?(int)$_POST['id'] :0;
        $this->modeloProductos->borrarP($id);
        echo "<script>
                 window.location = 'pizzas';
        </script>";
    }

    /*BEBIDAS*/ 

    function mostrarBebidas() {
        $result = $this->modeloProductos->mostrarB();
        $this->vistaProductos->showBebidas($result);
    }

    function buscarBebida() {
        $busqueda = $_GET['input-buscarP'];
        $buscado = $this->modeloProductos->buscarB($busqueda);
        $result = $this->modeloProductos->mostrarB();
        $this->vistaProductos->bebidaBuscada($result, $buscado);
    }

    function agregarBebida() {
        $this->modeloProductos->agregarB();
        echo "<script>
                 window.location = 'bebidas';
        </script>";
    }

    function borrarBebida() {
        $id = isset($_POST['id'])?(int)$_POST['id'] :0;
        $this->modeloProductos->borrarB($id);
        echo "<script>
                 window.location = 'bebidas';
        </script>";
    }

    function editarBebida() {
        if (isset($_SESSION['cargo'])) {
            if ($_SESSION['cargo'] == "admin") {
                $id = isset($_POST['idP'])?(int)$_POST['idP'] :0;
                $producto = $this->modeloProductos->getB($id);
                $this->vistaProductos->editarB($producto);
            } else {
                echo "error 404";
            }
        } else {
                echo "error 404";
            }
    
    }

    function actualizarBebida() {
        $nombre = $_POST['nombreP_a'];
        $precio = $_POST['precioP_a'];
        $desc = $_POST['descP_a'];
        $id = isset($_POST['idP'])?(int)$_POST['idP'] :0;
        $this->modeloProductos->actualizarB($nombre,$precio,$desc,$id);
        header('location: bebidas');
    }

    /*COMBOS*/

    function mostrarCombos() {
        $com = $this->modeloProductos->mostrarC();
        $this->vistaProductos->showCombos($com);
    }

    function buscarCombo() {
        $busqueda = $_GET['input-buscarP'];
        $buscado = $this->modeloProductos->buscarC($busqueda);
        $result = $this->modeloProductos->mostrarC();
        $this->vistaProductos->comboBuscado($result, $buscado);
    }

    function agregarCombo() {
        $this->modeloProductos->agregarC();
        echo "<script>
                 window.location = 'combos';
        </script>";
    }

    function eliminarCombo() {
        $id = isset($_POST['id'])?(int)$_POST['id'] :0;
        $this->modeloProductos->borrarC($id);
        header('location: combos');
    }

    function editarCombo() {
        if (isset($_SESSION['cargo'])) {
            if ($_SESSION['cargo'] == "admin") {
                $id = isset($_POST['idP'])?(int)$_POST['idP'] :0;
                $producto = $this->modeloProductos->getC($id);
                $this->vistaProductos->editarC($producto);
            } else {
                echo "error 404";
            }
        } else {
            echo "error 404";
        }
        
    }

    function actualizarCombo() {
        $nombre = $_POST['nombreP_a'];
        $precio = $_POST['precioP_a'];
        $desc = $_POST['descP_a'];
        $id = isset($_POST['idP'])?(int)$_POST['idP'] :0;
        $this->modeloProductos->actualizarC($nombre,$precio,$desc,$id);
        header('location: combos');
    }

    //CARRITO DE COMPRAS

    
    function agregarAlCarrito($id) {

        if (!isset($_SESSION['usuario'])) {
            echo "<script>
            alert('Debes iniciar sesion antes de añadr un producto al carrito');
            window.location = '../login';
            </script>";
        } else {
            $this->modeloProductos->agregarCarrito();
            echo "<script>
                 window.location = '../verCarrito';
            </script>";
        }
    }

    function eliminarDelCarrito() {
        $this->modeloProductos->eliminarCarrito();
        echo "<script>
                 window.location = 'verCarrito';
            </script>";
    }

    function mostrarCarrito() {
        $this->vistaProductos->mostrarCarrito();
    }

    function enviarRecibo() {
        $recibo = $_SESSION['total'];
        $correo = $_POST['email'];
        if (isset($_SESSION['usuario'])) {
            $nombre = $_SESSION['usuario'];
        } else {
            $nombre = "usuario_restaurante";
        }
        $this->modeloProductos->enviarRecibo($recibo,$nombre,$correo);
    }

}