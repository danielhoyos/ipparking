<?php
$config = Config::singleton();
require_once $config->get("viewsFolder") . "private/datos_perfil.php";
?>

<html lang="es">
    <head>
        <title>.: <?php echo $user->per_nombre . " - IPParking" ?> </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_user.php"; ?>

        <div class="contenedor_principal">
            <?php require_once $config->get("viewsFolder") . "private/assets_perfil.php"; ?>

            <div class="col col3">
                <?php require_once $config->get("viewsFolder") . "template/msg.php"; ?>

                <div class="icon_Col">
                    <img src="<?php echo $config->get("assetsFolder") . "template/icon_password.png"; ?>"/>
                </div>
                <h3 class="titulo_Col">EDITAR CONTRASEÑA</h3><br>
                <form id="editarPassword" action="?action=update_password" method="POST">
                    <table>
                        <tr>
                            <td><label>Contraseña Actual:</label></td>
                            <td><input type="password" name="usu_password" id="usu_password"/><span class="icon-eye icon_verPassword" id="ver_usu_password"></span></a></td>
                        </tr>
                        <tr>
                            <td><label>Nueva Contraseña :</label></td>
                            <td><input type="password" name="usu_password_new" id="usu_password_new" disabled="disabled"/><span class="icon-eye icon_verPassword" id="ver_usu_password_new"></span></a></td>
                        </tr>
                        <tr>
                            <td><label>Verificar Contraseña:</label></td>
                            <td><input type="password" name="usu_password_confirmar" id="usu_password_confirmar" disabled="disabled"/><span class="icon-eye icon_verPassword" id="ver_usu_password_confirmar"></span></a></td>
                        </tr>
                    </table>

                </form>
                <div class="password_ajax" id="password_ajax"></div>
                <br>
                <div id="botones_edit">
                    <button id="botton_editar_password"  class="button" disabled>Guardar</button>
                    <?php
                    if ($user->usu_estado === "activo") {
                        ?>
                        <button id="botton_volver" class="button">Volver</button>
                        <?php
                    }
                    ?>
                </div>
            </div>

        </div>

        <?php require_once $config->get("viewsFolder") . "template/footer.php";
        ?>
    </body>
</html>