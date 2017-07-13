<?php
$config = Config::singleton();
?>

<html lang="es">
    <head>
        <title>.: Tarifas - IPParking </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
        <link rel="stylesheet" href="<?php echo $config->get("cssFolder") . "tarifas.css" ?>" type="text/css"/>
        <script src="<?php echo $config->get("jsFolder") . "tarifas.js" ?>" type="text/javascript"></script>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_user.php"; ?>

        <div class="contenedor_principal">
            <?php require_once "{$config->get("viewsFolder")}template/msg.php"; ?>
            <br><br><br><center><div class="titulo_section"><h2>TARIFAS</h2></div></center>
            <div class="header_tarifas">
                <div class="image">
                    <div class="imagenAside icon_tarifas"></div>
                </div>
                <div class="image">
                    <div class="imagenAside automoviles"></div>
                    <h3 class="titulo_Col">AUTOMOVILES</h3>
                </div>
                <div class="image">
                    <div class="imagenAside motocicletas"></div>
                    <h3 class="titulo_Col">MOTOCICLETAS</h3>
                </div>
                <div class="image">
                    <div class="imagenAside bicicletas"></div>
                    <h3 class="titulo_Col">BICICLETAS</h3>
                </div>
            </div>
            <div class="body_tarifas">
                <div class="partial_tarifas">
                    <table id="tipo_tarifas">
                        <tr>
                            <td><label>Valor Minuto: </label></td>
                        </tr>
                        <tr>
                            <td><label>Valor Hora: </label></td>
                        </tr>
                        <tr>
                            <td><label>Hora Minima Descuento:</label></td>
                        </tr>
                        <tr>
                            <td><label>Valor Minima Descuento:</label></td>
                        </tr>
                        <tr>
                            <td><label>Hora Máxima Descuento:</label></td>
                        </tr>
                        <tr>
                            <td><label>Valor Máxima Descuento:</label></td>
                        </tr>
                        <tr>
                            <td><label>Valor Dia:</label></td>
                        </tr>
                        <tr>
                            <td><label>Valor Quincena:</label></td>
                        </tr>
                        <tr>
                            <td><label>Valor Mes:</label></td>
                        </tr>
                    </table>
                </div>
                <?php
                foreach ($tarifas as $t) {
                    $t instanceof Tarifa;
                    ?>
                    <div class="partial_tarifas">
                        <table>
                            <tr>
                                <td><div class="precio_tarifas">$<span><?php echo $t->getTar_valor_minuto(); ?></span></div></td>
                            </tr>
                            <tr>

                                <td><div class="precio_tarifas">$<span><?php echo $t->getTar_valor_hora(); ?></span></div></td>
                            </tr>
                            <tr>

                                <td><div class="horas_tarifas"><span><?php echo $t->getTar_hora_minima(); ?></span></div></td>
                            </tr>
                            <tr>

                                <td><div class="precio_tarifas">$<span><?php echo $t->getTar_valor_minima(); ?></span></div></td>
                            </tr>
                            <tr>

                                <td><div class="horas_tarifas"><span><?php echo $t->getTar_hora_maxima(); ?></span></div></td>
                            </tr>
                            <tr>

                                <td><div class="precio_tarifas">$<span><?php echo $t->getTar_valor_maxima() ?></span></div></td>
                            </tr>
                            <tr>

                                <td><div class="precio_tarifas">$<span><?php echo $t->getTar_valor_dia(); ?></span></div></td>
                            </tr>
                            <tr>

                                <td><div class="precio_tarifas">$<span><?php echo $t->getTar_valor_quincena() ?></span></div></td>
                            </tr>
                            <tr>

                                <td><div class="precio_tarifas">$<span><?php echo $t->getTar_valor_mes(); ?></span></div></td>
                            </tr>
                        </table>
                        <div id="botones_crud_tarifas">
                            <button class="button button_editar_tarifa" id="<?php echo $t->getTar_id(); ?>">Editar</button>
                        </div>
                    </div> 
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
        require_once $config->get("viewsFolder") . "private/admin/tarifas/updateTarifas.php";
        require_once $config->get("viewsFolder") . "template/footer.php";
        ?>
    </body>
</html