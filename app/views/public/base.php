<?php
$config = Config::singleton();
?>

<html lang="es">
    <head>
        <title>.: Base - IPParking </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>

        <link rel="stylesheet" href="<?php echo $config->get("cssFolder"); ?>cliente.css" />
        <script src="<?php echo $config->get("jsFolder"); ?>contacto.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js"></script>

    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_cliente.php"; ?>

        <div class="contenedor_principal">

        </div>

        <?php require_once $config->get("viewsFolder") . "template/footer.php"; ?>
    </body>
</html>