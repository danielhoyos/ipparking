<?php
     $config = Config::singleton();
     $user = PrivateAppAuthController::$auth;
     
     $avatarParqueadero= "";

     if ($parqueadero->par_avatar !== null) {
         $path = $config->get("assetsFolder") . "parqueadero/" . $parqueadero->par_avatar;
         $url = get_headers($path);
         $string = $url[0];
         if (strpos($string, "200")) {
             $avatarParqueadero = $path;
         }
     } else {
         $avatarParqueadero = $config->get("assetsFolder") . "parqueadero/parqueadero.jpg";
     }
?>

<html lang="es">
    <head>
        <title>.: Parqueadero | IPParking </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
        <link rel="stylesheet" href="<?php echo $config->get("cssFolder") . "tarifas.css" ?>" type="text/css"/>
        <script src="<?php echo $config->get("jsFolder") . "parqueadero.js" ?>" type="text/javascript"></script>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_user.php"; ?>

        <div class="contenedor_principal">
            <img id="portada" src="<?php echo $avatarParqueadero ?>"/>

            <form id="editarAvatarParqueadero" action="?action=update_par_avatar" enctype="multipart/form-data" method="POST">
                <div class="upload_img upload_portada"><input type="file" name="par_avatar" id="par_avatar" /></div>
            </form>
            <?php require_once $config->get("viewsFolder") . "template/msg.php"; ?>

            <div class="col col1">
                <div class="icon_Col">
                    <img src="<?php echo $config->get("assetsFolder") . "template/icon_datos_persona.png"; ?>"/>
                </div>
                <h3 class="titulo_Col">DATOS DEL PARQUEADERO</h3>
                <form id="form_update_parqueadero" action="?action=update_parqueadero" method="POST">
                    <table>
                        <input type="hidden" name="par_id" id="par_id" value="<?php echo $parqueadero->getPar_Id() ?>"/>
                        <tr>
                            <td><label>Nit:</label></td>
                            <td><input type="text" name="par_nit" id="par_nit" value="<?php echo $parqueadero->par_nit; ?>" disabled/></td>
                        </tr>
                        <tr>
                            <td><label>Nombre:</label></td>
                            <td><input type="text" name="par_nombre" id="par_nombre" value="<?php echo $parqueadero->par_nombre ?>" disabled/></td>
                        </tr>
                        <tr>
                            <td><label>Dirección:</label></td>
                            <td><input type="text" name="par_direccion" id="par_direccion" value="<?php echo $parqueadero->par_direccion ?>" disabled/></td>
                        </tr>
                        <tr>
                            <td><label>Teléfono (s):</label></td>
                            <td><input type="text" name="par_telefono" id="par_telefono" value="<?php echo $parqueadero->par_telefono ?>" disabled/></td>
                        </tr>
                        <tr>
                            <td><label>Fecha Registro:</label></td>
                            <td><input type="date_time" name="per_fecha" id="per_fecha" value="<?php echo $parqueadero->par_fecha_registro ?>" disabled/></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td><label>Capacidad Automoviles:</label></td>
                            <td><div class="horas_tarifas"><span><center><?php echo $capacidadAutomoviles; ?></center></span></div></td>
                        </tr>
                        <tr>
                            <td><label>Capacidad Motos:</label></td>
                            <td><div class="horas_tarifas"><span><center><?php echo $capacidadMotocicletas; ?></center></span></div></td>
                        </tr>
                        <tr>
                            <td><label>Capacidad Bicicletas:</label></td>
                            <td><div class="horas_tarifas"><span><center><?php echo $capacidadBicicletas; ?></center></span></div></td>
                        </tr>
                        <tr>
                            <td><label>Capacitad Llaves:</label></td>
                            <td><div class="horas_tarifas"><span><center><?php echo $capacidadLlaves; ?></center></span></div></td>
                        </tr>
                        <tr>
                            <td><label>Capacitad Cascos:</label></td>
                            <td><div class="horas_tarifas"><span><center><?php echo $capacidadCascos; ?></center></span></div></td>
                        </tr>
                        <tr>
                            <td><br><label>Total Estaciones:</label></td>
                            <td><br><div class="horas_tarifas"><span><center><?php echo $cantidadEstaciones; ?></center></span></div></td>
                        </tr>
                    </table>
            </div>

            <div class="col col2">
                <div class="icon_Col">
                    <img src="<?php echo $config->get("assetsFolder") . "template/icon_datos_cuenta.png"; ?>"/>
                </div>
                <h3 class="titulo_Col">DATOS DE CONTRATO</h3><br>
                <table>
                    <tr>
                        <td><label>Fecha Pago:</label></td>
                        <td><input type="date_time" name="pcp_fecha_pago" id="pcp_fecha_pago" value="<?php echo $parqueadero->pcp_fecha_pago ?>" disabled/></td>
                    </tr>
                    <tr>
                        <td><label>Tiempo Contrato:</label></td>
                        <td>
                            <select name="tcp_id" id="tcp_id" disabled>
                                <?php
                                     foreach ($tcp as $tcp) {
                                         $tcp instanceof TiempoContratoParqueadero;
                                         $selected = "";

                                         if ($tcp->getTcp_id() === $parqueadero->tcp_id) {
                                             $selected = "selected";
                                         }
                                         echo "<option {$selected} value='{$tcp->getTcp_id()}'>{$tcp->getTcp_cantidad_meses()} meses</option>";
                                     }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Inicio Periodo:</label></td>
                        <td><input type="date" name="pcp_fecha_inicio_periodo" id="pcp_fecha_inicio_periodo" value="<?php echo $parqueadero->pcp_fecha_inicio_periodo ?>" disabled/></td>
                    </tr>
                    <tr>
                        <td><label>Fin Periodo:</label></td>
                        <td><input type="date" name="pcp_fecha_fin_periodo" id="pcp_fecha_fin_periodo" value="<?php echo $parqueadero->pcp_fecha_fin_periodo ?>" disabled/></td>
                    </tr>
                    <tr>
                        <td><label>Descripción:</label></td>
                        <td><textarea disabled><?php echo $parqueadero->con_descripcion; ?></textarea></td>
                    </tr>
                </table>
                <div class="valor_contrato"><span class="icon-monetization_on"></span><label><?php echo $parqueadero->pcp_valor; ?></label></div>
                </form>
                <div id="botones_crud_parqueadero">
                    <button class="button"  id="button_editar_parqueadero">Editar</button>
                    <button class="button button_oculto" id="botton_guardar_parqueadero">Guardar</button>
                    <button class="button button_oculto" id="botton_cancelar_parqueadero">Cancelar</button>
                </div>
            </div>
        </div>

        <?php require_once $config->get("viewsFolder") . "template/footer.php";
        ?>
    </body>
</html>