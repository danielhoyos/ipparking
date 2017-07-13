<?php
     $p = $parqueadero;
     $p instanceof Parqueadero;
?>

<div class="background_rgba get_parqueadero">
    <div id="parqueadero_ver">


        <div class="ver_parqueadero" id="registrar_parqueadero">
            <div class="modal_header">
                <div class="exit exit_parquedero"><spam class="icon-cross"></spam></div>
            </div>
            <div class="modal_body">
                <div class="col col1">
                    <div class="icon_Col">
                        <img src="<?php echo $config->get("assetsFolder") . "template/icon_datos_persona.png"; ?>"/>
                    </div> 
                    <h3 class="titulo_Col">DATOS DEL PARQUEADERO</h3
                    <form id="form_registro_parqueadero" action="?controller=Parqueadero&action=registrar" method="POST">
                        <table>
                            <tr>
                                <td><label>Nit:</label></td>
                                <td><input type="text" name="par_nit" id="par_nit" value="<?php echo $p->getPar_nit(); ?>" disabled/></td>
                            </tr>
                            <tr>
                                <td><label>Nombre:</label></td>
                                <td><input type="text" name="par_nombre" id="par_nombre" value="<?php echo $p->getPar_nombre(); ?>" disabled/></td>
                            </tr>
                            <tr>
                                <td><label>Dirección:</label></td>
                                <td><input type="text" name="par_direccion" id="par_direccion" value="<?php echo $p->getPar_direccion(); ?>" disabled/></td>
                            </tr>
                            <tr>
                                <td><label>Teléfono (s):</label></td>
                                <td><input type="text" name="par_telefono" id="par_telefono" value="<?php echo $p->getPar_telefono(); ?>" disabled/></td>
                            </tr>
                        </table><br>
                        <div class="icon_Col">
                            <img src="<?php echo $config->get("assetsFolder") . "template/icon_datos_persona.png"; ?>"/>
                        </div>
                        <h3 class="titulo_Col">DATOS DEL CONTRATO</h3>
                        <table>
                            <tr>
                                <td><label>Tiempo Contrato: </label></td>
                                <td>
                                    <select name="tcp_id" id="tcp_id" disabled>
                                        <?php
                                             foreach ($tcp as $tcp) {
                                                 $tcp instanceof TiempoContratoParqueadero;
                                                 $selected = "";

                                                 if ($tcp->getTcp_id() === $p->tcp_id) {
                                                     $selected = "selected";
                                                 }
                                                 echo "<option {$selected} value='{$tcp->getTcp_id()}'>{$tcp->getTcp_cantidad_meses()} meses</option>";
                                             }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Inicio Contrato:</label></td>
                                <td><input type="date" name="pcp_fecha_inicio_periodo" id="pcp_fecha_inicio_periodo" value="<?php echo $p->pcp_fecha_inicio_periodo; ?>" disabled/></td>
                            </tr>
                            <tr>
                                <td><label>Fin Contrato:</label></td>
                                <td><input type="date" name="pcp_fecha_fin_periodo" id="pcp_fecha_fin_periodo" value="<?php echo $p->pcp_fecha_fin_periodo; ?>" disabled/></td>
                            </tr>
                        </table>
                </div>

                <div class="col col2">
                    <div class="icon_Col">
                        <img src="<?php echo $config->get("assetsFolder") . "template/icon_datos_cuenta.png"; ?>"/>
                    </div>
                    <h3 class="titulo_Col">DATOS DEL ADMINISTRADOR</h3>
                    <table>
                        <tr>
                            <td><label>Tipo de Identificación:</label></td>
                            <td>
                                <select name="tip_id" id="tip_id" disabled>
                                    <?php
                                         foreach ($tipos as $ti) {
                                             $selected = "";
                                             $ti instanceof TipoIdentificacion;
                                             if ($ti->getTip_id() === $p->tip_id) {
                                                 $selected = "selected";
                                             }
                                             echo "<option {$selected} value='{$ti->getTip_id()}'>{$ti->getTip_nombre()}</option>";
                                         }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Identificación:</label></td>
                            <td><input type="text" name="per_identificacion" id="per_identificacion" value="<?php echo $p->per_identificacion; ?>" disabled/></td>
                        </tr>
                        <tr>
                            <td><label>Nombre (s):</label></td>
                            <td><input type="text" name="per_nombre" id="per_nombre" value="<?php echo $p->per_nombre; ?>" disabled/></td>
                        </tr>
                        <tr>
                            <td><label>Apellido (s):</label></td>
                            <td><input type="text" name="per_apellido" id="per_apellido" value="<?php echo $p->per_apellido; ?>"disabled/></td>
                        </tr>
                        <tr>
                            <td><label>Dirección:</label></td>
                            <td><input type="text" name="per_direccion" id="per_direccion" value="<?php echo $p->per_identificacion; ?>" disabled/></td>
                        </tr>
                        <tr>
                            <td><label>Teléfono (s):</label></td>
                            <td><input type="text" name="per_telefono" id="per_telefono" value="<?php echo $p->per_telefono; ?>" disabled/></td>
                        </tr>
                        <tr>
                            <td><label>E-mail:</label></td>
                            <td><input type="email" name="per_correo" id="per_correo" value="<?php echo $p->per_correo; ?>" disabled/><br>
                                <div id="loading_correo" class="loading oculto" ></div>
                                <label id="correo_ajax"></label></td>
                        </tr>
                    </table><br><br>
                    <input type="hidden" name="usu_id" id="usu_id" value="<?php echo $p->usu_id ?>"/>

                    <center>
                        <label>Estado:</label>

                        <?php
                             $selectedActivo = $p->usu_estado === "activo" ? "selected" : "";
                             $selectedInactivo = $p->usu_estado === "inactivo" ? "selected" : "";
                             $selectedPendiente = $p->usu_estado === "pendiente" ? "selected" : "";

                             $disabledPendiente = $p->usu_estado === "pendiente" ? "disabled" : "";
                        ?>

                        <select name="usu_estado" id="usu_estado" disabled>
                            <option <?php echo $selectedActivo ?> value="activo" <?php echo $disabledPendiente ?>>Activo</option>
                            <option <?php echo $selectedInactivo ?> value="inactivo">Inactivo</option>
                            <option <?php echo $selectedPendiente ?> value="pendiente" disabled>Pendiente</option>
                        </select>

                    </center>
                    </form>
                </div>
                <div class="valor_compra_ver"><span class="icon-monetization_on"></span><label><?php echo $p->pcp_valor; ?></label></div>
            </div>
            <div class="modal_footer">
                <div class='editar' id="editar_parqueadero"><label>EDITAR</label></div>
                <div class='editar oculto' id="cancelar_parqueadero"><label>CANCELAR</label></div>
                <div class='editar oculto' id="guardar_parqueadero"><label>GUARDAR</label></div>
            </div>
        </div>
