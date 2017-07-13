<?php
     $config = Config::singleton();
     $user = PrivateAppAuthController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Marcas | IPParking </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
        <link href="<?php echo $config->get("cssFolder") . "tarifas.css" ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $config->get("cssFolder") . "camaras.css" ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo $config->get("jsFolder") . "marcas.js" ?>" type="text/javascript"></script>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_user.php"; ?>

        <div class="contenedor_principal">
            <?php require_once $config->get("viewsFolder") . "template/msg.php" ?>
            <div id="registrar_marca"><span class="icon-plus"></spam></div>

            <br><br><br><center><div class="titulo_section"><h2>MARCAS</h2></div></center>
            <div class="header_tarifas">
                <div class="image imagen">
                    <div class="imagenAside automoviles"></div>
                </div>
                <div class="image imagen">
                    <div class="imagenAside motocicletas"></div>
                </div>
                <div class="image imagen">
                    <div class="imagenAside bicicletas"></div>
                </div>
            </div>
            <div class="body_tarifas">
                <div class="partial_tarifas partial_marcas">
                    <table id="tipo_tarifas">
                        <center><h2>AUTOMOVILES</h2></center>
                        <?php
                             foreach ($marcas->data as $m) {
                                 $m instanceof Marca;
                                 if ($m->getTiv_id() === 1) {
                                     ?>
                                     <tr>
                                         <td><img src="<?php echo "{$config->get("assetsFolder")}marcas/{$m->getMar_avatar()}" ?>"/></td>
                                         <td><?php echo $m->getMar_nombre() ?></td>
                                         <?php
                                         $id = base64_encode($m->getMar_id());
                                         ?>
                                         <td><div class="editar_Marca" data-id="<?php echo $m->getMar_id(); ?>"><span class="icon-pencil icon-crud"></span></div></td>
                                         <td><a href="?action=eliminarMarca&token=<?php echo $id ?>"><span class="icon-cancel-circle icon-crud"></span></a></td>
                                     </tr>
                                     <?php
                                 }
                             }
                        ?>
                    </table>
                </div>
                <div class="partial_tarifas partial_marcas">
                    <table id="tipo_tarifas">
                        <center><h2>MOTOCICLETAS</h2></center>
                        <?php
                             foreach ($marcas->data as $m) {
                                 $m instanceof Marca;
                                 if ($m->getTiv_id() === 2) {
                                     ?>
                                     <tr>
                                         <td><img src="<?php echo "{$config->get("assetsFolder")}marcas/{$m->getMar_avatar()}" ?>"/></td>
                                         <td><?php echo $m->getMar_nombre() ?></td>
                                         <?php
                                         $id = base64_encode($m->getMar_id());
                                         ?>
                                         <td><div class="editar_Marca" data-id="<?php echo $m->getMar_id(); ?>"><span class="icon-pencil icon-crud"></span></div></td>
                                         <td><a href="?action=eliminarMarca&token=<?php echo $id ?>"><span class="icon-cancel-circle icon-crud"></span></a></td>
                                     </tr>
                                     <?php
                                 }
                             }
                        ?>
                    </table>
                </div>
                <div class="partial_tarifas partial_marcas">
                    <table id="tipo_tarifas">
                        <center><h2>BICICLETAS</h2></center>
                        <?php
                             foreach ($marcas->data as $m) {
                                 $m instanceof Marca;
                                 if ($m->getTiv_id() === 3) {
                                     ?>
                                     <tr>
                                         <td><img src="<?php echo "{$config->get("assetsFolder")}marcas/{$m->getMar_avatar()}" ?>"/></td>
                                         <td><?php echo $m->getMar_nombre() ?></td>
                                         <?php
                                         $id = base64_encode($m->getMar_id());
                                         ?>
                                         <td><div class="editar_Marca" data-id="<?php echo $m->getMar_id(); ?>"><span class="icon-pencil icon-crud"></span></div></td>
                                         <td><a href="?action=eliminarMarca&token=<?php echo $id ?>"><span class="icon-cancel-circle icon-crud"></span></a></td>
                                     </tr>
                                     <?php
                                 }
                             }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <?php
             require_once $config->get("viewsFolder") . "template/footer.php";
             require_once $config->get("viewsFolder") . "private/gerente/formMarca.php";
             require_once $config->get("viewsFolder") . "private/gerente/updateMarca.php";
        ?>
    </body>
</html>