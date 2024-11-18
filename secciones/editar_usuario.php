<main class="main-editar">
    <h4 class="title-editUser">Editar usuario</h4>
    <?php
    echo "<form action='actualizarUsuario' method='POST' class='form-editUser'>
            <label for='nombre-u'>Nombre de usuario:</label>
            <input type='text' name='usuario-act' class='nombre-userEdit' id='nombre-u' value='".$user->nombre_usuario."'/>
            <label for='contra-u'>Contraseña:</label>
            <input type='password' name='contra-act' class='contra-userEdit' id='contra-u' value='".$_SESSION['contrasena']."'/>";
            if (isset($_SESSION['email'])) {
                if ($_SESSION['email'] != "") {
                    echo "<label for='mail-u'>Email:</label>
                    <input type='email' name='email-act' class='mail-userEdit' id='mail-u' value='".$user->email_usuario."'/>";
                }
            }
            echo "<input type='hidden' name='id' class='id' value='".$user->id_usuario."'>
            <input type='submit' class='btnActualizar' value='Actualizar'/>
    </form>";
    ?>
</main>