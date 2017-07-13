<?php
$config = Config::singleton();
$user = PrivateAppAuthController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Estaciones </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
        <link href="<?php echo $config->get("cssFolder") . "estaciones.css" ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $config->get("cssFolder") . "parqueo.css" ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $config->get("cssFolder") . "factura.css" ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo $config->get("jsFolder") . "estaciones.js" ?>" type="text/javascript"></script>
        <script src="<?php echo $config->get("jsFolder") . "parqueo.js" ?>" type="text/javascript"></script>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_user.php"; ?>

        <div class="contenedor_principal">
            <?php require_once $config->get("viewsFolder") . "template/msg.php" ?>

            <aside class="columna aside">
                <div class="menu_aside">
                    <div class="imagenAside logo_estaciones"></div>
                    <div class="titulo_aside"><h2>ESTACIONES</h2></div>
                    <ul class="sub_menu">
                        <li><spam class='icon-directions_car'></spam><a href='?action=mision'>TODAS</a></li>
                        <li><spam class='icon-checkmark'></spam><a href='?action=mision'>DISPONIBLES</a></li>
                        <li><spam class='icon-cross'></spam><a href='?action=mision'>NO DISPONIBLES</a></li>
                    </ul>
                </div>

                <div id="registrar_estaciones">
                    <h4>REGISTRAR ESTACIÓN</h4>
                    <form id="form_insert_estacion" action="?action=insert_estacion" method="POST">
                        <input type="text" name="est_codigo" id="est_codigo" placeholder="Codigo de Estación"/>
                        <select name="est_tipo" id="est_tipo">
                            <option value="">Tipo de Estación</option>
                            <option value="vehiculo">Vehículo</option>
                            <option value="llave">Llave / Alarma</option>
                            <option value="casco">Casco</option>
                        </select>
                        <select name="tiv_id" id="tiv_id" class="oculto">
                            <option value="">Tipo de Vehículo</option>
                            <?php
                            foreach ($tipos_vehiculos as $tv) {
                                $tv instanceof TipoVehiculo;
                                echo "<option value='{$tv->getTiv_id()}'>{$tv->getTiv_nombre()}</option>";
                            }
                            ?>
                        </select>
                        
                        <select name="cam_id" id="cam_id" class="oculto">
                            <option value="">Camara</option>
                            <?php
                            foreach ($camaras as $cam) {
                                $cam instanceof Camara;
                                echo "<option value='{$cam->getCam_id()}'>{$cam->getCam_nombre()}</option>";
                            }
                            ?>
                        </select>
                        <a id="registrar_estacion"><span class="icon-plus"></spam>  REGISTRAR</a>
                    </form>
                </div>
            </aside>


            <section class="columna section">
                <span class="icon icon-directions_car"></span>
                <div class="titulo_section"><h2>ESTACIONES</h2></div>

                <?php require_once $config->get("viewsFolder") . "private/admin/estaciones/partial_estaciones.php"; ?>
            </section>
        </div>

        <?php
        require_once $config->get("viewsFolder") . "template/footer.php";

        require_once $config->get("viewsFolder") . "private/admin/estaciones/registro_parqueo.php";
        require_once $config->get("viewsFolder") . "private/admin/estaciones/datos_parqueo.php";
        require_once $config->get("viewsFolder") . "private/admin/factura/factura_parqueo.php";
        ?>
    </body>
</html>