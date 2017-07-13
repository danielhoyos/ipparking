<?php
$config = Config::singleton();
$user = AppController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Cliente | IPParking</title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
        <link rel="stylesheet" href="<?php echo "{$config->get("cssFolder")}cliente.css"?>"/>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_cliente.php"; ?>

        <div class="contenedor_principal">
            <div class='menu_cliente cliente_perfil' onclick="location.href = '?controller=Index&action=perfil'">
                <div class="titulo_item_cliente"><span class="icon-user-tie"></span><h3>PERFIL</h3></div>
            </div>
            <div class='menu_cliente cliente_parqueo' onclick="location.href = '?controller=Index&action=parqueos'">
                <div class="titulo_item_cliente"><span class="icon-user"></span><h3>MI PARQUEO</h3></div>
            </div>
            <div class='menu_cliente cliente_facturas' onclick="location.href = '?controller=Index&action=facturas'">
                <div class="titulo_item_cliente"><span class="icon-road"></span><h3>FACTURAS</h3></div>
            </div>
        </div>

        <?php require_once $config->get("viewsFolder") . "template/footer.php";
        ?>
    </body>
</html>