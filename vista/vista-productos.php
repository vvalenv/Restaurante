<?php
class vistaProductos{

    /*PIZZAS*/

    function showPizzas($result) {
        include('secciones/head.php');
        include('secciones/nav.php');
        include('secciones/main_pizzas.php');
        include('secciones/footer.php');
    }

    function pizzaBuscada($result, $buscado) {
        include('secciones/head.php');
        include('secciones/nav.php');
        include('secciones/main_pizzas.php');
        include('secciones/footer.php');
    }

    function editarP($producto) {
        include('secciones/head.php');
        include('secciones/nav.php');
        include('secciones/editarP.php');
        include('secciones/footer.php');
    }

    /*BEBIDAS*/ 

    function showBebidas($result) {
        include('secciones/head.php');
        include('secciones/nav.php');
        include('secciones/main_bebidas.php');
        include('secciones/footer.php');
    }

    function bebidaBuscada($result, $buscado) {
        include('secciones/head.php');
        include('secciones/nav.php');
        include('secciones/main_bebidas.php');
        include('secciones/footer.php');
    }

    function editarB($producto) {
        include('secciones/head.php');
        include('secciones/nav.php');
        include('secciones/editarB.php');
        include('secciones/footer.php');
    }

    /*COMBOS*/

    function showCombos($com) {
        include('secciones/head.php');
        include('secciones/nav.php');
        include('secciones/main_combos.php');
        include('secciones/footer.php');
    }

    function comboBuscado($result, $buscado) {
        include('secciones/head.php');
        include('secciones/nav.php');
        include('secciones/main_combos.php');
        include('secciones/footer.php');
    }

    function editarC($producto) {
        include('secciones/head.php');
        include('secciones/nav.php');
        include('secciones/editarC.php');
        include('secciones/footer.php');
    }

    //CARRITO DE COMPRAS

    function mostrarCarrito() {
        include('secciones/head.php');
        include('secciones/nav.php');
        include('secciones/mostrarcarrito.php');
        include('secciones/footer.php');
    }

}