<main class="main-carrito">
<h3 class='title-carrousel'>Carrito de compras</h3>
<a href="pizzas" class="circulo-back">
    <img src="icon/back.svg" alt="volver">
</a>
<?php
include('modelo/config.php');
if (isset($mensaje)) {
    if($mensaje!=""){
        echo "<script type='text/javascript'>alert('".$mensaje."');</script>";
    }
}
if(isset($_SESSION['CARRITO'])) { ?>

<table class="table table-light table-bordered">
    <tbody>
        <tr>
           <th width="40%"class="text-center">Descripcion</th>
           <th width="15%"class="text-center">Cantidad</th>
           <th width="20%"class="text-center">Precio</th>
           <th width="20%"class="text-center">Total</th>
           <th width="5%"class="text-center">--</th>
        </tr>
        <?php 
        $total=0;
        foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>
        <tr>
           <td width="40%"class="text-center"><?php echo $producto['NOMBRE']?></td>
           <td width="15%"class="text-center"><?php echo $producto['CANTIDAD']?></td>
           <td width="20%"class="text-center"><?php echo $producto['PRECIO']?></td>
           <td width="20%"class="text-center"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2);?></td>
           <td width="5%"class="text-center">
                <form action="eliminarCarrito" method="POST">
                    <input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                    <input type="image" src="icon/trash.svg" class="btn btn-danger" name="btn-accion" />
                </form>
            </td>
        </tr>
        <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
        $_SESSION['total'] = $total; ?>
        <?php } ?>
        <tr>
            <td colspan="3" align="right"><h3>Total:</h3></td>
            <td align="left"><h3>$<?php echo number_format($total, 2);?></h3></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5">
                <form action="enviarRecibo" method="POST">
                    <div class="alert alert-success" role="alert">
                    <div class="form-group">
                  <label for="my-input">Correo de contacto:</label>
                  <input id= "email" name="email" class="form-control" type="email" placeholder="Escribir correo" required>
                    
                    <small id="emailhelp" class="form-text text-muted">El recibo se enviara a este correo</small>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit" value="proceder" name="btn-enviar">
                        Enviar recibo
                    </button>
                </form>
            </td>
        </tr>

    </tbody>
</table>

<?php } else { ?>
    <div class="alert alert-success" >
        No hay productos en el carrito
    </div> 
    <?php } ?>

</main>