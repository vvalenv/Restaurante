<main class="main-editar">
    <p class="title-edit-p">Editar producto</p>
    <?php
    echo "<form action='actualizarPizza' method='POST' class='cardProducto' enctype='multipart/form-data'>
            <div>
                <input type='file' class='edit_img' id='edit_img' name='edit_img' accept='image/png, image/jpeg'/>
                <label for='edit_img'>
                    <img src='".$producto->img_pizza."' class='img-p' id='img-p'/>
                </label>
            </div>
            <label for='nombre-p'>Nombre del producto:</label>
            <input type='text' name='nombreP_a' class='nombre-p' id='nombre-p' value='".$producto->nombre_pizza."'/>
            <label for='precio-p'>Precio del producto:</label>
            <input type='number' name='precioP_a' class='precio-p' id='precio-p' value='".$producto->precio_pizza."'/>
            <label for='desc-p'>Descripcion del producto:</label>
            <textarea name='descP_a' class='desc-p' id='desc-p'>".$producto->desc_pizza."</textarea>
            <input type='hidden' name='idP' class='id' value='".$producto->id_pizza."'>
            <input type='submit' class='btnActualizar' value='Actualizar'/>";
    echo "</form>";
    ?>
</main>