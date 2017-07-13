<?php
$config = Config::singleton();
$user = AppController::$auth;
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
            <?php require_once $config->get("viewsFolder") . "template/aside_nosotros.php"; ?>

            <section class="columna section">
                <span class="icon icon-accessibility"></span>
                <div class="titulo_section"><h3>RESPONSABILIDAD SOCIAL</h3></div>
                    <div class="linear contexto_section">
                        <p>
                            IPPARKING busca contribuir de manera activa al el mejoramiento social y economico del pais, 
                            para ello se necesita crear estrategias que permitan favorecer el crecimiento economico de 
                            los diferentes sectores vulnerables del pais, ofreciendo empleo a personas que busquen mejorar
                            su calidad de vida.
                        </p>
                    </div>
                    <div class="linear imagen_section logo_responsabilidad"></div>
                    <div class="mini_background mini_bicicleta"></div>

            </section>
        </div>

        <?php require_once $config->get("viewsFolder") . "template/footer.php"; ?>
    </body>
</html>