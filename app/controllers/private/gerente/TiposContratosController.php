<?php

     class TiposContratoController implements IController {

         private $config;
         private $view;

         function __construct() {
             $this->config = Config::singleton();
             $this->view = new View();
         }

         public function index() {
             if (PrivateAppAuthController::$auth) {
                 require_once "{$this->config->get("entitiesFolder")}TiempoContratoParqueadero.php";
                 require_once "{$this->config->get("modelsFolder")}TiempoContratoParqueaderoModel.php";
                 
                 $tiempoContratoParqueaderoModel = new TiempoContratoParqueaderoModel();
                 
                 $vars["tiemposContratos"] = $tiempoContratoParqueaderoModel->get();
                 $vars["contratos"] = $tiempoContratoParqueaderoModel->contratosParqueaderos();
                 $this->view->show("private/gerente/tiposContratos.php", $vars);
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }
     }     