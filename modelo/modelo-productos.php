<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once('modelo.php');
class modeloProductos extends modelo {

    /*PIZZAS*/

    function mostrarP() {
        $query = $this-> getDb()->prepare('SELECT * FROM pizzas');
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    function buscarP($busqueda) {
        $query = $this-> getDb()->prepare("SELECT * FROM pizzas WHERE nombre_pizza LIKE '%$busqueda%' ");
        $query->execute();
        if ($query) {
            echo "<script type='text/javascript'>alert('Producto encontrado')</script>";
            $search = $query->fetchAll(PDO::FETCH_ASSOC);
            return $search;
        } else {
            echo "<script type='text/javascript'>alert('Producto no encontrado')</script>";
        }
    }

    function agregarP() {
        $db =  $this->getDb();

        $nombre = $_POST['nombre-p'];
        $desc = $_POST['desc-p'];
        $precio = $_POST['precio-p'];
        $id = $nombre;

        $carpetaDestino = "img/";
        $archivo = $carpetaDestino . basename($_FILES["archivoAsubir"]["name"]); // recibimos el archivo completo con nombre y extension para concatenarlo con la carpeta destino
        $subio = 1;
        $tipoDeImagen = strtolower(pathinfo($archivo,PATHINFO_EXTENSION)); // devuelve el tipo de extension del archivo

        // Chequea si el archivo existe
        if (file_exists($archivo)) {
            $subio = 0;
        }

        // si subio esta en 0, los criterios de la imagen no ocurrieron
        if ($subio == 0) {
                $imagen = $carpetaDestino."img_default/pizza.jpg";
                // si todo esta ok, trata de subir el archivo
            } else {
            if (move_uploaded_file($_FILES["archivoAsubir"]["tmp_name"], $carpetaDestino.$id.".".$tipoDeImagen)) { //movemos el archivo desde memoria a una carpeta destino, reescribimos su nombre, le agregamos "." y su extension al final
                echo "<script type='text/javascript'>alert('El archivo ". htmlspecialchars( basename( $_FILES["archivoAsubir"]["name"])). " fue subido como:  \"".$id.".".$tipoDeImagen."\"')</script>"; //mensaje de subida con el nuevo nombre
                $imagen = $carpetaDestino.$id.".".$tipoDeImagen;
            } else {
                echo "<script type='text/javascript'>alert('Hubo un error subiendo tu archivo.')</script>";
            }
        }

        $buscar = $this->getDb()->prepare('SELECT * FROM pizzas WHERE nombre_pizza = ?');
        $buscar->execute([$nombre]);

        if ($buscar->rowCount() > 0) {
            echo "<script type='text/javascript'>alert('Ya hay una pizza con ese nombre')</script>";
        } else {
            $query = $this->getDb()->prepare('INSERT INTO pizzas(nombre_pizza, img_pizza, desc_pizza, precio_pizza) VALUES (?,?,?,?)');
            $query->execute([$nombre,$imagen,$desc,$precio]);
        }
    }

    function getP($id) {
        $query = $this-> getDb()->prepare('SELECT * FROM pizzas WHERE id_pizza = ?');
        $query->execute([$id]);
        $resultado = $query->fetch(PDO::FETCH_OBJ);
        return $resultado;
    }

    function actualizarP($nombre,$precio,$desc,$id) {

            $carpetaDestino = "img/";
            $archivo = $carpetaDestino . basename($_FILES["edit_img"]["name"]); // recibimos el archivo completo con nombre y extension para concatenarlo con la carpeta destino
            $subio = 1;
            $nombreImagen = strtolower(pathinfo($archivo,PATHINFO_FILENAME)); // devuelve el nombre del archivo
            $tipoDeImagen = strtolower(pathinfo($archivo,PATHINFO_EXTENSION)); // devuelve el tipo de extension del archivo

            // Chequea si el archivo existe
            if (file_exists($archivo)) {
                echo "<script type='text/javascript'>alert('El archivo \"". htmlspecialchars(basename( $_FILES["edit_img"]["name"]))."\"  ya existe')</script>";
                $subio = 0;
            }

            // si subio esta en 0, los criterios de la imagen no ocurrieron
            if ($subio == 0) {
                    echo "<script type='text/javascript'>alert('El archivo no fue subido.')</script>";
                    // si todo esta ok, trata de subir el archivo
                } else {
                if (move_uploaded_file($_FILES["edit_img"]["tmp_name"], $carpetaDestino.$nombreImagen.".".$tipoDeImagen)) { //movemos el archivo desde memoria a una carpeta destino, reescribimos su nombre, le agregamos "." y su extension al final
                    echo "<script type='text/javascript'>alert('El archivo ". htmlspecialchars( basename( $_FILES["edit_img"]["name"])). " fue subido como:  \"".$nombreImagen.".".$tipoDeImagen."\"')</script>"; //mensaje de subida con el nuevo nombre
                } else {
                    echo "<script type='text/javascript'>alert('Hubo un error subiendo tu archivo.')</script>";
                }
            }
            $imagen = $carpetaDestino.$nombreImagen.".".$tipoDeImagen;

        
            if ($_FILES['edit_img']['size'] == 0 && $_FILES['edit_img']['name'] == "") {
                $query2 = $this-> getDb()->prepare('UPDATE pizzas SET nombre_pizza = ?, precio_pizza = ?, desc_pizza = ? WHERE id_pizza = ?');
                $query2->execute([$nombre,$precio,$desc,$id]);
            } else {
                $query = $this-> getDb()->prepare('UPDATE pizzas SET nombre_pizza = ?, img_pizza = ?, precio_pizza = ?, desc_pizza = ? WHERE id_pizza = ?');
                $query->execute([$nombre,$imagen,$precio,$desc,$id]);
            }
        
    }

    function borrarP($id) {
        $query = $this-> getDb()->prepare('DELETE FROM pizzas WHERE id_pizza = ?');
        $query->execute([$id]);
    }

    /*BEBIDAS*/

    function mostrarB() {
        $query = $this-> getDb()->prepare('SELECT * FROM bebidas');
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    function buscarB($busqueda) {
        $query = $this-> getDb()->prepare("SELECT * FROM bebidas WHERE nombre_bebida LIKE '%$busqueda%' ");
        $query->execute();
        if ($query) {
            echo "<script type='text/javascript'>alert('Producto encontrado')</script>";
            $search = $query->fetchAll(PDO::FETCH_ASSOC);
            return $search;
        } else {
            echo "<script type='text/javascript'>alert('Producto no encontrado')</script>";
        }
    }

    function agregarB() {
        $db =  $this->getDb();

        $nombre = $_POST['nombre-p'];
        $desc = $_POST['desc-p'];
        $precio = $_POST['precio-p'];
        $id = $nombre;

        $carpetaDestino = "img/";
        $archivo = $carpetaDestino . basename($_FILES["archivoAsubir"]["name"]); // recibimos el archivo completo con nombre y extension para concatenarlo con la carpeta destino
        $subio = 1;
        $tipoDeImagen = strtolower(pathinfo($archivo,PATHINFO_EXTENSION)); // devuelve el tipo de extension del archivo

        // Chequea si el archivo existe
        if (file_exists($archivo)) {
            $subio = 0;
        }

        // si subio esta en 0, los criterios de la imagen no ocurrieron
        if ($subio == 0) {
                $imagen = $carpetaDestino."img_default/bebida.jpg";
                // si todo esta ok, trata de subir el archivo
            } else {
            if (move_uploaded_file($_FILES["archivoAsubir"]["tmp_name"], $carpetaDestino.$id.".".$tipoDeImagen)) { //movemos el archivo desde memoria a una carpeta destino, reescribimos su nombre, le agregamos "." y su extension al final
                echo "<script type='text/javascript'>alert('El archivo ". htmlspecialchars( basename( $_FILES["archivoAsubir"]["name"])). " fue subido como:  \"".$id.".".$tipoDeImagen."\"')</script>"; //mensaje de subida con el nuevo nombre
                $imagen = $carpetaDestino.$id.".".$tipoDeImagen;
            } else {
                echo "<script type='text/javascript'>alert('Hubo un error subiendo tu archivo.')</script>";
            }
        }

        $buscar = $this->getDb()->prepare('SELECT * FROM bebidas WHERE nombre_bebida = ?');
        $buscar->execute([$nombre]);

        if ($buscar->rowCount() > 0) {
            echo "<script type='text/javascript'>alert('Ya hay una bebida con ese nombre')</script>";
        } else {
            $query = $this->getDb()->prepare('INSERT INTO bebidas(nombre_bebida, img_bebida, desc_bebida, precio_bebida) VALUES (?,?,?,?)');
            $query->execute([$nombre,$imagen,$desc,$precio]);
        }
    }

    function borrarB($id){
        $query = $this-> getDb()->prepare('DELETE FROM bebidas WHERE id_bebida = ?');
        $query->execute([$id]);
    }

    function getB($id) {
        $query = $this-> getDb()->prepare('SELECT * FROM bebidas WHERE id_bebida = ?');
        $query->execute([$id]);
        $resultado = $query->fetch(PDO::FETCH_OBJ);
        return $resultado;
    }

    function actualizarB($nombre,$precio,$desc,$id) {

        $carpetaDestino = "img/";
        $archivo = $carpetaDestino . basename($_FILES["edit_imgB"]["name"]); // recibimos el archivo completo con nombre y extension para concatenarlo con la carpeta destino
        $subio = 1;
        $nombreImagen = strtolower(pathinfo($archivo,PATHINFO_FILENAME)); // devuelve el nombre del archivo
        $tipoDeImagen = strtolower(pathinfo($archivo,PATHINFO_EXTENSION)); // devuelve el tipo de extension del archivo

        // Chequea si el archivo existe
        if (file_exists($archivo)) {
            echo "<script type='text/javascript'>alert('El archivo \"". htmlspecialchars(basename( $_FILES["edit_imgB"]["name"]))."\"  ya existe')</script>";
            $subio = 0;
        }

        // si subio esta en 0, los criterios de la imagen no ocurrieron
        if ($subio == 0) {
                echo "<script type='text/javascript'>alert('El archivo no fue subido.')</script>";
                // si todo esta ok, trata de subir el archivo
            } else {
            if (move_uploaded_file($_FILES["edit_imgB"]["tmp_name"], $carpetaDestino.$nombreImagen.".".$tipoDeImagen)) { //movemos el archivo desde memoria a una carpeta destino, reescribimos su nombre, le agregamos "." y su extension al final
                echo "<script type='text/javascript'>alert('El archivo ". htmlspecialchars( basename( $_FILES["edit_imgB"]["name"])). " fue subido como:  \"".$nombreImagen.".".$tipoDeImagen."\"')</script>"; //mensaje de subida con el nuevo nombre
            } else {
                echo "<script type='text/javascript'>alert('Hubo un error subiendo tu archivo.')</script>";
            }
        }
        $imagen = $carpetaDestino.$nombreImagen.".".$tipoDeImagen;

    
        if ($_FILES['edit_imgB']['size'] == 0 && $_FILES['edit_imgB']['name'] == "") {
            $query2 = $this-> getDb()->prepare('UPDATE bebidas SET nombre_bebida = ?, precio_bebida = ?, desc_bebida = ? WHERE id_bebida = ?');
            $query2->execute([$nombre,$precio,$desc,$id]);
        } else {
            $query = $this-> getDb()->prepare('UPDATE bebidas SET nombre_bebida = ?, img_bebida = ?, precio_bebida = ?, desc_bebida = ? WHERE id_bebida = ?');
            $query->execute([$nombre,$imagen,$precio,$desc,$id]);
        }
    }

    /*COMBOS*/

    function mostrarC() {
        $query = $this-> getDb()->prepare('SELECT * FROM combos');
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    function buscarC($busqueda) {
        $query = $this-> getDb()->prepare("SELECT * FROM combos WHERE nombre_combo LIKE '%$busqueda%' ");
        $query->execute();
        if ($query) {
            echo "<script type='text/javascript'>alert('Producto encontrado')</script>";
            $search = $query->fetchAll(PDO::FETCH_ASSOC);
            return $search;
        } else {
            echo "<script type='text/javascript'>alert('Producto no encontrado')</script>";
        }
    }

    function agregarC() {
        $db =  $this->getDb();

        $nombre = $_POST['nombre-p'];
        $desc = $_POST['desc-p'];
        $precio = $_POST['precio-p'];
        $id = $nombre;

        $carpetaDestino = "img/";
        $archivo = $carpetaDestino . basename($_FILES["archivoAsubir"]["name"]); // recibimos el archivo completo con nombre y extension para concatenarlo con la carpeta destino
        $subio = 1;
        $tipoDeImagen = strtolower(pathinfo($archivo,PATHINFO_EXTENSION)); // devuelve el tipo de extension del archivo

        // Chequea si el archivo existe
        if (file_exists($archivo)) {
            $subio = 0;
        }

        // si subio esta en 0, los criterios de la imagen no ocurrieron
        if ($subio == 0) {
                $imagen = $carpetaDestino."img_default/combo.jpg";
                // si todo esta ok, trata de subir el archivo
            } else {
            if (move_uploaded_file($_FILES["archivoAsubir"]["tmp_name"], $carpetaDestino.$id.".".$tipoDeImagen)) { //movemos el archivo desde memoria a una carpeta destino, reescribimos su nombre, le agregamos "." y su extension al final
                echo "<script type='text/javascript'>alert('El archivo ". htmlspecialchars( basename( $_FILES["archivoAsubir"]["name"])). " fue subido como:  \"".$id.".".$tipoDeImagen."\"')</script>"; //mensaje de subida con el nuevo nombre
                $imagen = $carpetaDestino.$id.".".$tipoDeImagen;
            } else {
                echo "<script type='text/javascript'>alert('Hubo un error subiendo tu archivo.')</script>";
            }
        }

        $buscar = $this->getDb()->prepare('SELECT * FROM combos WHERE nombre_combo = ?');
        $buscar->execute([$nombre]);

        if ($buscar->rowCount() > 0) {
            echo "<script type='text/javascript'>alert('Ya hay un combo con ese nombre')</script>";
        } else {
            $query = $this->getDb()->prepare('INSERT INTO combos(nombre_combo, img_combo, desc_combo, precio_combo) VALUES (?,?,?,?)');
            $query->execute([$nombre,$imagen,$desc,$precio]);
        }
    }

    function borrarC($id){
        $query = $this-> getDb()->prepare('DELETE FROM combos WHERE id_combo = ?');
        $query->execute([$id]);
    }

    function getC($id) {
        $query = $this-> getDb()->prepare('SELECT * FROM combos WHERE id_combo = ?');
        $query->execute([$id]);
        $resultado = $query->fetch(PDO::FETCH_OBJ);
        return $resultado;
    }

    function actualizarC($nombre,$precio,$desc,$id) {

        $carpetaDestino = "img/";
        $archivo = $carpetaDestino . basename($_FILES["edit_imgC"]["name"]); // recibimos el archivo completo con nombre y extension para concatenarlo con la carpeta destino
        $subio = 1;
        $nombreImagen = strtolower(pathinfo($archivo,PATHINFO_FILENAME)); // devuelve el nombre del archivo
        $tipoDeImagen = strtolower(pathinfo($archivo,PATHINFO_EXTENSION)); // devuelve el tipo de extension del archivo

        // Chequea si el archivo existe
        if (file_exists($archivo)) {
            echo "<script type='text/javascript'>alert('El archivo \"". htmlspecialchars(basename( $_FILES["edit_imgC"]["name"]))."\"  ya existe')</script>";
            $subio = 0;
        }

        // si subio esta en 0, los criterios de la imagen no ocurrieron
        if ($subio == 0) {
                echo "<script type='text/javascript'>alert('El archivo no fue subido.')</script>";
                // si todo esta ok, trata de subir el archivo
            } else {
            if (move_uploaded_file($_FILES["edit_imgC"]["tmp_name"], $carpetaDestino.$nombreImagen.".".$tipoDeImagen)) { //movemos el archivo desde memoria a una carpeta destino, reescribimos su nombre, le agregamos "." y su extension al final
                echo "<script type='text/javascript'>alert('El archivo ". htmlspecialchars( basename( $_FILES["edit_imgC"]["name"])). " fue subido como:  \"".$nombreImagen.".".$tipoDeImagen."\"')</script>"; //mensaje de subida con el nuevo nombre
            } else {
                echo "<script type='text/javascript'>alert('Hubo un error subiendo tu archivo.')</script>";
            }
        }
        $imagen = $carpetaDestino.$nombreImagen.".".$tipoDeImagen;

    
        if ($_FILES['edit_imgC']['size'] == 0 && $_FILES['edit_imgC']['name'] == "") {
            $query2 = $this-> getDb()->prepare('UPDATE combos SET nombre_combo = ?, precio_combo = ?, desc_combo = ? WHERE id_combo = ?');
            $query2->execute([$nombre,$precio,$desc,$id]);
        } else {
            $query = $this-> getDb()->prepare('UPDATE combos SET nombre_combo = ?, img_combo = ?, precio_combo = ?, desc_combo = ? WHERE id_combo = ?');
            $query->execute([$nombre,$imagen,$precio,$desc,$id]);
        }
    }

    // CARRITO DE COMPRAS

    function agregarCarrito() {

        include('modelo/config.php');
        $mensaje="";

        if (is_numeric( openssl_decrypt($_POST['id'],COD,KEY))) {

            $ID= openssl_decrypt($_POST['id'],COD,KEY);
            $mensaje.="OK... MUY BUEN ID".$ID;
    
            } else {
                $mensaje.="NO SE PUDO CONECTAR A LA BD".$ID;
            }

            if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))) {
                $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
            } else {
                $mensaje.="NO SE PUDO CONECTAR A LA BD";
            }

            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
            } else {
                $mensaje.="NO SE PUDO CONECTAR A LA BD";
            }

