<?php
     $config = Config::singleton();
     $user = PrivateAppAuthController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Contratos | IPParking </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
        <link href="<?php echo $config->get("cssFolder") . "contratos.css" ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo $config->get("jsFolder") . "jquery.table2excel.js" ?>"></script>
        <script src="<?php echo $config->get("jsFolder") . "contratos.js" ?>"></script>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_user.php"; ?>

        <div class="contenedor_principal">
            <?php require_once $config->get("viewsFolder") . "template/msg.php" ?>
            <div class="columna aside">
                <div class="menu_aside">
                    <div class="titulo_aside"><h2>Tipos de Contratos</h2></div>
                    <?php
                         foreach ($tiemposContratos->data as $tc) {
                             $tc instanceof TiempoContratoParqueadero;
                             ?>
                             <div id="info_contrato">
                                 <table>
                                     <tr>
                                         <td><b>Tiempo: </b></td>
                                         <td><?php echo $tc->getTcp_cantidad_meses(); ?> Mes(es)</td>
                                     </tr>
                                     <tr>
                                         <td><b>Valor: </b></td>
                                         <?php
                                         $moneda = number_format($tc->getTcp_valor(), 0, ",", ".");
                                         ?>
                                         <td><span class="icon-coin-dollar"> </span><?php echo $moneda; ?></td>
                                     </tr>
                                 </table>
                             </div>
                             <?php
                         }
                    ?>
                </div>
            </div>

            <div class="columna section">
                <span class="icon icon-file-text2"></span>
                <div class="titulo_section"><h2>CONTRATOS</h2></div>
                <div id="tabla_contratos">
                    <form action="?action=generarXLS" method="POST" id="enviarTabla">
                        <div id="datosTabla">
                            <?php require_once "{$config->get("viewsFolder")}/private/gerente/partialContratos.php";?>
                        </div>
                        <input type="hidden" name="tabla" id="tabla"/>
                        <button class="button buttonExportar" id="exportarContratosXML">Exportar (XLS)</button>
                    </form>
                </div>
            </div>
        </div>
        <?php require_once $config->get("viewsFolder") . "template/footer.php"; ?>
    </body>
</html>