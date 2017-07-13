<?php

     class FacturaController implements IController {

         private $config;
         private $view;

         public function __construct() {
             $this->config = Config::singleton();
             $this->view = new View();
         }

         public function index() {
             require_once "{$this->config->get("entitiesFolder")}Factura.php";
             require_once "{$this->config->get("modelsFolder")}FacturaModel.php";

             if (PrivateAppAuthController::$auth) {
                 $user = PrivateAppAuthController::$auth;
             } else if (AppController::$auth) {
                 $user = AppController::$auth;
             }

             $factura = new stdClass();
             $facturaModel = new FacturaModel();
             $factura->cliente_id = $user->usu_id;
             $r = $facturaModel->facturasCliente($factura);

             $vars["facturas"] = $r;
             $this->view->show("private/cliente/facturas.php", $vars);
         }

         public function insertFactura() {
             if (PrivateAppAuthController::$auth) {
                 require_once "{$this->config->get("entitiesFolder")}Factura.php";
                 require_once "{$this->config->get("modelsFolder")}FacturaModel.php";
                 require_once "{$this->config->get("libsFolder")}mpdf/mpdf.php";

                 $factura = new Factura();
                 $facturasModel = new FacturaModel();
                 $cantidadFacturas = $facturasModel->cantidadFacturasParqueadero($_POST["par_id"]);
                 $no_factura = ($cantidadFacturas->data) + 1;
                 $nombrepdf = "fac-" . $no_factura . "-" . $_POST["par_id"] . "-" . $_POST["cliente"] . ".pdf";

                 $factura->setFac_codigo($no_factura);
                 $factura->setFac_fecha_venta(date("Y-m-d"));
                 $factura->setFac_hora_venta(date("H:i:s"));
                 $factura->setFac_valor_total($_POST["fac_valor"]);
                 $factura->setPao_id($_POST["pao_id"]);
                 $factura->setFac_pdf($nombrepdf);


                 $r = $facturasModel->insert($factura);

                 // GENERANDO LA FACTURA 
                 $css = file_get_contents("{$this->config->get("cssFolder")}factura.css");
                 $mpdf = new mPDF('utf-8', array(80, 150), "", "", 0, 0, 5, 5);

                 $mpdf->WriteHTML($css, 1);
                 $mpdf->WriteHTML($_POST["factura"], 2);
                 $mpdf->Output("{$this->config->get("facturasFolder")}{$nombrepdf}", 'F');

                 $r->factura = "{$this->config->get("facturasHttp")}{$nombrepdf}";
                 echo json_encode($r);
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }
     }