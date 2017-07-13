<div class="background_rgba registro_parqueo oculto">
    <div id="parqueo">
        <div class="form_parqueo" id="registrar_parqueo">

            <div class="modal_header">
                <div class="exit"><spam class="icon-cross"></spam></div>
            </div>
            <div class="modal_body">
                <div class="col col_parqueo">
                    <div class="icon_Col">
                        <img src="<?php echo $config->get("assetsFolder") . "template/icon_datos_cuenta.png"; ?>"/>
                    </div>
                    <h3 class="titulo_Col">REGISTRO DEL PARQUEO</h3>
                    <form id="form_registro_parqueo" action="?action=registro_parqueo" method="POST">
                        <input type="hidden" name="est_id" id="est_id"/>
                        <div class="placa_vehiculo">
                            <input type="text" name="veh_placa" id="veh_placa" class="input_placa" autocomplete="off" placeholder="ABC123" minlength="5" maxlength="6"/>
                        </div>
                        <div class="col_placa">
                            <table>
                                <input type="hidden" name="veh_id" id="veh_id"/>
                                <tr>
                                    <td><label>Color</label></td>
                                    <td>
                                        <select class="input_corto" name="veh_color" id="veh_color">
                                            <option value="blanco">Blanco</option>
                                            <option value="negro">Negro</option>
                                            <option value="rojo">Rojo</option>
                                            <option value="azul">Azul</option>
                                            <option value="gris">Gris</option>
                                            <option value="amarillo">Amarillo</option>
                                            <option value="verde">Verde</option>
                                            <option value="otro">Otro</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Marca</label></td>
                                    <td>
                                        <select class="input_corto" name="mar_id" id="mar_id">
                                            <?php
                                                 foreach ($marcas as $m) {
                                                     $m instanceof Marca;
                                                     echo "<option value='{$m->getMar_id()}'>{$m->getMar_nombre()}</option>";
                                                 }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Fecha Inicio:</label></td>
                                    <td><input class="input_corto" type="date" name="pao_fecha_inicio" id="pao_fecha_inicio" value="<?php echo date("Y-m-d") ?>" readonly/></td>
                                </tr>
                                <tr>
                                    <td><label>Hora Inicio:</label></td>
                                    <td><input class="input_corto" type="time" name="pao_hora_inicio" id="pao_hora_inicio" value="<?php echo date("H:i:s") ?>" readonly/></td>
                                </tr>
                            </table>
                        </div>

                        <div class="col_placa">
                            <table>
                                <input type="hidden" name="usu_id" id="usu_id"/>
                                <tr>
                                    <td><label>Identificación:</label></td>
                                    <td><input class="input_corto" type="text" name="per_identificacion" id="per_identificacion"/></td>
                                </tr>
                                <tr>
                                    <td><label>Nombre:</label></td>
                                    <td><input class="input_corto" type="text" name="per_nombre" id="per_nombre"/></td>
                                </tr>
                                <tr>
                                    <td><label>Apellido:</label></td>
                                    <td><input class="input_corto" type="text" name="per_apellido" id="per_apellido"/></td>
                                </tr>
                            </table>
                        </div>
                        <div id="accesorios_llaves" class="oculto">
                            <label>Llaves</label>
                            <input type="checkbox" name="llaves" id="llaves"/>

                            <div id="accesorios">
                                <div class="oculto" id="estacion_llave"></div>
                                <div class="image_llave oculto"></div>
                                <input type="hidden" name="est_id_llave" id="est_id_llave"/>
                            </div>
                        </div>

                        <div id="accesorios_cascos" class="oculto">
                            <label>Cascos</label>
                            <label>1</label>
                            <input type="checkbox" name="cascos1" id="cascos1"/>
                            <label>2</label>
                            <input type="checkbox" name="cascos2" id="cascos2"/>

                            <div id="accesorios">
                                <div class="oculto" id="estacion_casco1"></div>
                                <div class="image_casco  c1 oculto"></div>
                                <input type="hidden" name="est_id_casco1" id="est_id_casco1"/>
                                
                                <div class="oculto" id="estacion_casco2"></div>
                                <div class="image_casco c2 oculto"></div>
                                <input type="hidden" name="est_id_casco2" id="est_id_casco2"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal_footer">
                <div class="button_modal registrar" id="insert_parqueo">REGISTRAR</div>
            </div>
        </div>
    </div>
</div>
