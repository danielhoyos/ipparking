<div id="header">
    <header id="cab_principal">
        <div id="logo_principal">IPPARKING</div>

        <nav class="nav_principal">
            <ul>
                <li><span class="icon-home"></span><a href="<?php echo $config->get("rootHTTP"); ?>"> Inicio</a></li>
                <li><span class="icon-phone"></span><a href="<?php echo "{$config->get("rootHTTP")}contacto/"; ?>">Contacto</a></li>
                <li><span class="icon-user-tie"></span><a href="<?php echo "{$config->get("rootHTTP")}nosotros/mision/"; ?>"> Nosotros</a></li>
                <li><span class="icon-directions_car"></span><a href="?action=parqueaderos"> Parqueaderos</a></li>

                <?php
                     if (!AppController::$auth) {
                         ?>
                         <li><span class="icon-lock"></span><a href="#" id="optLogin">Ingresar</a>
                             <div class='ingresar'>
                                 <form method='POST' action='?controller=Auth&action=validarCliente' id="form_login_cliente">
                                     <br>
                                     <h2>INICIAR SESIÓN</h2>
                                     <div class="icono_login"></div>
                                     <div class="input_login usuLogin"><span class="icon-user"></span><input type='text' placeholder='Usuario' name='usu_usuario' id='usu_usuario'/></div>
                                     <div class="input_login passLogin"><span class="icon-unlocked"></span><input type='password' placeholder='Password' name='usu_password' id='usu_password'/></div>
                                     <input type='submit' value='INGRESAR' class="button button_login_cliente" name="button_login" id="button_login"/><br>
                                     <a class='recuperar' href='#'>¿Olvidaste tu <br> contraseña?</a>
                                 </form> 
                             </div>
                         </li>
                         <?php
                     } else {
                         if ($user->usu_estado !== "inactivo" ) {
                             ?>
                             <li>
                                 <?php
                                 $min_perfil = "<span class='icon-home'></span>";
                                 if ($user->usu_avatar !== null) {
                                     $path = $config->get("assetsFolder") . "avatar/" . $user->usu_avatar;
                                     $url = get_headers($path);
                                     $string = $url[0];
                                     if (strpos($string, "200")) {
                                         echo "<img class='min_perfil' src='{$path}'/>";
                                     } else {
                                         echo $min_perfil;
                                     }
                                 } else {
                                     echo $min_perfil;
                                 }
                                 ?>
                                 <a href="?action=home"><?php echo $user->per_nombre?></a></li>
                             <?php
                         }
                         ?>
                         <li><span class="icon-exit"></span><a id="logout" href="?controller=Auth&action=logout">Salir</a>
                                 <?php
                             }
                        ?>

            </ul>
        </nav>
    </header> 
</div>