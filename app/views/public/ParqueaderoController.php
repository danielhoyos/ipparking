<?php

     class ParqueaderoController implements IController {

         private $view;
         private $config;
         private $usuarioController;

         function __construct() {
             $this->config = Config::singleton();

             require_once $this->config->get("controllersFolder") . "private/UsuarioController.php";
             require_once $this->config->get("entitiesFolder") . "Parqueadero.php";
             require_once $this->config->get("modelsFolder") . "ParqueaderoModel.php";

             $this->view = new View();
             $this->usuarioController = new UsuarioController();
         }

         public function index() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 1) {
                     require_once $this->config->get("entitiesFolder") . "TiempoContratoParqueadero.php";
                     require_once $this->config->get("modelsFolder") . "TiempoContratoParqueaderoModel.php";
                     require_once $this->config->get("entitiesFolder") . "TipoIdentificacion.php";
                     require_once $this->config->get("modelsFolder") . "TipoIdentificacionModel.php";
                     require_once $this->config->get("entitiesFolder") . "Parqueadero.php";
                     require_once $this->config->get("modelsFolder") . "ParqueaderoModel.php";

                     $tcpModel = new TiempoContratoParqueaderoModel();
                     $tcp = $tcpModel->get();

                     $tiposModel = new TipoIdentificacionModel();
                     $tipos = $tiposModel->get();

                     $paqueaderoModel = new ParqueaderoModel();
                     $p = $paqueaderoModel->get();

                     $vars["tipos"] = $tipos->data;
                     $vars["tcp"] = $tcp->data;
                     $vars["parqueaderos"] = $p->data;

                     $this->view->show("private/gerente/parqueaderos.php", $vars);
                 } else {
                     $vars["status"] = 501;
                     $vars["msg"] = "No tiene los permisos suficientes para realizar esta acción";
                     $this->view->show("private/gerente/index.php", $vars);
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function parqueaderos() {
             require_once $this->config->get("entitiesFolder") . "Parqueadero.php";
             require_once $this->config->get("modelsFolder") . "ParqueaderoModel.php";
             require_once $this->config->get("entitiesFolder") . "Tarifa.php";
             require_once $this->config->get("modelsFolder") . "TarifaModel.php";

             $paqueaderoModel = new ParqueaderoModel();
             $tarifaModel = new TarifaModel();
             
             $p = $paqueaderoModel->get();
             $t = $tarifaModel->getTarifas();
             
             $vars["parqueaderos"] = $p->data;
             $vars["tarifas"] = $t->data;
             $this->view->show("public/parqueaderos.php", $vars);
         }

         public function registrar() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 1) {
                     require_once $this->config->get("entitiesFolder") . "Persona.php";
                     require_once $this->config->get("modelsFolder") . "PersonaModel.php";
                     require_once $this->config->get("entitiesFolder") . "Usuario.php";
                     require_once $this->config->get("modelsFolder") . "UsuarioModel.php";

                     require_once $this->config->get("entitiesFolder") . "Parqueadero.php";
                     require_once $this->config->get("modelsFolder") . "ParqueaderoModel.php";

                     require_once $this->config->get("entitiesFolder") . "ParqueaderoAdministrador.php";
                     require_once $this->config->get("modelsFolder") . "ParqueaderoAdministradorModel.php";

                     require_once $this->config->get("entitiesFolder") . "TiempoContratoParqueadero.php";
                     require_once $this->config->get("modelsFolder") . "TiempoContratoParqueaderoModel.php";

                     require_once $this->config->get("entitiesFolder") . "ContratoParqueadero.php";
                     require_once $this->config->get("modelsFolder") . "ContratoParqueaderoModel.php";

                     require_once $this->config->get("entitiesFolder") . "PagoContratoParqueadero.php";
                     require_once $this->config->get("modelsFolder") . "PagoContratoParqueaderoModel.php";

                     require_once $this->config->get("entitiesFolder") . "TipoIdentificacion.php";
                     require_once $this->config->get("modelsFolder") . "TipoIdentificacionModel.php";

                     require_once $this->config->get("entitiesFolder") . "Tarifa.php";
                     require_once $this->config->get("modelsFolder") . "TarifaModel.php";

                     require_once $this->config->get("libsFolder") . "PHPMailer-master/PHPMailerAutoload.php";
                     require_once $this->config->get("classFolder") . "Mail.php";

                     $usuario = new Usuario();
                     $usuario->setTip_id($_POST["tip_id"]);
                     $usuario->setPer_identificacion($_POST["per_identificacion"]);
                     $usuario->setPer_nombre($_POST["per_nombre"]);
                     $usuario->setPer_apellido($_POST["per_apellido"]);
                     $usuario->setPer_direccion($_POST["per_direccion"]);
                     $usuario->setPer_telefono($_POST["per_telefono"]);
                     $usuario->setPer_correo($_POST["per_correo"]);
                     $usuario->setUsu_usuario($_POST["usu_usuario"]);
                     $usuario->setUsu_password($_POST["per_identificacion"], true);
                     $usuario->setUsu_estado(Usuario::ESTADO_PENDIENTE);
                     $usuario->setUsu_fecha_registro(date("Y-m-d"));
                     $usuario->setRol_id(2);
                     $usuarioModel = new UsuarioModel();

                     $retorno_usuario = $usuarioModel->insert($usuario);
                     print_r($retorno_usuario);

                     if ($retorno_usuario->status === 200) {
                         $parquedero = new Parqueadero();
                         $parquedero->setPar_nit($_POST["par_nit"]);
                         $parquedero->setPar_nombre($_POST["par_nombre"]);
                         $parquedero->setPar_direccion($_POST["par_direccion"]);
                         $parquedero->setPar_telefono($_POST["par_telefono"]);
                         $parquedero->setPar_fecha_registro(date("Y-m-d H:i:s"));

                         $parquederoModel = new ParqueaderoModel();
                         $retorno_parqueadero = $parquederoModel->insert($parquedero);

                         if ($retorno_parqueadero->status === 200) {

                             $tarifa = new Tarifa();
                             $tarifaModel = new TarifaModel();

                             $tarifa->setPar_id($retorno_parqueadero->data);
                             for ($i = 1; $i < 4; $i++) {
                                 $tarifa->setTiv_id($i);
                                 $tarifaModel->insert($tarifa);
                             }

                             $parqueaderoAdministrador = new ParqueaderoAdministrador;
                             $parqueaderoAdministrador->setPar_id($retorno_parqueadero->data);
                             $parqueaderoAdministrador->setAdm_id($retorno_usuario->data);

                             $parqueaderoAdministradorModel = new ParqueaderoAdministradorModel;
                             $retorno_pa = $parqueaderoAdministradorModel->insert($parqueaderoAdministrador);

                             if ($retorno_pa->status === 200) {
                                 $contratoParquedero = new ContratoParqueadero();
                                 $contratoParquedero->setTcp_id($_POST["tcp_id"]);
                                 $contratoParquedero->setCon_descripcion("Contrato por prestacion de Servicio de sistema de información de IPParking");
                                 $contratoParquedero->setPar_id($retorno_parqueadero->data);

                                 $contratoParquederoModel = new ContratoParqueaderoModel();
                                 $retorno_cp = $contratoParquederoModel->insert($contratoParquedero);

                                 if ($retorno_cp->status === 200) {
                                     $pagoContratoParqueadero = new PagoContratoParqueadero();
                                     $pagoContratoParqueadero->setCon_id($retorno_cp->data);
                                     $pagoContratoParqueadero->setPcp_fecha_pago(date("Y-m-d H:i:s"));
                                     $pagoContratoParqueadero->setPcp_fecha_inicio_periodo($_POST["pcp_fecha_inicio_periodo"]);

                                     $tcp = new TiempoContratoParqueadero();
                                     $tcp->setTcp_id($_POST["tcp_id"]);

                                     $tcpModel = new TiempoContratoParqueaderoModel();
                                     $retorno_tcp = $tcpModel->getById($tcp);

                                     if ($retorno_tcp->status === 200) {
                                         $tcp = $retorno_tcp->data;
                                         $tcp instanceof TiempoContratoParqueadero;

                                         $fecha = new DateTime($_POST["pcp_fecha_inicio_periodo"]);
                                         $intervalo = new DateInterval('P' . $tcp->getTcp_cantidad_meses() . 'M');
                                         $fecha->add($intervalo);
                                         $fecha = $fecha->format('Y-m-d');

                                         $pagoContratoParqueadero->setPcp_fecha_fin_periodo($fecha);
                                         $pagoContratoParqueadero->setPcp_valor($tcp->getTcp_valor());
                                     }

                                     $pagoContratoParqueaderoModel = new PagoContratoParqueaderoModel();
                                     $retorno_pcp = $pagoContratoParqueaderoModel->insert($pagoContratoParqueadero);

                                     if ($retorno_pcp->status === 200) {

                                         $mail = new Mail();
                                         $mail->sendEmailRegistroUsuario($usuario);

                                         $vars["status"] = 200;
                                         $vars["msg"] = "Parqueadero registrado exitosamente se envio un e-mail a: {$usuario->getPer_correo()} con los datos de la cuenta";

                                         $tcpModel = new TiempoContratoParqueaderoModel();
                                         $tcp = $tcpModel->get();

                                         $tiposModel = new TipoIdentificacionModel();
                                         $tipos = $tiposModel->get();

                                         $paqueaderoModel = new ParqueaderoModel();
                                         $parqueaderos = $paqueaderoModel->get();

                                         $vars["tipos"] = $tipos->data;
                                         $vars["tcp"] = $tcp->data;
                                         $vars["parqueaderos"] = $parqueaderos->data;

                                         $this->view->show("private/gerente/parqueaderos.php", $vars);
                                     }
                                 }
                             }
                         }
                     }
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
                 require_once $this->config->get("entitiesFolder") . "TiempoContratoParqueadero.php";
                 require_once $this->config->get("modelsFolder") . "TiempoContratoParqueaderoModel.php";

                 require_once $this->config->get("entitiesFolder") . "TipoIdentificacion.php";
                 require_once $this->config->get("modelsFolder") . "TipoIdentificacionModel.php";

                 $tcpModel = new TiempoContratoParqueaderoModel();
                 $tcp = $tcpModel->get();

                 $tiposModel = new TipoIdentificacionModel();
                 $tipos = $tiposModel->get();

                 $parqueadero = new Parqueadero();
                 $parqueadero->setPar_id($_POST["par_id"]);

                 $parqueaderoModel = new ParqueaderoModel();
                 $r = $parqueaderoModel->getDatosParqueadero($parqueadero);

                 if ($r->status === 200) {
                     $vars["tipos"] = $tipos->data;
                     $vars["tcp"] = $tcp->data;
                     $vars["parqueadero"] = $r->data;
                     $this->view->show("private/gerente/get_parqueadero.php", $vars);
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function parqueadero_admin() {
             if (PrivateAppAuthController::$auth->rol_id === 2) {
                 $user = PrivateAppAuthController::$auth;
                 $user instanceof Usuario;

                 require_once $this->config->get("entitiesFolder") . "ParqueaderoAdministrador.php";
                 require_once $this->config->get("modelsFolder") . "ParqueaderoAdministradorModel.php";

                 require_once $this->config->get("entitiesFolder") . "TiempoContratoParqueadero.php";
                 require_once $this->config->get("modelsFolder") . "TiempoContratoParqueaderoModel.php";

                 require_once $this->config->get("entitiesFolder") . "Estacion.php";
                 require_once $this->config->get("modelsFolder") . "EstacionModel.php";

                 $parqueadero_admin = new ParqueaderoAdministrador();
                 $parqueadero_admin->setAdm_id($user->usu_id);

                 $parquedero_admin_model = new ParqueaderoAdministradorModel();
                 $retorno_parqueadero_admin = $parquedero_admin_model->datosParqueaderoAdministrador($parqueadero_admin);

                 $tcpModel = new TiempoContratoParqueaderoModel();
                 $tcp = $tcpModel->get();

                 $parqueadero = $retorno_parqueadero_admin->data;
                 $parqueadero instanceof Parqueadero;

                 $estacion = new Estacion();
                 $estacionModel = new EstacionModel();

                 $estacion->setPar_id($parqueadero->getPar_id());
                 $cantidadEstaciones = $estacionModel->get($estacion);

                 $ca = 0;
                 $cm = 0;
                 $cb = 0;
                 $cl = 0;
                 $cc = 0;

                 foreach ($cantidadEstaciones->data as $ce) {
                     $ce instanceof Estacion;

                     if ($ce->getEst_tipo() === "vehiculo") {
                         if ($ce->getTiv_id() === 1) {
                             $ca++;
                         } else if ($ce->getTiv_id() === 2) {
                             $cm++;
                         } else {
                             $cb++;
                         }
                     } elseif ($ce->getEst_tipo() === "llave") {
                         $cl++;
                     } elseif ($ce->getEst_tipo() === "casco") {
                         $cc++;
                     }
                 }

                 $vars["tcp"] = $tcp->data;
                 $vars["parqueadero"] = $retorno_parqueadero_admin->data;
                 $vars["capacidadAutomoviles"] = $ca;
                 $vars["capacidadMotocicletas"] = $cm;
                 $vars["capacidadBicicletas"] = $cb;
                 $vars["capacidadLlaves"] = $cl;
                 $vars["capacidadCascos"] = $cc;
                 $vars["cantidadEstaciones"] = count($cantidadEstaciones->data);

                 $this->view->show("private/parqueadero.php", $vars);
             } else {
                 $vars["status"] = 501;
                 $vars["msg"] = "No tiene los permisos suficientes para realizar esta acción";
                 $this->view->show("private/admin/index.php", $vars);
             }
         }

         public function update_parqueadero() {
             if (PrivateAppAuthController::$auth->rol_id === 2) {

                 require_once $this->config->get("entitiesFolder") . "TiempoContratoParqueadero.php";
                 require_once $this->config->get("modelsFolder") . "TiempoContratoParqueaderoModel.php";
                 $tcpModel = new TiempoContratoParqueaderoModel();
                 $tcp = $tcpModel->get();

                 $parqueadero = new Parqueadero();
                 $parqueadero->setPar_nombre($_POST["par_nombre"]);
                 $parqueadero->setPar_direccion($_POST["par_direccion"]);
                 $parqueadero->setPar_telefono($_POST["par_telefono"]);
                 $parqueadero->setPar_id($_POST["par_id"]);

                 $parqueadero_model = new ParqueaderoModel();
                 $retorno_parqueadero = $parqueadero_model->update($parqueadero);

                 if ($retorno_parqueadero->status === 200) {
                     $this->parqueadero_admin();
                 } else {
                     $vars["tcp"] = $tcp->data;
                     $vars["status"] = $retorno_parqueadero->status;
                     $vars["msg"] = $retorno_parqueadero->msg;

                     $this->view->show("private/parqueadero", $vars);
                 }
             } else {
                 $vars["status"] = 501;
                 $vars["msg"] = "No tiene los permisos suficientes para realizar esta acción";
                 $this->view->show("private/admin/index.php", $vars);
             }
         }

         public function datosParqueadero() {
             require_once $this->config->get("entitiesFolder") . "ParqueaderoAdministrador.php";
             require_once $this->config->get("modelsFolder") . "ParqueaderoAdministradorModel.php";

             require_once $this->config->get("entitiesFolder") . "Vehiculo.php";
             require_once $this->config->get("modelsFolder") . "VehiculoModel.php";

             require_once $this->config->get("entitiesFolder") . "Tarifa.php";
             require_once $this->config->get("modelsFolder") . "TarifaModel.php";

             require_once $this->config->get("entitiesFolder") . "Factura.php";
             require_once $this->config->get("modelsFolder") . "FacturaModel.php";

             $user = PrivateAppAuthController::$auth;
             $user instanceof Usuario;

             $parqueadero_admin = new ParqueaderoAdministrador();
             $parqueadero_admin->setAdm_id($user->usu_id);

             $parquedero_admin_model = new ParqueaderoAdministradorModel();
             $retorno_parqueadero_admin = $parquedero_admin_model->datosParqueaderoAdministrador($parqueadero_admin);

             $vehiculo = new Vehiculo();
             $vehiculoModel = new VehiculoModel();

             $vehiculo->setVeh_placa($_POST["veh_placa"]);
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

             $facturaModel = new FacturaModel();
             $cantidadFacturas = $facturaModel->cantidadFacturasParqueadero($p->getPar_id());

             $vars["vehiculo"] = $datosVehiculo->data;
             $vars["tarifas"] = $tarifas->data;
             $vars["vendedor"] = $user;
             $vars["parqueadero"] = $retorno_parqueadero_admin->data;
             $vars["facturas"] = $cantidadFacturas->data;
             print json_encode($vars);
             return $retorno_parqueadero_admin->data;
         }

         public function update_avatar() {
             if (PrivateAppAuthController::$auth) {
                 $config = Config::singleton();
                 $user = PrivateAppAuthController::$auth;
                 $user instanceof Usuario;

                 require_once $this->config->get("entitiesFolder") . "ParqueaderoAdministrador.php";
                 require_once $this->config->get("modelsFolder") . "ParqueaderoAdministradorModel.php";

                 $parqueadero_admin = new ParqueaderoAdministrador();
                 $parqueadero_admin->setAdm_id($user->usu_id);

                 $parquedero_admin_model = new ParqueaderoAdministradorModel();
                 $retorno_parqueadero_admin = $parquedero_admin_model->datosParqueaderoAdministrador($parqueadero_admin);

                 $partialname = $retorno_parqueadero_admin->data->par_nombre . "-" . $retorno_parqueadero_admin->data->par_nit;
                 $nameParqueadero = strtolower(str_replace(" ", "", $partialname));
                 $before_avatar = "";

                 /* SUBIR ARCHIVO */
                 $array_nombre = explode(".", $_FILES["par_avatar"]["name"]);
                 $tam = count($array_nombre);
                 $ext = $array_nombre[$tam - 1];

                 $name_avatar = $nameParqueadero . "." . $ext;
                 $path = $config->get("assetsRootFolder") . "parqueadero/$name_avatar";

                 move_uploaded_file($_FILES["par_avatar"]["tmp_name"], $path);
                 /* FIN SUBIR ARCHIVO */

                 /* ACTUALIZANDO AVATAR */
                 if (file_exists($path)) {
                     if ($retorno_parqueadero_admin->data->par_avatar !== NULL) {
                         $before_avatar = $config->get("assetsRootFolder") . "parqueadero/" . $retorno_parqueadero_admin->data->par_avatar;
                         if ($path != $before_avatar) {
                             unlink($before_avatar);
                         }
                     }
                     require_once $config->get("entitiesFolder") . "Parqueadero.php";
                     require_once $config->get("modelsFolder") . "ParqueaderoModel.php";

                     $parqueadero = new Parqueadero();
                     $parqueadero->setPar_avatar($name_avatar);
                     $parqueadero->setPar_id($retorno_parqueadero_admin->data->getPar_id());

                     $parqueaderoModel = new ParqueaderoModel();
                     $r = $parqueaderoModel->updateAvatar($parqueadero);

                     if ($r->status == 200) {
                         $this->parqueadero_admin();
                     } else {
                         $this->parqueadero_admin();
                     }
                 }
                 /* FIN ACTUALIZANDO AVATAR */
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

     }
     