<?php
 define('BASE_URL', '/'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

 require_once('controlador/control-usuarios.php');
 require_once('controlador/control-productos.php');


 if($_GET['action']=='')
 $_GET['action'] = 'home';

 $urlParts = explode('/',$_GET['action']);

 $controlaUsuarios = new ControlaUsuario();
 $controlaProductos = new ControlaProductos();
 session_start();

switch($urlParts[0]){
    case 'home':
        $controlaUsuarios->mostrarHome();
    break;
    case 'nosotros':
        $controlaUsuarios->mostrarNosotros();
    break;
    case 'contactar':
        $controlaUsuarios->contactar();
    break;
    case 'login':
        $controlaUsuarios->mostrarlogin();
    break;
    case 'loguear':
        $controlaUsuarios->verificarUsuario();
    break;
    case 'registrarUsuario':
        $controlaUsuarios->registrarUsuario();
    break;
    case 'editUser':
        $controlaUsuarios->mostrarFormUsuario();
    break;
    case 'actualizarUsuario':
        $controlaUsuarios->actualizarUsuario();
    break;
    case 'desloguear':
        $controlaUsuarios->desloguear();
    break;
    case 'pizzas':
        $controlaProductos->mostrarPizzas();
    break;
    case 'agregarPizza':
        $controlaProductos->agregarPizza();
    break;
    case 'editarPizza':
        $controlaProductos->editarPizza();
    break;
    case 'actualizarPizza':
        $controlaProductos->actualizarPizza();
    break;
    case 'eliminarPizza':
        $controlaProductos->borrarPizza();
    break;
    case 'buscarPizza':
        $controlaProductos->buscarPizza();
    break;
    case 'bebidas':
        $controlaProductos->mostrarBebidas();
    break;
    case 'buscarBebida':
        $controlaProductos->buscarBebida();
    break;
    case 'agregarBebida':
        $controlaProductos->agregarBebida();
    break;
    case 'eliminarBebida':
        $controlaProductos->borrarBebida();
    break;
    case 'editarBebida':
        $controlaProductos->editarBebida();
    break;
    case 'actualizarBebida':
        $controlaProductos->actualizarBebida();
    break;
    case 'combos':
        $controlaProductos->mostrarCombos();
    break;
    case 'buscarCombo':
        $controlaProductos->buscarCombo();
    break;
    case 'agregarCombo':
        $controlaProductos->agregarCombo();
    break;
    case 'eliminarCombo':
        $controlaProductos->eliminarCombo();
    break;
    case 'editarCombo':
        $controlaProductos->editarCombo();
    break;
    case 'actualizarCombo':
        $controlaProductos->actualizarCombo();
    break;
    case 'agregarcarrito':
        $controlaProductos->agregarAlCarrito($urlParts[1]);
    break;
    case 'eliminarCarrito':
        $controlaProductos->eliminarDelCarrito();
    break;
    case 'verCarrito':
        $controlaProductos->mostrarCarrito();
    break;
    case 'enviarRecibo':
        $controlaProductos->enviarRecibo();
    break;
        default: echo 'Error 404';
    break;
}
