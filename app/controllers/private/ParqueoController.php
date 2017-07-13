<?php
     class ParqueoController implements IController {

         private $config;
         private $view;
         private $estacionController;
         private $parqueaderoController;

         function __construct() {
             $this->config = Config::singleton();
             $this->view = new View();

             require_once $this->config->get("entitiesFolder") . "Parqueo.php";
             require_once $this->config->get("modelsFolder") . "ParqueoModel.php";
             require_once $this->config->get("controllersFolder") . "private/EstacionController.php";
             require_once $this->config->get("controllersFolder") . "private/ParqueaderoController.php";

             $this->estacionController = new EstacionController();
             $this->parqueaderoController = new ParqueaderoController();
         }

         public function index() {
             require_once "{$this->config->get("entitiesFolder")}Parqueo.php";
             require_once "{$this->config->get("modelsFolder")}ParqueoModel.php";
             require_once "{$this->config->get("entitiesFolder")}Camara.php";
             require_once "{$this->config->get("modelsFolder")}CamaraModel.php";

             if (PrivateAppAuthController::$auth) {
                 $user = PrivateAppAuthController::$auth;
             } else if (AppController::$auth) {
                 $user = AppController::$auth;
             }

             $parqueo = new Parqueo();
             $parqueoModel = new ParqueoModel();

             $parqueo->setCliente_id($user->usu_id);
             $parqueo->setPao_estado("activo");

             $r = $parqueoModel->getParqueoCam($parqueo);
             $msg = NULL;

             if ($r->tam === 0) {
                 $msg = "No existe un parqueo activo en el sistema...";
             } else {
                 $cam_id = $r->data->cam_id;
                 $camara = new Camara();
                 $camaraModel = new CamaraModel();

                 $camara->setCam_id($cam_id);
                 $r->camara = $camaraModel->getById($camara);
             }

             $vars["msg"] = $msg;
             $vars["datos"] = $r;
             $this->view->show("private/parqueo.php", $vars);
         }

         public function indexCliente() {
             require_once "{$this->config->get("entitiesFolder")}Parqueo.php";
             require_once "{$this->config->get("modelsFolder")}ParqueoModel.php";
             require_once "{$this->config->get("entitiesFolder")}Camara.php";
             require_once "{$this->config->get("modelsFolder")}CamaraModel.php";

             $user = AppController::$auth;

             $parqueo = new Parqueo();
             $parqueoModel = new ParqueoModel();

             $parqueo->setCliente_id($user->usu_id);
             $parqueo->setPao_estado("activo");

             $r = $parqueoModel->getParqueoCam($parqueo);
             $msg = NULL;

             if ($r->tam === 0) {
                 $msg = "No existe un parqueo activo en el sistema...";
             } else {
                 $cam_id = $r->data->cam_id;
                 $camara = new Camara();
                 $camaraModel = new CamaraModel();

                 $camara->setCam_id($cam_id);
                 $r->camara = $camaraModel->getById($camara);
             }

             $vars["msg"] = $msg;
             $vars["datos"] = $r;
             $this->view->show("private/parqueoCliente.php", $vars);
         }

         public function registro_parqueo() {
             if (PrivateAppAuthController::$auth) {
                 require_once $this->config->get("entitiesFolder") . "Vehiculo.php";
                 require_once $this->config->get("modelsFolder") . "VehiculoModel.php";
                 require_once $this->config->get("entitiesFolder") . "Estacion.php";
                 require_once $this->config->get("modelsFolder") . "EstacionModel.php";
                 require_once $this->config->get("entitiesFolder") . "Persona.php";
                 require_once $this->config->get("modelsFolder") . "PersonaModel.php";
                 require_once $this->config->get("entitiesFolder") . "Usuario.php";
                 require_once $this->config->get("modelsFolder") . "UsuarioModel.php";
                 require_once $this->config->get("entitiesFolder") . "EstacionParqueo.php";
                 require_once $this->config->get("modelsFolder") . "EstacionParqueoModel.php";

                 $parqueo = new Parqueo();
                 $parqueoModel = new ParqueoModel();
                 $estacion = new Estacion();
                 $estacionModel = new EstacionModel();

                 $estacion->setEst_id($_POST["est_id"]);
                 $retorno_estacion = $estacionModel->getById($estacion);
                 $estacion = $retorno_estacion->data;
                 $estacion instanceof Estacion;

                 if ($_POST["veh_id"] === "") {
                     $vehiculo = new Vehiculo();
                     $vehiculoModel = new VehiculoModel();

                     $vehiculo->setVeh_placa(strtoupper($_POST["veh_placa"]));
                     $vehiculo->setVeh_color($_POST["veh_color"]);
                     $vehiculo->setMar_id($_POST["mar_id"]);
                     $vehiculo->setTiv_id($estacion->getTiv_id());

                     $retorno_vehiculo = $vehiculoModel->insert($vehiculo);
                     $veh_id = $retorno_vehiculo->data;
                 } else {
                     $veh_id = $_POST["veh_id"];
                 }

                 if ($_POST["usu_id"] == "") {
                     $usuario = new Usuario();
                     $usuarioModel = new UsuarioModel();
                     $usuario->setPer_identificacion($_POST["per_identificacion"]);
                     $usuario->setPer_nombre($_POST["per_nombre"]);
                     $usuario->setPer_apellido($_POST["per_apellido"]);

                     $usuario->setUsu_usuario(strtoupper($_POST["veh_placa"]));
                     $usuario->setUsu_password($_POST["per_identificacion"], true);
                     $usuario->setUsu_estado(Usuario::ESTADO_PENDIENTE);
                     $usuario->setUsu_fecha_registro(date("Y-m-d"));
                     $usuario->setRol_id(4);

                     $retorno_usuario = $usuarioModel->insert($usuario);
                     $cliente_id = $retorno_usuario->data;
                 } else {
                     $cliente_id = $_POST["usu_id"];
                 }

                 $vendedor_id = PrivateAppAuthController::$auth->usu_id;

                 $parqueo->setPao_fecha_inicio($_POST["pao_fecha_inicio"]);
                 $parqueo->setPao_hora_inicio($_POST["pao_hora_inicio"]);
                 $parqueo->setEst_id($_POST["est_id"]);
                 $parqueo->setVeh_id($veh_id);
                 $parqueo->setVendedor_id($vendedor_id);
                 $parqueo->setCliente_id($cliente_id);
                 $parqueo->setPao_estado(Parqueo::$PARQUEO_ACTIVO);

                 $retorno_parqueo = $parqueoModel->insert($parqueo);

                 if ($retorno_parqueo->status == 200) {
                     $estacion->setEst_estado(Estacion::$EstacionNoDisponible);
                     $estacion->setEst_id($_POST["est_id"]);
                     $estacionModel->updateEstado($estacion);

                     $estacionParqueo = new EstacionParqueo();
                     $estacionParqueoModel = new EstacionParqueoModel();
                     $estacionParqueo->setPao_id($retorno_parqueo->data);

                     if ($estacion->getTiv_id() === 1) {
                         if ($_POST["est_id_llave"] !== "") {
                             $estacionParqueo->setEst_id($_POST["est_id_llave"]);
                             $r = $estacionParqueoModel->insert($estacionParqueo);
                             if ($r->status === 200) {
                                 $estacion->setEst_estado(Estacion::$EstacionNoDisponible);
                                 $estacion->setEst_id($_POST["est_id_llave"]);
                                 $estacionModel->updateEstado($estacion);
                             }
                         }
                     } elseif ($estacion->getTiv_id() === 2) {
                         if ($_POST["est_id_casco1"] !== "") {
                             $estacionParqueo->setEst_id($_POST["est_id_casco1"]);
                             $r = $estacionParqueoModel->insert($estacionParqueo);
                             if ($r->status === 200) {
                                 $estacion->setEst_estado(Estacion::$EstacionNoDisponible);
                                 $estacion->setEst_id($_POST["est_id_casco1"]);
                                 $estacionModel->updateEstado($estacion);
                             }
                         }
                         if ($_POST["est_id_casco2"] !== "") {
                             $estacionParqueo->setEst_id($_POST["est_id_casco2"]);
                             $r = $estacionParqueoModel->insert($estacionParqueo);
                             if ($r->status === 200) {
                                 $estacion->setEst_estado(Estacion::$EstacionNoDisponible);
                                 $estacion->setEst_id($_POST["est_id_casco2"]);
                                 $estacionModel->updateEstado($estacion);
                             }
                         }
                     }
                 }
                 header("location: ?action=estaciones&msg={$retorno_parqueo->msg}&status={$retorno_parqueo->status}");
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function search_Vehiculo() {
             if (PrivateAppAuthController::$auth) {
                 require_once $this->config->get("entitiesFolder") . "Vehiculo.php";
                 require_once $this->config->get("modelsFolder") . "VehiculoModel.php";

                 $vehiculo = new Vehiculo();
                 $vehiculoModel = new VehiculoModel();

                 $vehiculo->setVeh_placa($_POST["veh_placa"]);
                 $r = $vehiculoModel->get($vehiculo);

                 echo json_encode($r);
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function datos_parqueo() {
             if (PrivateAppAuthController::$auth) {

                 require_once $this->config->get("entitiesFolder") . "ParqueaderoAdministrador.php";
                 require_once $this->config->get("modelsFolder") . "ParqueaderoAdministradorModel.php";
                 require_once $this->config->get("entitiesFolder") . "Vehiculo.php";
                 require_once $this->config->get("modelsFolder") . "VehiculoModel.php";
                 require_once $this->config->get("entitiesFolder") . "Tarifa.php";
                 require_once $this->config->get("modelsFolder") . "TarifaModel.php";

                 $parqueo = new Parqueo();
                 $parqueoModel = new ParqueoModel();

                 $parqueo->setPao_id($_POST["pao_id"]);
                 $r = $parqueoModel->getById($parqueo);

                 $user = PrivateAppAuthController::$auth;
                 $user instanceof Usuario;

                 $parqueadero_admin = new ParqueaderoAdministrador();
                 $parqueadero_admin->setAdm_id($user->usu_id);

                 $parquedero_admin_model = new ParqueaderoAdministradorModel();
                 $retorno_parqueadero_admin = $parquedero_admin_model->datosParqueaderoAdministrador($parqueadero_admin);

                 $vehiculo = new Vehiculo();
                 $vehiculoModel = new VehiculoModel();

                 $vehiculo->setVeh_placa($r->data->veh_placa);
                 $datosVehiculo = $vehiculoModel->get($vehiculo);

                 $tarifa = new Tarifa();
                 $tarifaModel = new TarifaModel();

                 $v = $datosVehiculo->data;
                 $v instanceof Vehiculo;

                 $p = $retorno_parqueadero_admin->data;
                 $p instanceof Parqueadero;

                 $tarifa->setTiv_id($v->getTiv_id());
                 $tarifa->setPar_id($p->getPar_id());
                 $tarifas = $tarifaModel->getByTipoVehiculo($tarifa);

                 $r->tarifas = $tarifas->data;

                 echo json_encode($r);
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function datosParqueoCliente() {
             require_once $this->config->get("entitiesFolder") . "ParqueaderoAdministrador.php";
             require_once $this->config->get("modelsFolder") . "ParqueaderoAdministradorModel.php";
             require_once $this->config->get("entitiesFolder") . "Estacion.php";
             require_once $this->config->get("entitiesFolder") . "Tarifa.php";
             require_once $this->config->get("modelsFolder") . "EstacionModel.php";
             require_once $this->config->get("entitiesFolder") . "Vehiculo.php";
             require_once $this->config->get("modelsFolder") . "VehiculoModel.php";
             require_once $this->config->get("modelsFolder") . "TarifaModel.php";

             $parqueo = new Parqueo();
             $parqueoModel = new ParqueoModel();

             $parqueo->setPao_id($_POST["pao_id"]);
             $r = $parqueoModel->getById($parqueo);

             $estacion = new Estacion();
             $estacionModel = new EstacionModel();
             $vehiculo = new Vehiculo();
             $vehiculoModel = new VehiculoModel();

             $p = $r->data;
             $p instanceof Parqueo;

             $estacion->setEst_id($p->getEst_id());
             $datosEstacion = $estacionModel->getById($estacion);

             $datosEst = $datosEstacion->data;
             $datosEst instanceof Estacion;

             $vehiculo->setVeh_id($p->getVeh_id());
             $datosVehiculo = $vehiculoModel->getById($vehiculo);

             $dv = $datosVehiculo->data;
             $dv instanceof Vehiculo;

             $tarifa = new Tarifa();
             $tarifaModel = new TarifaModel();

             $tarifa->setPar_id($datosEst->getPar_id());
             $tarifa->setTiv_id($dv->getTiv_id());
             $tarifas = $tarifaModel->getByTipoVehiculo($tarifa);

             $r->tarifas = $tarifas->data;
             echo json_encode($r);
         }

         public function datos_accesorios() {
             if (PrivateAppAuthController::$auth) {
                 require_once $this->config->get("entitiesFolder") . "EstacionParqueo.php";
                 require_once $this->config->get("modelsFolder") . "EstacionParqueoModel.php";

                 $estacionParqueo = new EstacionParqueo();
                 $estacionParqueoModel = new EstacionParqueoModel();

                 $estacionParqueo->setPao_id($_POST["pao_id"]);
                 $r = $estacionParqueoModel->getByParqueo($estacionParqueo);
                 print json_encode($r);
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function finalizar_parqueo() {
             require_once $this->config->get("entitiesFolder") . "Estacion.php";
             require_once $this->config->get("modelsFolder") . "EstacionModel.php";

             $parqueo = new Parqueo();
             $parqueoModel = new ParqueoModel();

             $parqueo->setPao_fecha_fin(date("Y-m-d"));
             $parqueo->setPao_hora_fin(date("H:i:s"));
             $parqueo->setPao_estado(Parqueo::$PARQUEO_FINALIZADO);
             $parqueo->setPao_id($_POST["pao_id"]);

             $retorno_parqueo = $parqueoModel->update($parqueo);

             if ($retorno_parqueo->status === 200) {
                 $estacion = new Estacion();
                 $estacionModel = new EstacionModel();

                 $estacion->setEst_estado(Estacion::$EstacionDisponible);
                 $estacion->setEst_id($_POST["estacion_id"]);
                 $estacionModel->updateEstado($estacion);

                 if ($_POST["est_id_llave_dato"] !== "") {
                     $estacion->setEst_id($_POST["est_id_llave_dato"]);
                     $estacionModel->updateEstado($estacion);
                 }

                 if ($_POST["est_id_casco1"] !== "") {
                     $estacion->setEst_id($_POST["est_id_casco1"]);
                     $estacionModel->updateEstado($estacion);
                 }

                 if ($_POST["est_id_casco2"] !== "") {
                     $estacion->setEst_id($_POST["est_id_casco2"]);
                     $estacionModel->updateEstado($estacion);
                 }
             }
             header("location: ?action=estaciones&msg={$retorno_parqueo->msg}&status={$retorno_parqueo->status}");
         }
     }