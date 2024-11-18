<body id="body">
    <header class="header">
        <span class="nav-bar" id="btnmenu"><img src="img/identidad/logo.png" alt="logo" class="logo_img"></span>
        <nav class="nav-bar2">
            <div class="logo"><img src="img/identidad/logo.png" alt="logo" class="logo_img"></div>
            <ul class="menu" id="menu">
                <li class="menu__item"><a href="home" class="menu__link">Inicio</a></li>
                <li class="menu__item container-submenu">
                    <a href="#" class="menu__link submenu-btn">Productos</a>
                    <ul class="submenu">
                        <li class="menu__item"><a href="pizzas" class="menu__link">Pizzas</a></li>
                        <li class="menu__item"><a href="bebidas" class="menu__link">Bebidas</a></li>
                        <li class="menu__item"><a href="combos" class="menu__link">Combos</a></li>
                    </ul>
                </li>
                <li class="menu__item">
                    <a href="nosotros" class="menu__link">Nosotros</a>
                </li>
                <?php
                    if (isset($_SESSION['usuario'])) {
                        echo "<li class='menu__item'>
                                <a href='editUser' class='menu__link'>".$_SESSION['usuario']."</a>
                            </li>
                        <li class='menu__item' id='link_session'>
                            <a href='desloguear' class='menu__link'>
                                <img src='icon/door.svg' alt='icono-desloguear' class='icono-perfil'>
                            </a>
                        </li>";
                    } else {
                        echo "<li class='menu__item' id='link_session2'>
                                <a href='login' class='menu__link'>
                                    <img src='icon/user.svg' alt='icono-perfil' class='icono-perfil'>
                                </a>
                            </li>";
                    }
                ?>
            </ul>
        </nav>
    </header>