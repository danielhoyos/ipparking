<?php
$empl = $empleado;
$empl instanceof Usuario;
?>

<div class="background_rgba get_empleado">
    <div id="empleado_ver">
        <div class="ver_empleado" id="registrar_empleado">
            <div class="modal_header">
                <div class="exit"><spam class="icon-cross"></spam></div>
            </div>
            <div class="modal_body">
                <div class="col">
                    <div class="icon_Col">
                        <img src="<?php echo $config->get("assetsFolder") . "template/icon_datos_persona.png"; ?>"/>
                    </div> 
                    <h3 class="titulo_Col">DATOS DEL EMPLEADO</h3>
                    <form id="form_registro_empleado" action="?action=update_empleado" method="POST">
                        <table>
                            <tr>
                                <td><label>Tipo de Identificación:</label></td>
                                <td>
                                    <select name="tip_id" id="tip_id" disabled>
                                        <?php
                                        foreach ($tipos as $ti) {
                                            $ti instanceof TipoIdentificacion;

                                            if ($ti->getTip_id() === $empl->tip_id) {
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
                                <td><input type="text" name="per_identificacion" id="per_identificacion" value="<?php echo $empl->per_identificacion ?>" disabled /></td>
                            </tr>
                            <tr>
                                <td><label>Nombre (s):</label></td>
                                <td><input type="text" name="per_nombre" id="per_nombre" value="<?php echo $empl->per_nombre ?>" disabled/></td>
                            </tr>
                            <tr>
                                <td><label>Apellido (s):</label></td>
                                <td><input type="text" name="per_apellido" id="per_apellido" value="<?php echo $empl->per_apellido ?>" disabled/></td>
                            </tr>
                            <tr>
                                <td><label>Dirección:</label></td>
                                <td><input type="text" name="per_direccion" id="per_direccion"value="<?php echo $empl->per_direccion ?>" disabled/></td>
                            </tr>
                            <tr>
                                <td><label>Teléfono (s):</label></td>
                                <td><input type="text" name="per_telefono" id="per_telefono"value="<?php echo $empl->per_telefono ?>" disabled/></td>
                            </tr>
                            <tr>
                                <td><label>E-mail:</label></td>
                                <td><input type="email" name="per_correo" id="per_correo" value="<?php echo $empl->per_correo ?>" disabled/><br>
                            </tr>
                            <tr>
                                <td><label>Usuario:</label></td>
                                <td><input type="text" name="usu_usuario" id="usu_usuario" value="<?php echo $empl->getUsu_usuario() ?>" disabled/></td>
                            </tr>
                        </table>
                    </form>
                    <input type="hidden" name="usu_id" id="usu_id" value="<?php echo $empl->getUsu_id() ?>"/>

                    <center>
                        <label>Estado:</label>

                        <?php
                        $selectedActivo = $empl->getUsu_estado() === "activo" ? "selected" : "";
                        $selectedInactivo = $empl->getUsu_estado() === "inactivo" ? "selected" : "";
                        $selectedPendiente = $empl->getUsu_estado() === "pendiente" ? "selected" : "";

                        $disabledPendiente = $empl->getUsu_estado() === "pendiente" ? "disabled" : "";
                        ?>

                        <select name="usu_estado" id="usu_estado" disabled>
                            <option <?php echo $selectedActivo ?> value="activo" <?php echo $disabledPendiente ?>>Activo</option>
                            <option <?php echo $selectedInactivo ?> value="inactivo">Inactivo</option>
                            <option <?php echo $selectedPendiente ?> value="pendiente" disabled>Pendiente</option>
                        </select>

                    </center>
                    </form>
                </div>
            </div>
            <div class="modal_footer">
                <div class='registrar' id="editar_empleado"><label>EDITAR</label></div>
                <div class='registrar button_first oculto' id="cancelar_empleado"><label>CANCELAR</label></div>
                <div class='registrar button_second oculto' id="guardar_empleado"><label>GUARDAR</label></div>
            </div>
        </div>
    </div> 
</div>