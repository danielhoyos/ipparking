<?php
$config = Config::singleton();
$user = AppController::$auth;
?>

<html lang="es">
    <head>
        <title>.: Inicio - IPParking </title>
        <?php require_once $config->get("viewsFolder") . "template/meta_header.php"; ?>

        <link rel="stylesheet" href="<?php echo $config->get("jsFolder"); ?>lib/owl.carousel.2.1.0/assets/owl.carousel.min.css" />
        <link rel="stylesheet" href="<?php echo $config->get("cssFolder"); ?>cliente.css" />
        <script src="<?php echo $config->get("jsFolder"); ?>cliente.js"></script>
        <script src="<?php echo $config->get("jsFolder"); ?>lib/owl.carousel.2.1.0/owl.carousel.min.js"></script>

    </head>
    <body>
        <?php require_once $config->get("viewsFolder") . "template/header_cliente.php";  ?>

        <div class="contenedor_principal">
            <?php require_once $config->get("viewsFolder") . "template/msg.php"; ?>
            
            
            <!--******* SLIDE ********-->
            <div class="slide">
                <div class="owl-carousel owl-theme">
                    <div class="item slide1"></div>
                    <div class="item slide2"></div>
                    <div class="item slide3"></div>
                    <div class="item slide4"></div>
                </div>
            </div>
            <!--******* FIN SLIDE ********-->

            <!--************* SECTIONS *********-->
            <div id="col1">
                <span class="icon iconHome icon-newspaper"></span><br>
                <div class="titulo titulo_home"><h3>NOTICIAS</h3></div>
                <article class="article_principal">
                    <header><h3>Ajustes en la semaforización del sector de Campanario.</h3></header><br>
                    <p> 
                        La Secretaría de Tránsito y Transporte Municipal realizó un ajuste al habilitar 
                        los semáforos de Campanario con movimientos directos en forma simultánea sobre 
                        la vía principal el ascenso norte sur y sur norte...
                        <a href="http://www.popayan.gov.co/sectransito/sala-de-prensa/noticias/Ajustes%20en%20la%20semaforizaci%C3%B3n%20del%20sector%20de%20Campanario." target="_blank">ver más...</a>
                    </p>
                </article>
                <article class="article_principal">
                    <header><h3>Primera jornada de seguridad vial para motociclistas.</h3></header><br>
                    <p>
                        La Secretaría de Tránsito y Transporte Municipal realizo la primera jornada de seguridad
                        vial para motociclistas en INVIAS. Se dieron capacitaciones, pruebas de conducción, bonos 
                        de descuento para licencias de conducción...
                        <a href="http://www.popayan.gov.co/sectransito/sala-de-prensa/noticias/Primera%20jornada%20de%20seguridad%20vial%20para%20motociclistas." target="_blank">ver más...</a>
                    </p>
                </article>
                <article class="article_principal">
                    <header><h3>Secretaría de TT regula cargue y descargue en Popayán.</h3></header><br>
                    <p>
                        la Secretaría de Tránsito y Transporte de Popayán reguló los horarios de cargue y descargue 
                        de mercancías y a su vez elementos propios de la actividad comercial en la ciudad de Popayán.
                        <a href="http://www.popayan.gov.co/sectransito/sala-de-prensa/noticias/Secretar%C3%ADa%20de%20Tr%C3%A1nsito%20y%20Transporte%20regula%20cargue%20y%20descargue%20en%20Popay%C3%A1n" target="_blank">ver más...</a>
                    </p>
                </article>
            </div>

            <div id="col2">
                <div class="section_principal">
                    <span class="icon iconHome icon-directions_car"></span><br>
                    <div class="titulo titulo_home"><h3>MISIÓN</h3></div>
                    <p>IPPARKING es un software que brinda el registro y control de todos 
                        los servicios que son prestados por este, contribuyendo al buen 
                        manejo de la disponibilidad que se le pueda brindar a los diferentes usuarios
                        que hagan uso de este,asumiendo el cuidado de los vehiculos que son dejados 
                        a disposicion de la empresa, contrayendo 
                        la responsabilidad absoluta de los mismos, de sus partes y/o accesorios...
                        <a href="?action=mision">ver más...</a>
                    </p>
                </div>

                <div class="section_principal">
                    <span class="icon iconHome icon-man"></span><br>
                    <div class="titulo titulo_home"><h3>VISIÓN</h3></div>
                    <p>El Sofware de IPPARKING permitira el remplazo de la forma tradicional de administracion 
                        anteriormente, siendo asi un sistema mas agil y eficaz en el control de 
                        los servicios prestados a los clientes, este tambien permitira la obtencion
                        de estadisticas accediendo al numero de servicios que presta el parqueadero
                        ya sean ganancias, gastos entre otros...
                        <a href="?action=vision">ver más...</a>
                    </p>
                </div>
            </div>
            <div id="col3">
                <div class="section_principal">
                    <span class="icon iconHome icon-users"></span><br>
                    <div class="titulo titulo_home"><h3>REDES SOCIALES</h3></div><br>
                    <div class="rs"> <span class="icon-whatsapp"></span><a href="#">+57 3508957850</a> </div>
                    <div class="rs"> <span class="icon-facebook"></span><a href="https://www.facebook.com/Ipparking-1740047362907366/?fref=ts" target="_blank">IPParking</a></div>
                    <div class="rs"> <span class="icon-youtube"></span><a href="https://www.youtube.com/channel/UCVFxa8dL4cm1LSqiUrZ2cCw" target="_blank">IP Parking</a></div>
                    <div class="rs"> <span class="icon-twitter"></span><a href="https://twitter.com/ippakingCol" target="_blank">@ipparkingcol</a></div>
                </div>

                <div class="section_principal">
                    <span class="icon iconHome icon-mobile"></span><br>
                    <div class="titulo titulo_home"><h3>APP MOVIL</h3></div>
                    <div id="movil_principal"></div>
                    <button id="button_appmovil" type="button">DESCARGAR</button>
                </div>
            </div>
        </section>
        <!--************* FIN SECTIONS **********-->

    </div>

    <?php require_once $config->get("viewsFolder") . "template/footer.php"; ?>
</body>
</html>