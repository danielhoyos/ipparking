<?php
$config = Config::singleton();
$user = PrivateAppAuthController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Gerente</title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_user.php"; ?>

        <div class="contenedor_principal">
            <div class='item_menu item_perfil' onclick="location.href = '?controller=Index&action=perfil'">
                <div class="titulo_item"><span class="icon-user"></span><h3>PERFIL</h3></div>
            </div>
            <div class='item_menu item_admin' onclick="location.href = '?controller=Index&action=parqueaderos'">
                <div class="titulo_item"><span class="icon-user-tie"></span><h3>PARQUEADEROS</h3></div>
            </div>
            <div class='item_menu item_marcas' onclick="location.href = '?controller=Index&action=marcas'">
                <div class="titulo_item"><span class="icon-notification"></span><h3>MARCAS</h3></div>
            </div>
            <div class='item_menu item_novedades' onclick="location.href = '?controller=Index&action=tiposContratos'">
                <div class="titulo_item"><span class="icon-notification"></span><h3>CONTRATOS</h3></div>
            </div>
            <div class='item_menu item_novedades' onclick="location.href = '?controller=Index&action=parqueos'">
                <div class="titulo_item"><span class="icon-notification"></span><h3>MI PARQUEO</h3></div>
            </div>
        </div>

        <?php require_once $config->get("viewsFolder") . "template/footer.php";
        ?>
    </body>
</html>