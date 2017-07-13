<?php
$config = Config::singleton();
$user = AppController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Misión - IPParking </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>

        <link rel="stylesheet" href="<?php echo $config->get("cssFolder"); ?>cliente.css" />

    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_cliente.php"; ?>

        <div class="contenedor_principal">
            <?php require_once $config->get("viewsFolder") . "template/aside_nosotros.php"; ?>
            
            <section class="columna section">
                <span class="icon icon-accessibility"></span>
                <div class="titulo_section"><h2>MISIÓN</h2></div>
                <div class=" linear contexto_section">
                    <p>IPPARKING es un software que brinda el registro y control 
                        de todos los servicios que son prestados por este, contribuyendo 
                        al buen manejo de la disponibilidad que se le pueda brindar a los 
                        diferentes usuarios que hagan uso de este,asumiendo el cuidado de 
                        los vehiculos que son dejados a disposicion de la empresa, 
                        contrayendo la responsabilidad absoluta de los mismos, 
                        de sus partes y/o accesorios.
                    </p>
                </div>
                <div class="linear imagen_section logo_mision"></div>
                <div class="mini_background mini_carro"></div>
            </section>
        </div>

        <?php require_once $config->get("viewsFolder") . "template/footer.php"; ?>
    </body>
</html>