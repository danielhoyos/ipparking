<div class="background_rgba update_Marca oculto">
    <div id="camaras">
        <div class="form_camaras" id="registrar_camaras">
            <div class="modal_header">
                <div class="exit"><spam class="icon-cross"></spam></div>
            </div>
            <div class="modal_body">
                <div class="col col_parqueo">
                    <div class="icon_Col">
                        <img src="<?php echo $config->get("assetsFolder") . "marcas/"; ?>" id="mar_avatar_src"/>
                    </div>
                    <h3 class="titulo_Col">ACTUALIZAR MARCA</h3>
                    <form id="form_update_marca" action="?action=updateMarca" method="POST" enctype="multipart/form-data">
                        <table>
                            <input type="hidden" name="mar_id_update" id="mar_id_update"/>
                            <tr>
                                <td><label>Nombre: </label></td>
                                <td><input type="text" name="mar_nombre_update" id="mar_nombre_update"/></td>
                            </tr>
                            <tr>
                                <td><label>Tipo de Vehículo:</label></td>
                                <td><select name="tiv_id_update" id="tiv_id_update">
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
                <div class="button_modal registrar" id="update_marca">ACTUALIZAR</div>
            </div>
        </div>
    </div>
</div>
