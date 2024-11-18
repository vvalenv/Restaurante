<main class="main-productos">
    <h3 class="title-p">Combos</h3>
    <form action="buscarCombo" method="GET" class="form-buscarP">
        <input type="text" name="input-buscarP" />
        <input type="image" src="icon/search.svg" name="submit-buscar" class="submit-buscar"/>
    </form>
    <div class="productos-div">
        <?php
        include('modelo/config.php');
        if (isset($_SESSION['usuario'])) {
            if (isset($_SESSION['cargo'])) {
                if ($_SESSION['cargo'] == "admin") {
                    echo "<div class='agregarbtn' id='agregarbtn'><img src='icon/plus.svg' title='Agregar producto' alt='Agregar producto'></div>";
                    echo "<div class='div-agregar-p' id='div-agregar-p'>
                            <form class='form-agregar-p' method='POST' action='agregarCombo' enctype='multipart/form-data'>
                                <label for='input-nombre-p'>Ingresa el nombre del producto</label>
                                <input type='text' class='input-nombre-p' id='input-nombre-p' name='nombre-p' maxlength='40' required />
                                <span class='archivoAsubir'>
                                    <input type='file' class='input-img' id='archivoAsubir' name='archivoAsubir' accept='image/png, image/jpeg' />
                                </span>
                                <label for='archivoAsubir' class='label-agregar-img'>
                                <span><img src='icon/download.svg'/>  Agregar imagen</span>
                                </label>
                                <label for='input-desc-p'>Ingresa la descripcion del producto</label>
                                <textarea class='input-desc-p' id='input-desc-p' name='desc-p' maxlength='155' required></textarea>
                                <label for='input-precio-p'>Ingresa el precio del producto</label>
                                <input type='number' class='input-precio-p' id='input-precio-p' name='precio-p' min='1' required />
                                <button type='submit' class='submit-p' id='submit-p'>Agregar</button>
                                <div id='btn-volver' class='btn-volver'>Volver</div>
                            </form>
                        </div>";
                    }
                }
            }
        ?>
        <?php
        if (isset($buscado)) {
            if ($buscado == true) {
                $com = $buscado;
            }
        }
        foreach ($com as $combo) {
            if (!isset($_SESSION['cargo'])) {
                    echo "<div class='card text-center' style='width: 100%;' name='card-p'>
                            <div class='front'>
                                <img src='".$combo['img_combo']."' class='card-img-top' id='img-p'/>
                                <div class='card-body'>
                                    <h5 class='card-title' id='nombre-p'>".$combo['nombre_combo']."</h5>
                                    <p class='card-text' id='precio-p'>$".$combo['precio_combo']."</p>
                                    <form action='agregarcarrito/".$combo['id_combo']."' method='POST' class='formEliminar' id='formEliminar'>
                                        <input type='hidden' name='id' id='id' value='".openssl_encrypt($combo['id_combo'],COD,KEY)."'/>
                                        <input type='hidden' name='nombre' id='nombre' value='".openssl_encrypt($combo['nombre_combo'],COD,KEY)."'/>
                                        <input type='hidden' name='precio' id='precio' value='".openssl_encrypt($combo['precio_combo'],COD,KEY)."'/>
                                        <input type='hidden' name='cantidad' id='cantidad' value='".openssl_encrypt(1,COD,KEY)."'/>
                                        <button name='btn-accion' class='btn btn-primary'>Añadir al carrito</button>
                                    </form>
                                </div>
                            </div>
                            <div class='back'>
                                <p class='card-text' id='desc-p'>".$combo['desc_combo']."</p>
                            </div>";
                    echo "</div>";
            }
            if (isset($_SESSION['cargo'])) {
                        echo "<div class='card text-center' style='width: 100%;' id='card-p'>
                                <div class='front'>
                                    <img src='".$combo['img_combo']."' class='card-img-top' id='img-p'/>
                                    <div class='card-body'>
                                        <h5 class='card-title' id='nombre-p'>".$combo['nombre_combo']."</h5>
                                        <p class='card-text' id='precio-p'>$".$combo['precio_combo']."</p>";
                            if ($_SESSION['cargo'] == "admin") {
                                echo "<div>
                                <form action='eliminarCombo' method='POST' class='formEliminar' id='formEliminar'>
                                        <input type='hidden' name='id' class='id' value='".$combo['id_combo']."'>
                                        <input type='image' src='icon/trash.svg' alt='eliminar' class='btn btn-primary' onclick='return alertaEliminar();' name='eliminar' id='eliminar' title='Eliminar'/>
                                    </form>
                                    <script type='text/javascript'>
                                                function alertaEliminar() {
                                                    var respuesta = confirm('Estas seguro que deseas eliminar este producto?');
                                                    if (respuesta == true) {
                                                        return true;
                                                    } else {
                                                        return false;
                                                    }
                                                }
                                    </script>";
                                echo "<form action='editarCombo' method='POST' class='formEditar' id='formEditar'>
                                        <input type='hidden' name='idP' class='id' value='".$combo['id_combo']."'>
                                        <input type='image' src='icon/edit.svg' alt='editar' class='btn btn-primary' name='editar' id='editar' title='Editar'/>
                                    </form>
                                    </div>";
                            } else if ($_SESSION['cargo'] == "") {
                                echo "<form action='agregarcarrito/".$combo['id_combo']."' method='POST' class='formEliminar' id='formEliminar'>
                                    <input type='hidden' name='id' id='id' value='".openssl_encrypt($combo['id_combo'],COD,KEY)."'/>
                                    <input type='hidden' name='nombre' id='nombre' value='".openssl_encrypt($combo['nombre_combo'],COD,KEY)."'/>
                                    <input type='hidden' name='precio' id='precio' value='".openssl_encrypt($combo['precio_combo'],COD,KEY)."'/>
                                    <input type='hidden' name='cantidad' id='cantidad' value='".openssl_encrypt(1,COD,KEY)."'/>
                                    <button name='btn-accion' class='btn btn-primary'>Añadir al carrito</button>
                                </form>";
                            }
                                echo "</div>
                                    </div>
                                <div class='back'>
                                    <p class='card-text' id='desc-p'>".$combo['desc_combo']."</p>
                                </div>
                            </div>";
                if ($_SESSION['cargo'] == "") {
                    echo "<a href='verCarrito' class='circulo'>
                        <img src='icon/carrito.svg' alt='carrito de compras' class='icono-carrito' title='Carrito de compras'>
                    </a>";
                }
            }
        }
        ?>
    </div>
</main>