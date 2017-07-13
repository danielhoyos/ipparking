<?php
     $config = Config::singleton();
     $user = PrivateAppAuthController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Novedades | IPParking </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
        <link href="<?php echo $config->get("cssFolder") . "camaras.css" ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo $config->get("jsFolder") . "camaras.js" ?>" type="text/javascript"></script>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_user.php"; ?>

        <div class="contenedor_principal">
            <?php require_once $config->get("viewsFolder") . "template/msg.php" ?>
            <br><br><br><center><div class="titulo_section"><h2>NOVEDADES</h2></div></center>
        </div>
        
        <?php require_once $config->get("viewsFolder") . "template/footer.php"; ?>
    </body>
</html>