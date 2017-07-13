<?php
$config = Config::singleton();
?>
<html lang="es">
    <head>
        <title>.: Inicio de Sesion | IPParking</title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
        <script src="<?php echo $config->get("jsFolder")."auth.js"?>"></script>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_user.php"; ?>

        <div class="contenedor_principal">
            
            <?php require_once $config->get("viewsFolder")."template/msg.php" ?>
            
            <div class='ingresarUser'>
                <form method='POST' action='?action=validarUsuario' id="form_ingresar_administracion">
                    <h2>INICIAR SESIÓN</h2>
                    <div class="icono_login"></div>
                    <div class="input_login input_login_usuario"><span class="icon-user"></span><input type='text' placeholder='Usuario' name='usu_usuario' id='usu_usuario'/></div>
                    <div id="msg_usuario" class="msg_respuesta"></div>
                    <div class="input_login input_login_password"><span class="icon-unlocked"></span><input type='password' placeholder='Contraseña' name='usu_password' id='usu_password'/></div>
                    <input type='submit' value='INGRESAR' class="button button_login" name="button_login" id="button_ingresar_administracion"/><br>
                    <a class='recuperar' href='?action=form_restore_password'>¿Olvidaste tu <br> contraseña?</a>
                </form> 
            </div>
        </div>

        <?php require_once $config->get("viewsFolder") . "template/footer.php"; ?>
    </body>
</html>