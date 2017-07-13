<?php

     class CamaraController implements IController {
         private $view;
         private $config;

         function __construct() {
             $this->view = new View();
             $this->config = Config::singleton();
         }

         public function index() {
             
         }

         public function datos_parqueadero() {
             require_once $this->config->get("entitiesFolder") . "ParqueaderoAdministrador.php";
             require_once $this->config->get("modelsFolder") . "ParqueaderoAdministradorModel.php";

             $user = PrivateAppAuthController::$auth;
             $user instanceof Usuario;

             $parqueadero_admin = new ParqueaderoAdministrador();
             $parqueadero_admin->setAdm_id($user->usu_id);

             $parquedero_admin_model = new ParqueaderoAdministradorModel();
             $retorno_parqueadero_admin = $parquedero_admin_model->datosParqueaderoAdministrador($parqueadero_admin);

             return $retorno_parqueadero_admin->data;
         }

         public function camaras() {
             require_once $this->config->get("entitiesFolder") . "Camara.php";
             require_once $this->config->get("modelsFolder") . "CamaraModel.php";

             $datosParqueadero = $this->datos_parqueadero();
             $datosParqueadero instanceof Parqueadero;

             $camara = new Camara();
             $camaraModel = new CamaraModel();

             $camara->setPar_id($datosParqueadero->getPar_id());
             $camaras = $camaraModel->get($camara);

             $vars["camaras"] = $camaras->data;
             $this->view->show("private/admin/camara/camaras.php", $vars);
         }

         public function insertCamara() {
             require_once $this->config->get("entitiesFolder") . "Camara.php";
             require_once $this->config->get("modelsFolder") . "CamaraModel.php";

             $datosParqueadero = $this->datos_parqueadero();
             $datosParqueadero instanceof Parqueadero;

             $camara = new Camara();
             $camaraModel = new CamaraModel();

             $camara->setCam_nombre($_POST["cam_nombre"]);
             $camara->setCam_ip($_POST["cam_ip"]);
             $camara->setCam_puerto($_POST["cam_puerto"]);
             $camara->setCam_usuario($_POST["cam_usuario"]);
             $camara->setCam_password($_POST["cam_password"]);
             $camara->setPar_id($datosParqueadero->getPar_id());

             $camaras = $camaraModel->insert($camara);

             header("location: ?action=camaras&msg={$camaras->msg}&status={$camaras->status}");
         }

         public function searchCamara() {
             require_once $this->config->get("entitiesFolder") . "Camara.php";
             require_once $this->config->get("modelsFolder") . "CamaraModel.php";

             $camara = new Camara();
             $camaraModel = new CamaraModel();

             $camara->setCam_id($_POST["cam_id"]);
             $cam = $camaraModel->getById($camara);
             
             echo json_encode($cam);
         }
         
         public function updateCamara() {
             require_once $this->config->get("entitiesFolder") . "Camara.php";
             require_once $this->config->get("modelsFolder") . "CamaraModel.php";

             $camara = new Camara();
             $camaraModel = new CamaraModel();

             $camara->setCam_id($_POST["update_cam_id"]);
             $camara->setCam_nombre($_POST["update_cam_nombre"]);
             $camara->setCam_ip($_POST["update_cam_ip"]);
             $camara->setCam_puerto($_POST["update_cam_puerto"]);
             $camara->setCam_usuario($_POST["update_cam_usuario"]);
             $camara->setCam_password($_POST["update_cam_password"]);

             $camaras = $camaraModel->update($camara);
             header("location: ?action=camaras&msg={$camaras->msg}&status={$camaras->status}");
         }
     }