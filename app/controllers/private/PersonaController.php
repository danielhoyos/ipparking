<?php

     class PersonaController implements IController {

         private $view;

         function __construct() {
             $this->view = new View();
         }

         public function index() {
             
         }

         public function search_email() {
             if (PrivateAppAuthController::$auth || AppController::$auth) {
                 $config = Config::singleton();
                 require_once $config->get("entitiesFolder") . "Persona.php";
                 require_once $config->get("entitiesFolder") . "Usuario.php";
                 require_once $config->get("modelsFolder") . "PersonaModel.php";
                 require_once $config->get("modelsFolder") . "UsuarioModel.php";

                 $persona = new Persona();
                 $persona->setPer_correo($_POST["per_correo"]);

                 $personaModel = new PersonaModel();
                 $r = $personaModel->buscarCorreo($persona);
                 sleep(2);
                 print json_encode($r);
             }
         }

         public function search_persona() {
             if (PrivateAppAuthController::$auth) {
                 $config = Config::singleton();
                 require_once $config->get("entitiesFolder") . "Persona.php";
                 require_once $config->get("modelsFolder") . "PersonaModel.php";

                 $persona = new Persona();
                 $persona->setPer_identificacion($_POST["per_identificacion"]);

                 $personaModel = new PersonaModel();
                 $r = $personaModel->buscarIdentificacion($persona);
                 print json_encode($r);
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

     }   