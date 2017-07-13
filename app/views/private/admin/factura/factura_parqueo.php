<div class="background_rgba ver_factura oculto">

    <div id="rec_factura">

        <div id="factura">
            <div><span class="icon-cross" id="exit-factura"></span></div>
            <div id="header_factura">
                <div class="nom_parqueadero"></div>
                <div class="logo_factura"><img  src="<?php echo "{$config->get("assetsFolder")}template/logo_factura.png" ?>"/></div>
            </div>
            <div id="body_factura">
                <div class="datos_column">
                    <span id="nit_parqueadero"></span><br>
                    <span id="dir_parqueadero"></span><br>
                    <span id="tel_parqueadero"></span><br>
                    Regimen Simplificado
                </div>
                <div class="datos_factura">
                    <label>Factura de Venta No. <span id="no_factura">1</span></label><br>
                    <label>Fecha: <?php echo date("d/m/Y") ?></label>
                    <label>Hora: <?php echo date("H:i:s") ?></label><br>
                    <label>Vendedor: <span id="vendedor_factura"></span></label>
                </div>
                <div class="datos_vehiculo">
                    <table>
                        <tr>
                            <td>C.C</td>
                            <td><span id="cliente_identificacion"></span></td>
                        </tr>
                        <tr>
                            <td>Nombre:</td>
                            <td><span id="cliente_nombre"></span></td>
                        </tr>
                        <tr>
                            <td>Vehiculo:</td>
                            <td><span id="tipo_vehiculo"></span></td>
                        </tr>
                        <tr>
                            <td>Placa:</td>
                            <td><span id="placa_vehiculo"></td>
                        </tr>
                        <tr>
                            <td>Fecha Entrada:</td>
                            <td><span id="fecha_entrada"></td>
                        </tr>
                        <tr>
                            <td>Fecha Salida:</td>
                            <td><span id="fecha_salida"></span></td>
                        </tr>
                        <tr>
                            <td>Tiempo Parqueo:</td>
                            <td><span id="tiempo_parqueo"></td>
                        </tr>
                    </table>
                </div>
                <div  class="datos_pago">
                    <table>
                        <tr>
                            <td>TOTAL:</td>
                            <td><span id="total_pagar"></span></td>
                        </tr>
                        <tr>
                            <td id="con-rec"></td>
                            <td><span id="contrato-recibido"></span></td>
                        </tr>
                        <tr>
                            <td id="cam-dias"></td>
                            <td><span id="cambio-dias"></span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div id="footer_factura">
                <div class="datos_software">
                    Software: IPPARKING<br>
                    ipparking.ticscomercio.edu.co
                </div>
            </div>
        </div>
    </div>
</div>