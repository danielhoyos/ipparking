<?php

     class IndexController implements IController {

         private $view;
         private $usuarioController;
         private $personaController;
         private $authController;
         private $parqueaderoController;
         private $novedadesController;
         private $marcaController;
         private $contabilidadController;
         private $tiposContratosController;
         private $parqueoController;

         function __construct() {
             $config = Config::singleton();
             require_once $config->get("controllersFolder") . "private/UsuarioController.php";
             require_once $config->get("controllersFolder") . "private/PersonaController.php";
             require_once $config->get("controllersFolder") . "private/auth/AuthController.php";
             require_once $config->get("controllersFolder") . "private/ParqueaderoController.php";
             require_once $config->get("controllersFolder") . "private/gerente/NovedadesController.php";
             require_once $config->get("controllersFolder") . "private/ContabilidadController.php";
             require_once $config->get("controllersFolder") . "private/gerente/MarcaController.php";
             require_once $config->get("controllersFolder") . "private/gerente/TiposContratosController.php";
             require_once $config->get("controllersFolder") . "private/ParqueoController.php";

             $this->view = new View();
             $this->usuarioController = new UsuarioController();
             $this->personaController = new PersonaController();
             $this->authController = new AuthController();
             $this->parqueaderoController = new ParqueaderoController();
             $this->novedadController = new NovedadController();
             $this->contabilidadController = new ContabilidadController();
             $this->marcaController = new MarcaController();
             $this->tiposContratosController = new TiposContratoController();
             $this->parqueoController = new ParqueoController();
         }

         public function index() {
             if (PrivateAppAuthController::$auth) {
                 $this->view->show("private/gerente/index.php");
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function logout() {
             if (PrivateAppAuthController::$auth) {
                 $this->authController->logout();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function perfil() {
             if (PrivateAppAuthController::$auth) {
                 $config = Config::singleton();

                 require_once $config->get("entitiesFolder") . "TipoIdentificacion.php";
                 require_once $config->get("modelsFolder") . "TipoIdentificacionModel.php";
                 require_once $config->get("entitiesFolder") . "Rol.php";
                 require_once $config->get("modelsFolder") . "RolModel.php";

                 $tipModel = new TipoIdentificacionModel();
                 $t = $tipModel->get();

                 $rolModel = new RolModel();
                 $r = $rolModel->get();

                 $vars["tipos"] = $t->data;
                 $vars["roles"] = $r->data;
                 $this->view->show("private/perfil.php", $vars);
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function update_avatar() {
             if (PrivateAppAuthController::$auth) {
                 $this->usuarioController->update_avatar();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function update_portada() {
             if (PrivateAppAuthController::$auth) {
                 $this->usuarioController->update_portada();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function search_user() {
             if (PrivateAppAuthController::$auth) {
                 $this->usuarioController->search_user();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function search_email() {
             if (PrivateAppAuthController::$auth) {
                 $this->personaController->search_email();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function update_user() {
             if (PrivateAppAuthController::$auth) {
                 $this->usuarioController->update_user();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function registrar_parqueadero() {
             if (PrivateAppAuthController::$auth->rol_id === 1) {
                 $this->parqueaderoController->registrar();
             }
         }

         public function form_editar_password() {
             if (PrivateAppAuthController::$auth) {
                 $config = Config::singleton();

                 require_once $config->get("entitiesFolder") . "TipoIdentificacion.php";
                 require_once $config->get("modelsFolder") . "TipoIdentificacionModel.php";
                 require_once $config->get("entitiesFolder") . "Rol.php";
                 require_once $config->get("modelsFolder") . "RolModel.php";

                 $tipModel = new TipoIdentificacionModel();
                 $t = $tipModel->get();

                 $rolModel = new RolModel();
                 $r = $rolModel->get();

                 $vars["tipos"] = $t->data;
                 $vars["roles"] = $r->data;
                 $this->view->show("private/editar_password.php", $vars);
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function update_password() {
             if (PrivateAppAuthController::$auth) {
                 $this->usuarioController->update_password();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function parqueaderos() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 1) {
                     $this->parqueaderoController->index();
                 } else {
                     $vars["status"] = 501;
                     $vars["msg"] = "No tiene los permisos suficientes para realizar esta acción";
                     $this->view->show("private/gerente/index.php", $vars);
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function parqueaderoById() {
             if (PrivateAppAuthController::$auth) {
                 $this->parqueaderoController->parqueaderoById();
             }
         }

         public function update_estado() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 1) {
                     $this->usuarioController->update_estado();
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function marcas() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 1) {
                     $this->marcaController->index();
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function eliminarMarca() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 1) {
                     $this->marcaController->eliminarMarca();
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function datosMarca() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 1) {
                     $this->marcaController->datosMarca();
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function updateMarca() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 1) {
                     $this->marcaController->update();
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function novedades() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 1) {
                     $this->novedadController->index();
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function contabilidad() {
             if (PrivateAppAuthController::$auth) {
                 $this->contabilidadController->index();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function insertMarca() {
             if (PrivateAppAuthController::$auth) {
                 $this->marcaController->insert();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         /*          * *** TIPOS DE CONTRATOS **** */

         public function tiposContratos() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 1) {
                     $this->tiposContratosController->index();
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function parqueos() {
             if (PrivateAppAuthController::$auth) {
                 $this->parqueoController->index();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function generarXLS() {
             $config = Config::singleton();
             header("Content-type: application/vnd.ms-excel; name='excel'");
             header("Content-Disposition: filename=reporteContratos.xls");
             header("Pragma: no-cache");
             header("Expires: 0");

             echo $_POST["tabla"];
         }

         public function datos_parqueo_usuario() {
             if (PrivateAppAuthController::$auth) {
                 $this->parqueoController->datosParqueoCliente();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }
     }