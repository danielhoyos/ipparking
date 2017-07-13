<?php
     $config = Config::singleton();
     $user = PrivateAppAuthController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Empleados </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
        <link href="<?php echo $config->get("cssFolder") . "camaras.css" ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo $config->get("jsFolder") . "camaras.js" ?>" type="text/javascript"></script>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_user.php"; ?>

        <div class="contenedor_principal">
            <?php require_once $config->get("viewsFolder") . "template/msg.php" ?>
            <div id="registrar_camara"><span class="icon-plus"></spam></div>
            <br><br><br><center><div class="titulo_section"><h2>CAMARAS</h2></div></center>
            <div id="camaras_parqueadero">
                <?php
                     if (count($camaras) > 0) {
                         require_once $config->get("viewsFolder") . "private/admin/camara/partialCamaras.php";
                     } else {
                         echo "<center><h3>No existen camaras IP registradas...</h3></center>";
                     }
                ?>
            </div>
        </div>
        <?php
             require_once $config->get("viewsFolder") . "template/footer.php";
             require_once $config->get("viewsFolder") . "private/admin/camara/formCamara.php";
             require_once $config->get("viewsFolder") . "private/admin/camara/updateCamara.php";
             require_once $config->get("viewsFolder") . "private/admin/camara/camara.php";
        ?>
    </body>
</html>
