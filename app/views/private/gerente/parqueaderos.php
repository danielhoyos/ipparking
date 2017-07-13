<?php
$config = Config::singleton();
$user = PrivateAppAuthController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Parqueaderos </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
        <link href="<?php echo $config->get("cssFolder") . "parqueadero.css" ?>" type="text/css" rel="stylesheet"/>
        <script src="<?php echo $config->get("jsFolder") . "parqueadero.js" ?>" type="text/javascript"></script>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_user.php"; ?>

        <div class="contenedor_principal">
            <?php require_once $config->get("viewsFolder") . "template/msg.php" ?>

            <aside class="columna aside">
                <div class="menu_aside">
                    <div class="imagenAside logo_parqueadero"></div>
                    <div class="titulo_aside"><h2>PARQUEADEROS</h2></div>
                    <ul class="sub_menu">
                        <li><spam class='icon-directions_car'></spam><a href='?action=mision'>REGISTRADOS</a></li>
                        <li><spam class='icon-checkmark'></spam><a href='?action=mision'>ACTIVOS</a></li>
                        <li><spam class='icon-cross'></spam><a href='?action=mision'>INACTIVOS</a></li>
                    </ul>
                    <a class="button_registrar" id="registrar_parqueadero"><span class="icon-plus"></spam>  REGISTRAR</a>
                </div>
            </aside>


            <section class="columna section">
                <span class="icon icon-directions_car"></span>
                <div class="titulo_section"><h2>PARQUEADEROS</h2></div>

                <?php require_once $config->get("viewsFolder") . "private/gerente/partial_parqueaderos.php"; ?>
            </section>
        </div>

        <?php
        require_once $config->get("viewsFolder") . "template/footer.php";

        require_once $config->get("viewsFolder") . "private/gerente/form_parqueadero.php";
        ?>

        <div id='get_parqueadero'>

        </div>
    </body>
</html>