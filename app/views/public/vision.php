<?php
$config = Config::singleton();
$user = AppController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Visión - IPParking </title>
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
                <div class="titulo_section"><h2>VISIÓN</h2></div>
                <div class=" linear contexto_section">
                    <p>
                        El Sofware permitira el replazo de la forma tradicional de 
                        administracion anteriormente,siendo asi un sistema mas agil 
                        y eficaz en el control de los servicios prestados a los clientes, 
                        este tambien permitira la obtencion de estadisticas accediendo al 
                        numero de servicios que presta el parqueadero ya sean ganancias, 
                        gastos entre otros.
                    </p>
                </div>
                <div class="linear imagen_section logo_vision"></div>
                <div class="mini_background mini_moto"></div>

            </section>
        </div>

        <?php require_once $config->get("viewsFolder") . "template/footer.php"; ?>
    </body>
</html>