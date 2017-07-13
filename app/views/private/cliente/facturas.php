<?php
     $config = Config::singleton();
     $user = AppController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Parqueo | IPParking </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
        <link href="<?php echo $config->get("cssFolder") . "camaras.css" ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $config->get("cssFolder") . "parqueo.css" ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $config->get("cssFolder") . "estaciones.css" ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $config->get("cssFolder") . "contratos.css" ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo $config->get("jsFolder") . "camaras.js" ?>" type="text/javascript"></script>
        <script src="<?php echo $config->get("jsFolder") . "parqueoActivo.js" ?>" type="text/javascript"></script>
        <script src="<?php echo $config->get("jsFolder") . "parqueo.js" ?>" type="text/javascript"></script>

        <script src="<?php echo $config->get("jsFolder") . "ventas.js" ?>" type="text/javascript"></script>
        <link href="<?php echo $config->get("cssFolder") . "factura.css" ?>" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_cliente.php"; ?>

        <div class="contenedor_principal">
            <?php require_once $config->get("viewsFolder") . "template/msg.php" ?>
            <br><br><br><center><div class="titulo_section"><h2>MIS FACTURAS</h2></div></center>
            <table class="info_contrato facturas_cliente">
                <thead>
                    <tr>
                        <th>FACTURA No.</th>
                        <th>FECHA VENTA</th>
                        <th>INICIO PARQUEO</th>
                        <th>FIN PARQUEO</th>
                        <th>VALOR</th>
                        <th>PDF</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         foreach ($facturas->data as $f) {
                             $f instanceof Factura;
                             ?>
                             <tr>
                                 <td><?php echo $f->getFac_codigo() ?></td>
                                 <td><?php echo $f->getFac_fecha_venta() . " " . $f->getFac_hora_venta() ?></td>
                                 <td><?php echo $f->pao_fecha_inicio . " " . $f->pao_hora_inicio ?></td>
                                 <td><?php echo $f->pao_fecha_fin . " " . $f->pao_hora_fin ?></td>
                                 <td><span class="icon-coin-dollar"> </span> <?php echo $f->getFac_valor_total() ?></td>
                                 <td>
                                     <div class="min_factura">
                                         <button class="ver_factura button" data-pdf="<?php echo "{$config->get("facturasHttp")}{$f->getFac_pdf()}" ?>">VER</button>
                                     </div>
                                 </td>
                             </tr>
                             <?php
                         }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php require_once $config->get("viewsFolder") . "template/footer.php"; ?>
</body>
</html>