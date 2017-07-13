<div class="background_rgba insert_parqueadero oculto">
    <div id="parqueadero">
        <div class="form_parqueadero" id="registrar_parqueadero">
            <div class="modal_header">
                <div class="exit"><spam class="icon-cross"></spam></div>
            </div>
            <div class="modal_body">
                <div class="col col1">
                    <div class="icon_Col">
                        <img src="<?php echo $config->get("assetsFolder") . "template/icon_datos_persona.png"; ?>"/>
                    </div>
                    <h3 class="titulo_Col">DATOS DEL PARQUEADERO</h3>
                    <form id="form_registro_parqueadero" action="?action=registrar_parqueadero" method="POST">
                        <table>
                            <tr>
                                <td><label>Nit:</label></td>
                                <td><input type="text" name="par_nit" id="par_nit"/></td>
                            </tr>
                            <tr>
                                <td><label>Nombre:</label></td>
                                <td><input type="text" name="par_nombre" id="par_nombre"/></td>
                            </tr>
                            <tr>
                                <td><label>Dirección:</label></td>
                                <td><input type="text" name="par_direccion" id="par_direccion"/></td>
                            </tr>
                            <tr>
                                <td><label>Teléfono (s):</label></td>
                                <td><input type="text" name="par_telefono" id="par_telefono"/></td>
                            </tr>
                        </table><br><br>
                        <div class="icon_Col">
                            <img src="<?php echo $config->get("assetsFolder") . "template/icon_datos_persona.png"; ?>"/>
                        </div>
                        <h3 class="titulo_Col">DATOS DEL CONTRATO</h3>
                        <table>
                            <tr>
                                <td><label>Tiempo: </label></td>
                                <td>
                                    <select name="tcp_id" id="tcp_id">
                                        <?php
                                        foreach ($tcp as $tcp) {
                                            $tcp instanceof TiempoContratoParqueadero;

                                            echo "<option value='{$tcp->getTcp_id()}'>{$tcp->getTcp_cantidad_meses()} meses</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Inicio:</label></td>
                                <td><input type="date" name="pcp_fecha_inicio_periodo" id="pcp_fecha_inicio_periodo"/></td>
                            </tr>
                            <tr>
                                <td><label>Valor: </label><span class="icon-monetization_on"></span></td>
                                <td><input type="number"/></td>
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
                                <div id="loading_usuario" class="loading oculto" ></div><label id="usuario_ajax"></label></td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
            <div class="modal_footer">
                <div class='button_modal registrar' id="insert_parqueadero"><label>REGISTRAR</label></div>
            </div>
        </div>
    </div>
</div>