<div id="header">
    <header id="cab_principal">
        <div id="logo_principal">IPPARKING</div>

        <?php
        if (PrivateAppAuthController::$auth) {
            ?>
            <nav class="nav_principal">
                <ul>
                    <?php
                    if (PrivateAppAuthController::$auth->usu_estado === "activo") {
                        ?>
                        <li>
                            <?php
                            $min_perfil = "<span class='icon-home'></span>";
                            if (PrivateAppAuthController::$auth->usu_avatar !== null) {
                                $path = $config->get("assetsFolder") . "avatar/" . PrivateAppAuthController::$auth->usu_avatar;
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
                            <a href="?action=index">Home</a></li>
                        <?php
                    }
                    ?>

                    <li><span class="icon-exit"></span><a id="logout" href="?action=logout">Salir</a>
                </ul>
            </nav>
            <?php
        }
        ?>

    </header> 
</div>