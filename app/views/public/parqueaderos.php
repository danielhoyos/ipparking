<?php
     $config = Config::singleton();
     $user = AppController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Parqueaderos | IPParking </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>

        <link rel="stylesheet" href="<?php echo "{$config->get("cssFolder")}parqueadero.css" ?>" type="text/css"/>
        <link rel="stylesheet" href="<?php echo $config->get("jsFolder"); ?>lib/owl.carousel.2.1.0/assets/owl.carousel.min.css" />
        <link rel="stylesheet" href="<?php echo $config->get("cssFolder"); ?>cliente.css" />
        <script src="<?php echo $config->get("jsFolder"); ?>cliente.js"></script>
        <script src="<?php echo $config->get("jsFolder"); ?>lib/owl.carousel.2.1.0/owl.carousel.min.js"></script>

    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_cliente.php"; ?>

        <div class="contenedor_principal">
            <?php require_once $config->get("viewsFolder") . "template/msg.php"; ?>
            <section class="section section_big">
                <span class="icon icon-directions_car"></span>
                <div class="titulo_section"><h2>PARQUEADEROS</h2></div>

                <?php
                     foreach ($parqueaderos as $p) {
                         $p instanceof Parqueadero;

                         foreach ($tarifas as $t) {
                             $t instanceof Tarifa;

                             if ($p->getPar_id() === $t->getPar_id()) {
                                 if ($t->getTiv_id() === 1) {
                                     $automovil = $t->getTar_valor_hora();
                                 } else if ($t->getTiv_id() === 2) {
                                     $motocicleta = $t->getTar_valor_hora();
                                 } else {
                                     $bicicleta = $t->getTar_valor_hora();
                                 }
                             }
                         }
                         ?>
                         <div class="min_parqueadero">
                             <parqueadero class="info_parqueadero">
                                 <h3><?php echo $p->getPar_nombre(); ?></h3>
                                 <h5>Dir. <?php echo $p->getPar_direccion(); ?></h5>
                                 <h5>Tel. <?php echo $p->getPar_telefono(); ?></h5>
                             </parqueadero>
                             <img class="image_parqueadero" src="<?php echo "{$config->get("assetsFolder")}parqueadero/{$p->getPar_avatar()}" ?>"/>
                             <info class="datos_parqueadero">
                                 <h5>TARIFAS</h5>
                                 <table>
                                     <tr>
                                         <td><span class="icon-directions_car"> Automoviles</span></td>
                                         <td>$ <?php echo $automovil ?></td>
                                     </tr>
                                     <tr>
                                         <td><span class="icon-directions_bike"> Motocicletas</span></td>
                                         <td>$ <?php echo $motocicleta ?></td>
                                     </tr>
                                     <tr>
                                         <td><span class="icon-directions_run"> Bicicletas</span></td>
                                         <td>$ <?php echo $bicicleta ?></td>
                                     </tr>
                                 </table>
                                 <h5>HORARIOS DE ATENCIÓN</h5>
                             </info>
                         </div>
                         <?php
                     }
                ?>
                <center>
                    <video src="<?php echo $config->get("assetsFolder") . "videos/ipparking.webm"; ?>" class="video_parqueadero_cliente" controls></video><br><br>
                    <a id="link" href="?action=contacto"><span class="icon-display"></span> Administra tu parqueadero con nuestro sistema</a>
                </center>
            </section>
        </div>

        <?php require_once $config->get("viewsFolder") . "template/footer.php"; ?>
    </body>
</html>