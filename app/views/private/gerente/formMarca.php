<div class="background_rgba registrar_Marca oculto">
    <div id="camaras">
        <div class="form_camaras" id="registrar_camaras">
            <div class="modal_header">
                <div class="exit"><spam class="icon-cross"></spam></div>
            </div>
            <div class="modal_body">
                <div class="col col_parqueo">
                    <div class="icon_Col">
                        <img src="<?php echo $config->get("assetsFolder") . "template/icon_datos_cuenta.png"; ?>"/>
                    </div>
                    <h3 class="titulo_Col">REGISTRAR MARCA</h3>
                    <form id="form_insert_marca" action="?action=insertMarca" method="POST" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><label>Imagén: </label></td>
                                <td><input type="file" name="mar_avatar" id="mar_avatar"/></td>
                            </tr>
                            <tr>
                                <td><label>Nombre: </label></td>
                                <td><input type="text" name="mar_nombre" id="mar_nombre"/></td>
                            </tr>
                            <tr>
                                <td><label>Tipo de Vehículo:</label></td>
                                <td><select name="tiv_id" id="tiv_id">
                                        <?php
                                             foreach ($tiposVehiculos->data as $tiv) {
                                                 $tiv instanceof TipoVehiculo;
                                                 ?>
                                                 <option value="<?php echo $tiv->getTiv_id(); ?>"><?php echo $tiv->getTiv_nombre(); ?></option>
                                                 <?php
                                             }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="modal_footer">
                <div class="button_modal registrar" id="insert_marca">REGISTRAR</div>
            </div>
        </div>
    </div>
</div>
