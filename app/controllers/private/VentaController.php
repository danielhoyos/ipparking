<?php
     class VentaController implements IController {

         private $view;
         private $config;

         function __construct() {
             $this->view = new View();
             $this->config = Config::singleton();
         }

         public function index() {
             if (PrivateAppAuthController::$auth) {
                 require_once "{$this->config->get("entitiesFolder")}Factura.php";
                 require_once "{$this->config->get("modelsFolder")}FacturaModel.php";

                 $facturaModel = new FacturaModel();
                 $r = $facturaModel->get();
                 $vars["facturas"] = $r->data;

                 $this->view->show("private/admin/factura/ventas.php", $vars);
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }
     }