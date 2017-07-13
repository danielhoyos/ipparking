<div class="background_rgba insert_empleado oculto">
    <div id="empleado">
        <div class="form_empleado" id="registrar_empleado">
            <div class="modal_header">
                <div class="exit"><spam class="icon-cross"></spam></div>
            </div>
            <div class="modal_body">
                <div class="col col2">
                    <div class="icon_Col">
                        <img src="<?php echo $config->get("assetsFolder") . "template/icon_datos_cuenta.png"; ?>"/>
                    </div>
                    <h3 class="titulo_Col">DATOS DEL EMPLEADO</h3>
                    <form id="form_registro_empleado" action="?action=insert_empleado" method="POST">
                        <table>
                            <tr>
                                <td><label>Tipo de Identificación:</label></td>
                                <td>
                                    <select name="tip_id" id="tip_id">
                                        <?php
                                        foreach ($tipos as $ti) {
                                            $ti instanceof TipoIdentificacion;
                                            echo "<option value='{$ti->getTip_id()}'>{$ti->getTip_nombre()}</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Identificación:</label></td>
                                <td><input type="text" name="per_identificacion" id="per_identificacion"/></td>
                            </tr>
                            <tr>
                                <td><label>Nombre (s):</label></td>
                                <td><input type="text" name="per_nombre" id="per_nombre"/></td>
                            </tr>
                            <tr>
                                <td><label>Apellido (s):</label></td>
                                <td><input type="text" name="per_apellido" id="per_apellido"/></td>
                            </tr>
                            <tr>
                                <td><label>Dirección:</label></td>
                                <td><input type="text" name="per_direccion" id="per_direccion"/></td>
                            </tr>
                            <tr>
                                <td><label>Teléfono (s):</label></td>
                                <td><input type="text" name="per_telefono" id="per_telefono"/></td>
                            </tr>
                            <tr>
                                <td><label>E-mail:</label></td>
                                <td><input type="email" name="per_correo" id="per_correo"/><br>
                                    <div id="loading_correo" class="loading oculto" ></div>
                                    <label id="correo_ajax"></label></td>
                            </tr>
                            <tr>
                                <td><label>Usuario:</label></td>
                                <td><input type="text" name="usu_usuario" id="usu_usuario"/><br>
                                    <div id="loading_usuario" class="loading oculto" ></div>
                                    <label id="usuario_ajax"></label>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="modal_footer">
                <div class='button_modal registrar' id="insert_empleado"><label>REGISTRAR</label></div>
            </div>
        </div>
    </div>
</div>