            if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje."CHECKED".$PRECIO;
            } else {
                $mensaje="NO SE PUDO CONECTAR A LA BD";
            }



            if(!isset($_SESSION['CARRITO'])){

                $producto=array( 
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
                $_SESSION['CARRITO'][0]=$producto;
                $mensaje= "Producto agregado";
            }else{

                $idproductos=array_column($_SESSION['CARRITO'],"ID");
                $cantidadproductos=array_column($_SESSION['CARRITO'],"CANTIDAD");
                $nombreproducto=array_column($_SESSION['CARRITO'],"NOMBRE");
                if(in_array($NOMBRE,$nombreproducto)) {
                    $cantidadproductos = $CANTIDAD + 1;
                }
                // if(in_array($ID,$idproductos)){
                //      echo"<script>alert('El producto ya esta');</script>";
                // } else {

                $NumeroProductos=count($_SESSION['CARRITO']);
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO,
                );
                $_SESSION['CARRITO'][$NumeroProductos]=$producto; 
                $mensaje= "Producto agregado";
                
            }
            $mensaje= "Producto agregado";
    }

    function eliminarCarrito() {
        include('modelo/config.php');
        $mensaje="";

        if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
            $ID = openssl_decrypt($_POST['id'],COD,KEY);
                foreach($_SESSION['CARRITO'] as $indice=>$producto){
                    if($producto['ID']==$ID){
                        unset($_SESSION['CARRITO'][$indice]);
                        echo "<script>alert('ELemento borrado....);</script>";
        
                    }
                }
        }else{
            $mensaje="Mala conexion a la bd<br/>";
        }

    }

    function enviarRecibo($recibo,$nombre,$correo) {
        if (isset($_POST['btn-enviar'])) {

            $asunto = "Envío de recibo";
            $body = "Correo: ". $correo ."<br>Recibo: ". $recibo;

    
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
                //$mail->addAddress('francojosezappia@gmail.com');               //Name is optional -->

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $asunto; //asunto
                $mail->Body    = $body; //mensaje

                $mail->CharSet = 'UTF-8';
                $mail->send();

                echo "<script>
                    alert('El mensaje se envio correctamente');
                    window.location = 'verCarrito';
                </script>";
            } catch (Exception $e) {
                echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
            }
        }
    }



}