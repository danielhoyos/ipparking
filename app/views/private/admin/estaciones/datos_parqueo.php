<div class="background_rgba datos_parqueo oculto">
    <div id="parqueo">
        <div class="form_parqueo" id="registrar_parqueo">
            <div class="modal_header">
                <div class="exit exit_parqueo"><span class="icon-cross"></span></div>
            </div>
            <div class="modal_body">
                <div class="col col_parqueo">
                    <div class="icon_Col">
                        <img src="<?php echo $config->get("assetsFolder") . "template/icon_datos_cuenta.png"; ?>"/>
                    </div>
                    <h3 class="titulo_Col">DATOS DEL PARQUEO</h3>
                    <form id="form_finalizar_parqueo" action="?action=finalizar_parqueo" method="POST">
                        <input type="hidden" name="pao_id" id="pao_id"/>
                        <input type="hidden" name="estacion_id" id="estacion_id"/>
                        <div class="placa_vehiculo parqueo">
                            <input type="text" name="veh_placa_pao" id="veh_placa_pao" class="input_placa" autocomplete="off" placeholder="ABC123" minlength="5" maxlength="6"/>
                        </div>

                        <div class="cronometro">
                            <div id="horas">00</div>
                            <div class="divisor">:</div>
                            <div id="minutos">00</div>
                            <div id="segundos">00</div>  
                            <div class="img_cronometro"></div>
                            <div id="h">Horas</div>   
                            <div id="m">Minutos</div>   
                        </div>

                        <div class="col_placa">
                            <table>
                                <input type="hidden" name="veh_id" id="veh_id"/>
                                <tr>
                                    <td><label>Color</label></td>
                                    <td>
                                        <select class="input_corto" name="veh_color_pao" id="veh_color_pao" disabled>
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
                                        <select class="input_corto" name="mar_id_pao" id="mar_id_pao" disabled>
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
                                    <td><input class="input_corto" type="date" name="pao_fecha_inicio_pao" id="pao_fecha_inicio_pao" readonly/></td>
                                </tr>
                                <tr>
                                    <td><label>Hora Inicio:</label></td>
                                    <td><input class="input_corto" type="time" name="pao_hora_inicio_pao" id="pao_hora_inicio_pao" readonly/></td>
                                </tr>
                            </table>
                        </div>

                        <div class="col_placa">
                            <table>
                                <input type="hidden" name="per_id_pao" id="per_id_pao"/>
                                <tr>
                                    <td><label>Identificación:</label></td>
                                    <td><input class="input_corto" type="text" name="per_identificacion_pao" id="per_identificacion_pao" readonly/></td>
                                </tr>
                                <tr>
                                    <td><label>Nombre:</label></td>
                                    <td><input class="input_corto" type="text" name="per_nombre_pao" id="per_nombre_pao" readonly/></td>
                                </tr>
                                <tr>
                                    <td><label>Apellido:</label></td>
                                    <td><input class="input_corto" type="text" name="per_apellido_pao" id="per_apellido_pao" readonly/></td>
                                </tr>
                            </table>
                            <div id="accesorios_llaves">
                                <div id="accesorios">
                                    <div id="estacion_llave" class="oculto estacion_llave_codigo"></div>
                                    <div class="image_llave oculto"></div>
                                    <input type="hidden" name="est_id_llave_dato" id="est_id_llave_dato"/>
                                </div>
                            </div>

                            <div id="accesorios_cascos">
                                <div id="accesorios">
                                    <div id="estacion_casco1" class="oculto estacion_casco1_codigo"></div>
                                    <div class="image_casco  c1 oculto"></div>
                                    <input type="hidden" name="est_id_casco1" id="est_id_casco1_dato"/>

                                    <div  id="estacion_casco2" class="oculto estacion_casco2_codigo"></div>
                                    <div class="image_casco c2 oculto"></div>
                                    <input type="hidden" name="est_id_casco2" id="est_id_casco2_dato"/>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div id="datos_pago">
                        <div id="icon_valor">
                            <span class="icon-coin-dollar"></span>
                        </div>
                        <div id="valor_pago">0</div>
                    </div>
                    <div id="opc_pago">
                        <table>
                            <tr>
                                <td>Pago: </td>
                                <td>
                                    <select id="tipo_pago" name="tipo_pago">
                                        <option value="efectivo">Efectivo</option>
                                        <option value="contrato">Contrato</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Valor Recibido:</td>
                                <td><input type="number" name="valor-contrato" id="valor-contrato"/></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <div class="modal_footer">
                <input type="checkbox" name="imprimir" id="imprimir"/>
                <label id="imprimir_label">¿Desea imprimir ticket?</label> 
                <div class="button_modal registrar" id="finalizar_parqueo">FINALIZAR</div>
            </div>
        </div>
    </div>
</div>
