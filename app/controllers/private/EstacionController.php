<?php

     class EstacionController implements IController {

         private $view;
         private $config;

         function __construct() {
             $this->view = new View();
             $this->config = Config::singleton();
         }

         public function index() {
             
         }

         public function estaciones($status = null, $msg = null) {
             if (PrivateAppAuthController::$auth) {
                 require_once "{$this->config->get("entitiesFolder")}TipoVehiculo.php";
                 require_once "{$this->config->get("modelsFolder")}TipoVehiculoModel.php";
                 require_once "{$this->config->get("entitiesFolder")}Estacion.php";
                 require_once "{$this->config->get("modelsFolder")}EstacionModel.php";
                 require_once "{$this->config->get("entitiesFolder")}Marca.php";
                 require_once "{$this->config->get("modelsFolder")}MarcaModel.php";
                 require_once "{$this->config->get("entitiesFolder")}Parqueo.php";
                 require_once "{$this->config->get("modelsFolder")}ParqueoModel.php";
                 require_once "{$this->config->get("entitiesFolder")}Camara.php";
                 require_once "{$this->config->get("modelsFolder")}CamaraModel.php";

                 $tivModel = new TipoVehiculoModel();
                 $retorno_tiv = $tivModel->get();

                 $parqueoModel = new ParqueoModel();
                 $retorno_parqueo = $parqueoModel->get();

                 $info_parqueadero = $this->datos_parqueadero();
                 $info_parqueadero instanceof ParqueaderoAdministrador;

                 $est = new Estacion();
                 $est->setPar_id($info_parqueadero->getPar_id());
                 $estModel = new EstacionModel();
                 $retorno_est = $estModel->get($est);
                 
                 $camara = new Camara();
                 $camaraModel = new CamaraModel();
                 
                 $camara->setPar_id($info_parqueadero->getPar_id());
                 $datosCamaras = $camaraModel->get($camara);

                 $marcaModel = new MarcaModel();
                 $retorno_marcas = $marcaModel->get();

                 if ($status != null && $msg != null) {
                     $vars["status"] = $status;
                     $vars["msg"] = $msg;
                 }
                 $vars["tipos_vehiculos"] = $retorno_tiv->data;
                 $vars["estaciones"] = $retorno_est->data;
                 $vars["marcas"] = $retorno_marcas->data;
                 $vars["parqueos"] = $retorno_parqueo->data;
                 $vars["camaras"] = $datosCamaras->data;

                 $this->view->show("private/admin/estaciones/estaciones.php", $vars);
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function insert_estacion() {
             require_once "{$this->config->get("entitiesFolder")}Estacion.php";
             require_once "{$this->config->get("modelsFolder")}EstacionModel.php";

             $info_parqueadero = $this->datos_parqueadero();
             $info_parqueadero instanceof ParqueaderoAdministrador;

             $estacion = new Estacion();
             $estacionModel = new EstacionModel();

             $estacion->setEst_codigo($_POST["est_codigo"]);
             $estacion->setEst_tipo($_POST["est_tipo"]);
             
             if($_POST["cam_id"] === ""){
                 $estacion->setCam_id(NULL);
             }else{
                 $estacion->setCam_id($_POST["cam_id"]);
             }
             
             $estacion->setEst_tipo($_POST["est_tipo"]);

             if ($_POST["est_tipo"] === "vehiculo") {
                 $estacion->setTiv_id($_POST["tiv_id"]);
             } else {
                 $estacion->setTiv_id(NULL);
             }

             $estacion->setEst_estado(Estacion::$EstacionDisponible);
             $estacion->setPar_id($info_parqueadero->getPar_id());
             $r = $estacionModel->insert($estacion);

             header("location: ?action=estaciones&status={$r->status}&msg={$r->msg}");
         }

         public function buscar_Estacion_Accesorio() {
             require_once "{$this->config->get("entitiesFolder")}Estacion.php";
             require_once "{$this->config->get("modelsFolder")}EstacionModel.php";

             $info_parqueadero = $this->datos_parqueadero();
             $info_parqueadero instanceof ParqueaderoAdministrador;

             $estacion = new Estacion();
             $estacionModel = new EstacionModel();

             $estacion->setEst_tipo($_POST["est_tipo"]);
             $estacion->setEst_estado(Estacion::$EstacionDisponible);
             $estacion->setPar_id($info_parqueadero->getPar_id());
             
             $r = $estacionModel->getEstacionAccesorio($estacion);
             print json_encode($r);
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

     }