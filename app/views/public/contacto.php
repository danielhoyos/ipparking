<?php
$config = Config::singleton();
$user = AppController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Contacto - IPParking </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>

        <link rel="stylesheet" href="<?php echo $config->get("cssFolder"); ?>cliente.css" />
        <script src="<?php echo $config->get("jsFolder"); ?>novedad.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=	
        AIzaSyCo4wpPWR8OUWi5WYquLiCFUBaxHraOuHk"></script>
    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_cliente.php"; ?>

        <div class="contenedor_principal">
            <?php require_once $config->get("viewsFolder") . "template/msg.php" ?>
            <aside class="columna aside">
                <div class="menu_aside">
                    <div class="imagenAside logo_contacto"></div>
                    <div class="titulo_aside"><h2>INFORMACIÓN<br>GENERAL</h2></div>
                    <p id="aside_descripcion">Si tienes algún comentario o sugerencia que hacernos, 
                        por favor diligencia el siguiente formulario o contáctanos 
                        por nuestras redes sociales: <br><br>

                    <div class="rs"> <span class="icon-whatsapp"></span><a href="#">+57 3508957850</a> </div><br>
                    <div class="rs"> <span class="icon-facebook"></span><a href="https://www.facebook.com/Ipparking-1740047362907366/?fref=ts" target="_blank">IPParking</a></div><br>
                    <div class="rs"> <span class="icon-youtube"></span><a href="https://www.youtube.com/channel/UCVFxa8dL4cm1LSqiUrZ2cCw" target="_blank">IP Parking</a></div><br>
                    <div class="rs"> <span class="icon-twitter"></span><a href="https://twitter.com/ippakingCol" target="_blank">@ipparkingcol</a></div>

                    </p>
                </div>
            </aside>
            <section class="columna section">
                <span class="icon icon-phone"></span>
                <div class="titulo_section"><h2>CONTÁCTO</h2></div>

                <div class="form_section" >
                    <form method="POST" action="?controller=Novedad&action=insertNovedad" id="form_novedad">
                        <input type='text' placeholder='Nombre(s)' name='nov_nombre' id='nov_nombre' class="linear"/>
                        <input type='text' placeholder='Apellido(s)' name='nov_apellido' id='nov_apellido' class="linear"/>
                        <input type='email' placeholder='E-mail' name='nov_correo' id='nov_correo' class="email"/>
                        <input type='text' placeholder='Teléfonos' name='nov_telefono' id='nov_telefono'/>

                        <select name="nov_asunto" id="nov_asunto" class="select">
                            <option disabled selected>Asunto</option>
                            <option value="felicitacion">Felicitación</option>
                            <option value="solicitud">Solicitud</option>
                            <option value="queja">Queja - Reclamo</option>
                            <option value="administracion">Administración de Parqueadero</option>
                        </select>
                        <textarea name="nov_mensaje" id="nov_mensaje" placeholder="Escribe aquí tus mensaje" maxlength="200"></textarea>

                        <p id="texto_mensaje"></p>
                    </form>
                    <button id="enviar_contacto" class="button_enviar">Enviar</button>

                </div>

                <div id="map"></div>
                <p id="map_descripcion">
                    IPPARKING ©<br> 
                    Popayán, Cauca 
                </p>
            </section>

        </div>

        <?php require_once $config->get("viewsFolder") . "template/footer.php"; ?>
    </body>
</html>