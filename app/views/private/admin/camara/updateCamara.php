<div class="background_rgba editar_camaras oculto">
    <div id="camaras">
        <div class="form_camaras" id="editar_camaras">
            <div class="modal_header">
                <div class="exit"><spam class="icon-cross"></spam></div>
            </div>
            <div class="modal_body">
                <div class="col col_parqueo">
                    <div class="icon_Col">
                        <img src="<?php echo $config->get("assetsFolder") . "template/icon_datos_cuenta.png"; ?>"/>
                    </div>
                    <h3 class="titulo_Col">ACTUALIZAR CAMARA</h3>
                    <form id="form_update_camara" action="?action=updateCamara" method="POST">
                        <table>
                            <input type="hidden" name="update_cam_id" id="update_cam_id"/>
                            <tr>
                                <td><label>Nombre: </label></td>
                                <td><input type="text" name="update_cam_nombre" id="update_cam_nombre"/></td>
                            </tr>
                            <tr>
                                <td><label>IP: </label></td>
                                <td><input type="text" name="update_cam_ip" id="update_cam_ip"/></td>
                            </tr>
                            <tr>
                                <td><label>Puerto:</label></td>
                                <td><input type="text" name="update_cam_puerto" id="update_cam_puerto"/></td>
                            </tr>
                            <tr>
                                <td><label>Usuario:</label></td>
                                <td><input type="text" name="update_cam_usuario" id="update_cam_usuario"/></td>
                            </tr>
                            <tr>
                                <td><label>Contraseña:</label></td>
                                <td><input type="password" name="update_cam_password" id="update_cam_password"/></td>
                            </tr>
                        </table>
                        <br>
                        <p>Nota: Si la cámara IP que desea registrar no tiene usuario y contraseña <br> dejar los campos en blanco</p>
                    </form>
                </div>
            </div>
            <div class="modal_footer">
                <div class="button_modal registrar" id="update_camara">ACTUALIZAR</div>
            </div>
        </div>
    </div>
</div>
