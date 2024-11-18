        <footer class="footerr">
            <p class="footer-text">&copy; Franco Zappia y Valentín Villar</p>
            <div class="redes-sociales-div">
                <img src="icon/instagram.svg" alt="ig" class="redes_sociales" id="icon-ig">
                <img src="icon/facebook.svg" alt="fc" class="redes_sociales" id="icon-fc">
            </div>
        </footer>
        <script type="application/javascript">
            jQuery('input[type=file]').change(function(){
            var filename = jQuery(this).val().split('\\').pop();
            var idname = jQuery(this).attr('id');
            console.log(jQuery(this));
            console.log(filename);
            console.log(idname);
            jQuery('span.'+idname).next().find('span').html(filename);
        });
        </script>
        <script src="js/js.js"></script>
        <script src="js/agregar.js"></script>
        <script src="js/redireccion.js"></script>
        <script src="js/cards.js"></script>
        <script src="js/body.js"></script>
    </body>
</html>