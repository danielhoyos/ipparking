<?php
$config = Config::singleton();
?>
<html lang="es">
    <head>
        <title>.: Recuperar Contraseña</title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_user.php"; ?>

        <div class="contenedor_principal">
            
            <?php require_once $config->get("viewsFolder")."template/msg.php" ?>
            
            <div class='ingresarUser'>
                <form method='POST' action='?action=restore_password' id='restore_password'>
                    <h2>RECUPERAR CONTRASEÑA</h2>
                    <img src="?controller=Captcha" id="captcha"/>
                    <div class="reload_captcha" title="Recargar imagen"><span class="icon-spinner11"></span></div>
                    <div class="input_login" id="input_captcha"><span class="icon-qrcode"></span><input type='text' placeholder='Ingrese los carácteres' name='captcha' id='valor_captcha'/></div>
                    <div id="captcha_ajax"></div>
                    <div class="input_login" id="input_correo"><span class="icon-envelop"></span><input type='email' placeholder='Ingrese su e-mail' name='correo_restore' id='correo_restore' /> </div>
                    <div id="restore_ajax"></div>
                </form> 
                
                <button class="button" id="enviar_password" disabled>ENVIAR</button>
                <button class="button" id="volver_password">VOLVER</button>
                
            </div>
        </div>

        <?php require_once $config->get("viewsFolder") . "template/footer.php"; ?>
    </body>
</html>