<?php
$config = Config::singleton();
$user = AppController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Servicios - IPParking </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>

        <link rel="stylesheet" href="<?php echo $config->get("cssFolder"); ?>cliente.css" />
        <script src="<?php echo $config->get("jsFolder"); ?>contacto.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js"></script>

    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_cliente.php"; ?>

        <div class="contenedor_principal">
            <?php require_once $config->get("viewsFolder") . "template/aside_nosotros.php"; ?>

            <section class="columna section">
                <span class="icon icon-accessibility"></span>
                <div class="titulo_section"><h2>SERVICIOS</h2></div>
                <div class=" linear contexto_section">
                    <p>
                        IPParking busca mejorar cada vez un servicio de calidad, 
                        con la idea de satisfacer las diferentes necesidades del cliente, 
                        donde este se sienta satisfecho durante el prestamiento de los 
                        servicios que este adquiere durante el tiempo de uso del parqueadero.
                    </p>
                </div>
                <div class="linear imagen_section logo_servicios"></div>
                <div class="mini_background mini_carro"></div>

            </section>
        </div>

        <?php require_once $config->get("viewsFolder") . "template/footer.php"; ?>
    </body>
</html>