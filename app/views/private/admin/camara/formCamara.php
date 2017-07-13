<div class="background_rgba registrar_camaras oculto">
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
                    <h3 class="titulo_Col">REGISTRAR CAMARA</h3>
                    <form id="form_insert_camara" action="?action=insertCamara" method="POST">
                        <table>
                            <tr>
                                <td><label>Nombre: </label></td>
                                <td><input type="text" name="cam_nombre" id="cam_nombre"/></td>
                            </tr>
                            <tr>
                                <td><label>IP: </label></td>
                                <td><input type="text" name="cam_ip" id="cam_ip"/></td>
                            </tr>
                            <tr>
                                <td><label>Puerto:</label></td>
                                <td><input type="text" name="cam_puerto" id="cam_puerto"/></td>
                            </tr>
                            <tr>
                                <td><label>Usuario:</label></td>
                                <td><input type="text" name="cam_usuario" id="cam_usuario"/></td>
                            </tr>
                            <tr>
                                <td><label>Contraseña:</label></td>
                                <td><input type="password" name="cam_password" id="cam_password"/></td>
                            </tr>
                        </table>
                        <br>
                        <p>Nota: Si la cámara IP que desea registrar no tiene usuario y contraseña <br> dejar los campos en blanco</p>
                    </form>
                </div>
            </div>
            <div class="modal_footer">
                <div class="button_modal registrar" id="insert_camara">REGISTRAR</div>
            </div>
        </div>
    </div>
</div>
