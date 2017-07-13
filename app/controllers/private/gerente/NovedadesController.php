<?php

     class NovedadController implements IController {

         private $view;

         function __construct() {
             $config = Config::singleton();
             $this->view  = new View();
         }

         public function index() {
             $this->view->show("private/gerente/novedad.php");
         }
     }