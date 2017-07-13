<?php

     class ContabilidadController implements IController {

         private $view;
         private $config;

         function __construct() {
             $this->view = new View();
             $this->config = Config::singleton();
         }

         public function index() {
             if (PrivateAppAuthController::$auth) {
                 $this->view->show("private/admin/contabilidad/contabilidad.php");
             }
         }
     }