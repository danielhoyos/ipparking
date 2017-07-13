<?php
     $config = Config::singleton();
     $user = PrivateAppAuthController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Ventas </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
        <link href="<?php echo $config->get("cssFolder") . "estaciones.css" ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $config->get("cssFolder") . "parqueo.css" ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $config->get("cssFolder") . "factura.css" ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $config->get("cssFolder") . "venta.css" ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo $config->get("jsFolder") . "estaciones.js" ?>" type="text/javascript"></script>
        <script src="<?php echo $config->get("jsFolder") . "parqueo.js" ?>" type="text/javascript"></script>
        <script src="<?php echo $config->get("jsFolder") . "ventas.js" ?>" type="text/javascript"></script>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_user.php"; ?>

        <div class="contenedor_principal">
            <?php require_once $config->get("viewsFolder") . "template/msg.php" ?>
            <br><br><br><center><div class="titulo_section"><h2>FACTURAS</h2></div></center>
            <div id="informacion_facturas">
                <div id="titulo_parquadero">PARQUEADERO</div>
                <div id="titulo_paqueo">PARQUEO</div>
                <div id="titulo_cliente">CLIENTE</div>
                <div id="titulo_pdf">PDF</div>
            </div>
            <div class="col_facturas">
                <?php
                     foreach ($facturas as $f) {
                         $f instanceof Factura;
                         ?>
                         <div class="info_factura">
                             <div class="parqueadero_factura">
                                 <table>
                                     <tr>
                                         <td><b>Factura No. </b></td>
                                         <td><?php echo $f->getFac_codigo(); ?></td>
                                     </tr>
                                     <tr>
                                         <td><b>Fecha Venta: </b></td>
                                         <td><?php echo $f->getFac_fecha_venta(); ?></td>
                                     </tr>
                                     <tr>
                                         <td><b>Hora Venta: </b></td>
                                         <td><?php echo $f->getFac_hora_venta(); ?></td>
                                     </tr>
                                 </table>
                             </div>
                             <div class="parqueo_factura">
                                 <table>
                                     <tr>
                                         <td><b>Fecha Inicio: </b></td>
                                         <td><?php echo "{$f->pao_fecha_inicio} {$f->pao_hora_inicio}"; ?></td>
                                     </tr>
                                     <tr>
                                         <td><b>Fecha Fin: </b></td>
                                         <td><?php echo "{$f->pao_fecha_fin} {$f->pao_hora_fin}"; ?></td>
                                     </tr>
                                     <tr>
                                         <td><b>Valor Total: </b></td>
                                         <td>$ <?php echo $f->getFac_valor_total(); ?></td>
                                     </tr>
                                 </table>
                             </div>
                             <div class="cliente_factura">
                                 <table>
                                     <tr>
                                         <td><b>Identificación: </b></td>
                                         <td><?php echo "{$f->per_identificacion}"; ?></td>
                                     </tr>
                                     <tr>
                                         <td><b>Nombre: </b></td>
                                         <td><?php echo "{$f->per_nombre} {$f->per_apellido}"; ?></td>
                                     </tr>
                                     <tr>
                                         <td><b>Placa Vehiculo: </b></td>
                                         <td><?php echo $f->veh_placa; ?></td>
                                     </tr>
                                 </table>
                             </div>
                             <div class="min_factura">
                                 <button class="ver_factura" data-pdf="<?php echo "{$config->get("facturasHttp")}{$f->getFac_pdf()}"?>">VER</button>
                             </div>
                         </div>
                         <?php
                     }
                ?>
            </div>
        </div>

        <?php
             require_once $config->get("viewsFolder") . "template/footer.php";
        ?>
    </body>
</html>