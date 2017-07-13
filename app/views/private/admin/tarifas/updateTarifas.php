<div class="background_rgba editar_tarifas oculto">
    <div id="tarifas">
        <div class="form_tarifas" id="editar_tarifas">
            <div class="modal_header">
                <div class="exit"><spam class="icon-cross"></spam></div>
            </div>
            <div class="modal_body">
                <div class="col col_parqueo">
                    <div class="icon_Col">
                        <img src="<?php echo $config->get("assetsFolder") . "template/icon_datos_cuenta.png"; ?>"/>
                    </div>
                    <h3 class="titulo_Col">EDITANDO TARIFA</h3>
                    <form id="form_update_tarifa" action="?action=update_tarifa" method="POST">
                        <table>
                            <input type="hidden" name="tar_id" id="tar_id"/>
                            <tr>
                                <td><label>Valor Minuto: </label></td>
                                <td><input type="number" name="tar_valor_minuto" id="tar_valor_minuto"/></td>
                            </tr>
                            <tr>
                                <td><label>Valor Hora: </label></td>
                                <td><input type="number" name="tar_valor_hora" id="tar_valor_hora"/></td>
                            </tr>
                            <tr>
                                <td><label>Hora Minima:</label></td>
                                <td><input type="number" name="tar_hora_minima" id="tar_hora_minima"/></td>
                            </tr>
                            <tr>
                                <td><label>Valor Minima:</label></td>
                                <td><input type="number" name="tar_valor_minima" id="tar_valor_minima"/></td>
                            </tr>
                            <tr>
                                <td><label>Hora Máxima:</label></td>
                                <td><input type="number" name="tar_hora_maxima" id="tar_hora_maxima"/></td>
                            </tr>
                            <tr>
                                <td><label>Valor Máxima:</label></td>
                                <td><input type="number" name="tar_valor_maxima" id="tar_valor_maxima"/></td>
                            </tr>
                            <tr>
                                <td><label>Valor Día:</label></td>
                                <td><input type="number" name="tar_valor_dia" id="tar_valor_dia"/></td>
                            </tr>
                            <tr>
                                <td><label>Valor Quincena:</label></td>
                                <td><input type="number" name="tar_valor_quincena" id="tar_valor_quincena"/></td>
                            </tr>
                            <tr>
                                <td><label>Valor Mes:</label></td>
                                <td><input type="number" name="tar_valor_mes" id="tar_valor_mes"/></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="modal_footer">
                <div class="button_modal registrar" id="update_tarifa">GUARDAR</div>
            </div>
        </div>
    </div>
</div>
