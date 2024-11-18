<?php
class vistaUsuario{

    function showHome(){
        include('secciones/head.php');  //armar la pagina incluyendo todas las secciones
        include('secciones/nav.php');
        include('secciones/main.php');
        include('secciones/footer.php');
    }

    function showlogin(){
        include('secciones/head.php');
        include('secciones/nav.php');
        include('secciones/seccion-login.php');
        include('secciones/footer.php');
    }

    function showNosotros(){
        include('secciones/head.php');
        include('secciones/nav.php');
        include('secciones/nosotros.php');
        include('secciones/footer.php');
    }

    function formEdit($user){
        include('secciones/head.php');  
        include('secciones/nav.php');
        include('secciones/editar_usuario.php');
        include('secciones/footer.php');
    }

}