<aside class="columna aside">
    <div class="menu_aside">
        <div class="imagenAside logo_parqueadero"></div>
        <div class="titulo_aside"><h2>NOSOTROS</h2></div>
        <ul class="sub_menu">
            <?php
            if ($_REQUEST["action"] == "mision") {
                echo "<li class='activo'><spam class='icon-accessibility'></spam><a href='?action=mision'>MISIÓN</a></li>";
            } else {
                echo "<li><spam class='icon-accessibility'></spam><a href='?action=mision'>MISIÓN</a></li>";
            }

            if ($_REQUEST["action"] == "vision") {
                echo "<li class='activo'><spam class='icon-binoculars'></spam><a href='?action=vision'>VISIÓN</a></li>";
            } else {
                echo "<li ><spam class='icon-binoculars'></spam><a href='?action=vision'>VISIÓN</a></li>";
            }

            if ($_REQUEST["action"] == "seguridad") {
                echo "<li class='activo'><spam class='icon-key2'></spam><a>SEGURIDAD</a></li>";
            } else {
                echo "<li><spam class='icon-key2'></spam><a href='?action=seguridad'>SEGURIDAD</a></li>";
            }

            if ($_REQUEST["action"] == "servicios") {
                echo "<li class='activo'><spam class='icon-price-tag'></spam><a href='?action=servicios'>SERVICIOS</a></li>";
            } else {
                echo "<li><spam class='icon-price-tag'></spam><a href='?action=servicios'>SERVICIOS</a></li>";
            }

            if ($_REQUEST["action"] == "politicas") {
                echo "<li class='activo'><spam class='icon-clipboard'></spam><a href='?action=politicas'>POLITICAS DE CALIDAD</a></li>";
            } else {
                echo "<li><spam class='icon-clipboard'></spam><a href='?action=politicas'>POLITICAS DE CALIDAD</a></li>";
            }

            if ($_REQUEST["action"] == "responsabilidad") {
                echo "<li class='activo'><spam class='icon-pets'></spam><a href='?action=responsabilidad'>RESPONSA. SOCIAL</a></li>";
            } else {
                echo "<li><spam class='icon-pets'></spam><a href='?action=responsabilidad'>RESPONSA. SOCIAL</a></li>";
            }
            ?>
    </div>
</aside>