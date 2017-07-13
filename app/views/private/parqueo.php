<?php
     $config = Config::singleton();
     $user = PrivateAppAuthController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Parqueo | IPParking </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
        <link href="<?php echo $config->get("cssFolder") . "camaras.css" ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $config->get("cssFolder") . "parqueo.css" ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $config->get("cssFolder") . "estaciones.css" ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo $config->get("jsFolder") . "camaras.js" ?>" type="text/javascript"></script>
        <script src="<?php echo $config->get("jsFolder") . "parqueoActivo.js" ?>" type="text/javascript"></script>
        <script src="<?php echo $config->get("jsFolder") . "parqueo.js" ?>" type="text/javascript"></script>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_user.php"; ?>

        <div class="contenedor_principal">
            <?php require_once $config->get("viewsFolder") . "template/msg.php" ?>
            <br><br><br><center><div class="titulo_section"><h2>MI PARQUEO</h2></div></center>
            <?php
                 if ($msg !== NULL) {
                     echo "<center><h3>{$msg}</h3></center>";
                 } else {
                     $parqueo = $datos->data;
                     $parqueo instanceof Parqueo;

                     if ($datos->camara->status === 200) {
                         $camaras = $datos->camara->data;
                         $camaras instanceof Camara;
                         $urlCam = "http://{$camaras->getCam_ip()}:{$camaras->getCam_puerto()}/video";
                         $nombreCam = $camaras->getCam_nombre();
                     } else {
                         $urlCam = "";
                         $nombreCam = "No existe camara registrada para esta estación";
                     }
                     ?>
                     <center>
                         <div class="cam">
                             <span class="datos_camara" ><?php echo $nombreCam; ?></span>
                             <img class="expandir_cam"  data-url-cam="<?php echo $urlCam ?>" src="<?php echo $urlCam ?>"/>
                         </div>
                         <input type='hidden' name='pao_id' id='pao_id' value='<?php echo $parqueo->getPao_id() ?>'>
                         <div class="col">
                             <div class="cronometro">
                                 <div id="horas">00</div>
                                 <div class="divisor">:</div>
                                 <div id="minutos">00</div>
                                 <div id="segundos">00</div>  
                                 <div class="img_cronometro"></div>
                                 <div id="h">Horas</div>   
                                 <div id="m">Minutos</div>   
                             </div>

                             <table>
                                 <tr>
                                     <td><label>Fecha Inicio:</label></td>
                                     <td><input class="input_corto" type="date" name="pao_fecha_inicio_pao" id="pao_fecha_inicio_pao" readonly value="<?php echo $parqueo->getPao_fecha_inicio() ?>"/></td>
                                 </tr>
                                 <tr>
                                     <td><label>Hora Inicio:</label></td>
                                     <td><input class="input_corto" type="time" name="pao_hora_inicio_pao" id="pao_hora_inicio_pao" readonly value="<?php echo $parqueo->getPao_hora_inicio() ?>"/></td>
                                 </tr>
                             </table>

                             <div id="datos_pago">
                                 <div id="icon_valor">
                                     <span class="icon-coin-dollar"></span>
                                 </div>
                                 <div id="valor_pago">0</div>
                             </div>
                         </div>
                     </center>
                     <?php
                 }
            ?>
        </div>

        <?php require_once $config->get("viewsFolder") . "template/footer.php"; ?>
    </body>
</html>