<main class="main">
    <section class="seccion-1">
        <div class="title-home-div">
            <h1 class="title-home">Pizzería</h1>
            <p class="desc-home">En este proyecto se pueden ver los productos que hay disponibles, tendrá incorporado un carrito de compras y la posibilidad de contactarse con los creadores ademas de tener incorporadas funciones para crear, editar y borrar publicaciones siendo admin.</p>
        </div>
    </section>
    <section class="seccion-2">
        <h2 class='title-carrousel'>¡No te pierdas de nuestros combos!</h2>
        <div class="div-seccion-2">
            <div class="carrousel">
                <article class="card-carrousel">
                    <a href="combos">
                        <img src="img/opcion2.jpeg" alt="item-1" class="img-carrousel">
                    </a>
                </article>
                <article class="card-carrousel">
                    <a href="combos">
                        <img src="img/opcion3.jpeg" alt="item-1" class="img-carrousel">
                    </a>
                </article>
                <article class="card-carrousel">
                    <a href="combos">
                        <img src="img/opcion4.jpeg" alt="item-1" class="img-carrousel">
                    </a>
                </article>
            </div>
        </div>
    </section>
    <section class="seccion-3">
        <div class="div-form-contacto">
            <h2 class="title-contacto">Contactanos</h2>
            <form action="contactar" method="POST" class="form-contacto">
                <label for="input-userMail">Ingrese un correo:</label>
                <input type="email" id="input-userMail" name="inputM" class="inputM" required>
                <label for="input-asunto">Ingrese asunto:</label>
                <input type="text" id="input-asunto" name="input-asunto" class="input-asunto" required>
                <label for="textarea-contacto">Consultanos:</label>
                <textarea name="contact" id="textarea-contacto" required></textarea>
                <button name="submit-contacto" class="submit-contacto">Enviar</button>
            </form>
        </div>
    </section>
</main>