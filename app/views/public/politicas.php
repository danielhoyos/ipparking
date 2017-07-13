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
                <div class="titulo_section"><h3>POLITICAS DE CALIDAD</h3></div>
                <div class="linear contexto_section">
                    <p>
                        Brindar soluciones en los diferentes espacios de parqueo, 
                        gestionando los diferentes procesos de este, ofreciendo 
                        un alto capital humano, innovando con la nueva tecnologia 
                        y asegurando tranquilidad y confianza a los clientes.
                    </p>
                </div>
                <div class="linear imagen_section logo_politicas"></div>
                <div class="mini_background mini_moto"></div>

            </section>
        </div>

        <?php require_once $config->get("viewsFolder") . "template/footer.php"; ?>
    </body>
</html>