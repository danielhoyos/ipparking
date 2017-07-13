<?php

     class IndexController implements IController {

         private $view;
         private $usuarioController;
         private $personaController;
         private $authController;
         private $parqueaderoController;
         private $estacionController;
         private $parqueo;
         private $tarifaController;
         private $camaraController;
         private $ventasController;
         private $contabilidadController;
         private $facturaController;

         function __construct() {
             $config = Config::singleton();
             require_once $config->get("controllersFolder") . "private/UsuarioController.php";
             require_once $config->get("controllersFolder") . "private/PersonaController.php";
             require_once $config->get("controllersFolder") . "private/auth/AuthController.php";
             require_once $config->get("controllersFolder") . "private/ParqueaderoController.php";
             require_once $config->get("controllersFolder") . "private/EstacionController.php";
             require_once $config->get("controllersFolder") . "private/ParqueoController.php";
             require_once $config->get("controllersFolder") . "private/TarifaController.php";
             require_once $config->get("controllersFolder") . "private/CamaraController.php";
             require_once $config->get("controllersFolder") . "private/VentaController.php";
             require_once $config->get("controllersFolder") . "private/ContabilidadController.php";
             require_once $config->get("controllersFolder") . "private/FacturaController.php";

             $this->view = new View();
             $this->usuarioController = new UsuarioController();
             $this->personaController = new PersonaController();
             $this->authController = new AuthController();
             $this->parqueaderoController = new ParqueaderoController();
             $this->estacionController = new EstacionController();
             $this->parqueo = new ParqueoController();
             $this->tarifaController = new TarifaController();
             $this->camaraController = new CamaraController();
             $this->ventasController = new VentaController();
             $this->contabilidadController = new ContabilidadController();
             $this->facturaController = new FacturaController();
         }

         public function index() {
             if (PrivateAppAuthController::$auth) {
                 $this->view->show("private/admin/index.php");
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

         public function parqueadero() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 2) {
                     $this->parqueaderoController->parqueadero_admin();
                 } else {
                     $vars["status"] = 501;
                     $vars["msg"] = "No tiene los permisos suficientes para realizar esta acción";
                     $this->view->show("private/admin/index.php", $vars);
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function update_par_avatar() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 2) {
                     $this->parqueaderoController->update_avatar();
                 } else {
                     $vars["status"] = 501;
                     $vars["msg"] = "No tiene los permisos suficientes para realizar esta acción";
                     $this->view->show("private/admin/index.php", $vars);
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function datosParqueadero() {
             if (PrivateAppAuthController::$auth) {
                 $this->parqueaderoController->datosParqueadero();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function update_parqueadero() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 2) {
                     $this->parqueaderoController->update_parqueadero();
                 } else {
                     $vars["status"] = 501;
                     $vars["msg"] = "No tiene los permisos suficientes para realizar esta acción";
                     $this->view->show("private/admin/index.php", $vars);
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function empleados($status = null, $msg = null) {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 2) {
                     $user = PrivateAppAuthController::$auth;

                     $config = Config::singleton();
                     require_once $config->get("entitiesFolder") . "TipoIdentificacion.php";
                     require_once $config->get("modelsFolder") . "TipoIdentificacionModel.php";
                     require_once $config->get("entitiesFolder") . "ParqueaderoAdministrador.php";
                     require_once $config->get("modelsFolder") . "ParqueaderoAdministradorModel.php";
                     require_once $config->get("entitiesFolder") . "ParqueaderoAdministradorEmpleado.php";
                     require_once $config->get("modelsFolder") . "ParqueaderoAdministradorEmpleadoModel.php";
                     $tipModel = new TipoIdentificacionModel();
                     $t = $tipModel->get();

                     /*                      * *********** ID DEL PARQUEADERO-ADMIN *********** */
                     $padm = new ParqueaderoAdministrador();
                     $padm->setAdm_id($user->usu_id);
                     $padmModel = new ParqueaderoAdministradorModel();
                     $retorno_padm = $padmModel->getByAdmin($padm);

                     $pdam = $retorno_padm->data;
                     $pdam instanceof ParqueaderoAdministrador;
                     /*                      * *********** ID DEL PARQUEADERO-ADMIN *********** */

                     /*                      * *********** EMPLEADOS PARQUEADERO-ADMIN *********** */
                     $pae = new ParqueaderoAdministradorEmpleado();
                     $pae->setPadm_id($pdam->getPadm_id());

                     $paeModel = new ParqueaderoAdministradorEmpleadoModel();
                     $retorno_pae = $paeModel->empleadosByParqueaderoAdministrador($pae);
                     $vars["msg"] = $msg;
                     $vars["status"] = $status;
                     $vars["empleados"] = $retorno_pae->data;
                     $vars["tipos"] = $t->data;
                     $this->view->show("private/admin/empleado/empleados.php", $vars);
                 } else {
                     $vars["status"] = 501;
                     $vars["msg"] = "No tiene los permisos suficientes para realizar esta acción";
                     $this->view->show("private/admin/index.php", $vars);
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function insert_empleado() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 2) {
                     $this->usuarioController->insert_empleado();
                 } else {
                     $vars["status"] = 501;
                     $vars["msg"] = "No tiene los permisos suficientes para realizar esta acción";
                     $this->view->show("private/admin/index.php", $vars);
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function empleadoById() {
             if (PrivateAppAuthController::$auth) {
                 $this->usuarioController->empleadoById();
             }
         }

         public function update_estado() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 2) {
                     $this->usuarioController->update_estado();
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function estaciones() {
             if (PrivateAppAuthController::$auth) {
                 $this->estacionController->estaciones();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function insert_estacion() {
             if (PrivateAppAuthController::$auth) {
                 $this->estacionController->insert_estacion();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function buscar_Estacion_Accesorio() {
             if (PrivateAppAuthController::$auth) {
                 $this->estacionController->buscar_Estacion_Accesorio();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function search_Vehiculo() {
             if (PrivateAppAuthController::$auth) {
                 $this->parqueo->search_Vehiculo();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function registro_parqueo() {
             if (PrivateAppAuthController::$auth) {
                 $this->parqueo->registro_parqueo();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function datos_parqueo() {
             if (PrivateAppAuthController::$auth) {
                 $this->parqueo->datos_parqueo();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }
         
         public function parqueos() {
             if (PrivateAppAuthController::$auth) {
                 $this->parqueo->index();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function datos_accesorios() {
             if (PrivateAppAuthController::$auth) {
                 $this->parqueo->datos_accesorios();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function search_Persona() {
             if (PrivateAppAuthController::$auth) {
                 $this->personaController->search_persona();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function finalizar_parqueo() {
             if (PrivateAppAuthController::$auth) {
                 $this->parqueo->finalizar_parqueo();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function tarifas() {
             if (PrivateAppAuthController::$auth) {
                 $this->tarifaController->index();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function tarifaById() {
             if (PrivateAppAuthController::$auth) {
                 $this->tarifaController->tarifasById();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function update_tarifa() {
             if (PrivateAppAuthController::$auth) {
                 $this->tarifaController->update_tarifa();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         /*          * **************** CAMARAS **************** */

         public function camaras() {
             if (PrivateAppAuthController::$auth) {
                 $this->camaraController->camaras();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function insertCamara() {
             if (PrivateAppAuthController::$auth) {
                 $this->camaraController->insertCamara();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function searchCamara() {
             if (PrivateAppAuthController::$auth) {
                 $this->camaraController->searchCamara();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function updateCamara() {
             if (PrivateAppAuthController::$auth) {
                 $this->camaraController->updateCamara();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function ventas() {
             if (PrivateAppAuthController::$auth) {
                 $this->ventasController->index();
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

         public function insertFactura() {
             if (PrivateAppAuthController::$auth) {
                 $this->facturaController->insertFactura();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }
         
         public function datos_parqueo_usuario() {
             if (PrivateAppAuthController::$auth) {
                 $this->parqueo->datosParqueoCliente();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }
     }   