<?php
$config = Config::singleton();
$user = PrivateAppAuthController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Administrador</title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_user.php"; ?>

        <div class="contenedor_principal">
            <div class='item_menu item_perfil' onclick="location.href = '?controller=Index&action=perfil'">
                <div class="titulo_item"><span class="icon-user-tie"></span><h3>PERFIL</h3></div>
            </div>
            <div class='item_menu item_admin' onclick="location.href = '?controller=Index&action=parqueadero'">
                <div class="titulo_item"><span class="icon-office"></span><h3>PARQUEADERO</h3></div>
            </div>
            <div class='item_menu item_empleado' onclick="location.href = '?controller=Index&action=empleados'">
                <div class="titulo_item"><span class="icon-user"></span><h3>EMPLEADOS</h3></div>
            </div>
            <div class='item_menu item_estacion' onclick="location.href = '?controller=Index&action=estaciones'">
                <div class="titulo_item"><span class="icon-road"></span><h3>ESTACIONES</h3></div>
            </div>
            <div class='item_menu item_tarifas' onclick="location.href = '?controller=Index&action=tarifas'">
                <div class="titulo_item"><span class="icon-price-tags"></span><h3>TARIFAS</h3></div>
            </div>
            <div class='item_menu item_camaras' onclick="location.href = '?controller=Index&action=camaras'">
                <div class="titulo_item"><span class="icon-camera"></span><h3>CAMARAS</h3></div>
            </div>
            <div class='item_menu item_ventas' onclick="location.href = '?controller=Index&action=ventas'">
                <div class="titulo_item"><span class="icon-ticket"></span><h3>VENTAS</h3></div>
            </div>
            <div class='item_menu item_contabilidad' onclick="location.href = '?controller=Index&action=parqueos'">
                <div class="titulo_item"><span class="icon-directions_car"></span><h3>MI PARQUEO</h3></div>
            </div>
        </div>

        <?php require_once $config->get("viewsFolder") . "template/footer.php";
        ?>
    </body>
</html>
