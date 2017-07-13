<?php
     $config = Config::singleton();
     require_once $config->get("viewsFolder") . "private/datos_perfil.php";
?>

<html lang="es">
    <head>
        <title>.: <?php echo $user->per_nombre . " - IPParking" ?> </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>
    </head>
    <body>
        <?php
             if (PrivateAppAuthController::$auth) {
                 require_once $config->get("viewsFolder") . "template/header_user.php";
             } else if (AppController::$auth) {
                 require_once $config->get("viewsFolder") . "template/header_cliente.php";
             }
        ?>

        <div class="contenedor_principal">
            <?php require_once $config->get("viewsFolder") . "private/assets_perfil.php"; ?>

            <div class="col col1">
                <div class="icon_Col">
                    <img src="<?php echo $config->get("assetsFolder") . "template/icon_datos_persona.png"; ?>"/>
                </div>
                <h3 class="titulo_Col">DATOS PERSONALES</h3>
                <form id="form_update_user" action="?action=update_user" method="POST">
                    <table>

                        <tr>
                            <td><label>Tipo de Identificación:</label></td>
                            <td>
                                <select name="tip_id" id="tip_id" disabled="disabled">
                                    <?php
                                         foreach ($tipos as $ti) {
                                             $ti instanceof TipoIdentificacion;
                                             $class = "";

                                             if ($ti->getTip_id() == $user->tip_id) {
                                                 $class = "selected";
                                             }

                                             echo "<option {$class} value='{$ti->getTip_id()}'>{$ti->getTip_nombre()}</option>";
                                         }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Identificación:</label></td>
                            <td><input type="text" name="per_identificacion" id="per_identificacion" value="<?php echo $user->per_identificacion ?>" disabled="disabled"/></td>
                        </tr>
                        <tr>
                            <td><label>Nombre (s):</label></td>
                            <td><input type="text" name="per_nombre" id="per_nombre" value="<?php echo $user->per_nombre ?>" disabled="disabled"/></td>
                        </tr>
                        <tr>
                            <td><label>Apellido (s):</label></td>
                            <td><input type="text" name="per_apellido" id="per_apellido" value="<?php echo $user->per_apellido ?>" disabled="disabled"/></td>
                        </tr>
                        <tr>
                            <td><label>Fecha de Nacimiento:</label></td>
                            <td><input type="date" name="per_fecha_nacimiento" id="per_fecha_nacimiento" value="<?php echo $user->per_fecha_nacimiento ?>" disabled="disabled"/></td>
                        </tr>
                        <tr>
                            <td><label>Genero:</label></td>
                            <td>
                                <hgroup>
                                    <?php
                                         $selectM = $user->per_genero === 'M' ? "checked" : "";
                                         $selectF = $user->per_genero === 'F' ? "checked" : "";
                                    ?>
                                    <label>Masculino</label><input <?php echo $selectM ?> class="per_genero" type='radio' name='per_genero' id="per_genero" value='M' disabled/>
                                    <label>Femenino</label><input <?php echo $selectF ?> class="per_genero" type="radio" name='per_genero' id="per_genero" value='F' disabled/>
                                </hgroup>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Dirección:</label></td>
                            <td><input type="text" name="per_direccion" id="per_direccion" value="<?php echo $user->per_direccion ?>" disabled="disabled"/></td>
                        </tr>
                        <tr>
                            <td><label>Teléfono (s):</label></td>
                            <td><input type="text" name="per_telefono" id="per_telefono" value="<?php echo $user->per_telefono ?>" disabled="disabled"/></td>
                        </tr>
                        <tr>
                            <td><label>E-mail:</label></td>
                            <td><input type="email" name="per_correo" id="per_correo" value="<?php echo $user->per_correo ?>" disabled="disabled"/><br>
                                <div id="loading_correo" class="loading oculto" ></div>
                                <label id="correo_ajax"></label></td>
                        </tr>
                    </table>
            </div>

            <div class="col col2">
                <div class="icon_Col">
                    <img src="<?php echo $config->get("assetsFolder") . "template/icon_datos_cuenta.png"; ?>"/>
                </div>
                <h3 class="titulo_Col">DATOS DE CUENTA</h3><br>
                <table>
                    <tr>
                        <td><label>Usuario:</label></td>
                        <td><input type="text" name="usu_usuario" id="usu_usuario" value="<?php echo $user->usu_usuario ?>" disabled="disabled"/><br>
                            <div id="loading_usuario" class="loading oculto" ></div><label id="usuario_ajax"></label></td>
                    </tr>
                    <tr>
                        <td><label>Contraseña:</label></td>
                        <td><input type="password" name="usu_password" id="usu_password" value="<?php echo $user->usu_password ?>" disabled="disabled"/><a href="?action=form_editar_password" id="icon_editar_Password" title="Editar Contraseña"><span class="icon-pencil"></span></a>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Tipo de Usuario:</label></td>
                        <td><input type="text" name="usu_rol_id" id="usu_rol_id" value="<?php echo $rol ?>" disabled="disabled"/></td>
                    </tr>
                    <tr>
                        <td><label>Fecha de Registro:</label></td>
                        <td><input type="date" name="usu_fecha_registro" id="usu_fecha_registro" value="<?php echo $user->usu_fecha_registro ?>" disabled="disabled"/></td>
                    </tr>
                </table>
                </form>
                <div id="botones_crud">
                    <button class="button"  id="button_editar">Editar</button>
                    <button class="button button_oculto" id="botton_guardar">Guardar</button>
                    <button class="button button_oculto" id="botton_cancelar">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once $config->get("viewsFolder") . "template/footer.php";
?>
</body>
</html>