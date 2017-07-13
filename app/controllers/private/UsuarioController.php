<?php

     class UsuarioController implements IController {

         private $view;
         private $config;

         function __construct() {
             $this->config = Config::singleton();

             require_once "{$this->config->get("controllersFolder")}private/auth/PrivateAppAuthController.php";
             require_once "{$this->config->get("controllersFolder")}AppController.php";

             $this->view = new View();
         }

         public function index() {
             
         }

         public function registrar() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 1 || PrivateAppAuthController::$auth->rol_id === 2) {
                     require_once $this->config->get("entitiesFolder") . "Persona.php";
                     require_once $this->config->get("modelsFolder") . "PersonaModel.php";
                     require_once $this->config->get("entitiesFolder") . "Usuario.php";
                     require_once $this->config->get("modelsFolder") . "UsuarioModel.php";

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

                     if (PrivateAppAuthController::$auth->rol_id === 1) {
                         $usuario->setRol_id(2);
                     } else {
                         $usuario->setRol_id(3);
                     }

                     $usuarioModel = new UsuarioModel();
                     $ru = $usuarioModel->insert($usuario);
                 } else {
                     $vars["status"] = 501;
                     $vars["msg"] = "No tiene los permisos suficientes para realizar esta acción";
                     $this->view->show("private/empleado/index.php", $vars);
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function update_avatar() {
             if (PrivateAppAuthController::$auth || AppController::$auth) {
                 sleep(2);
                 $config = Config::singleton();
                 $administracion = true;

                 if (PrivateAppAuthController::$auth) {
                     $user = PrivateAppAuthController::$auth;
                 } else if (AppController::$auth) {
                     $user = AppController::$auth;
                     $administracion = false;
                 }

                 /* SUBIR ARCHIVO */
                 $array_nombre = explode(".", $_FILES["usu_avatar"]["name"]);
                 $tam = count($array_nombre);
                 $ext = $array_nombre[$tam - 1];

                 $name_avatar = $user->usu_usuario . "." . $ext;
                 $path = $config->get("assetsRootFolder") . "avatar/$name_avatar";

                 if ($user->usu_avatar !== "") {
                     $before_avatar = $config->get("assetsRootFolder") . "avatar/" . $user->usu_avatar;
                 }

                 move_uploaded_file($_FILES["usu_avatar"]["tmp_name"], $path);
                 /* FIN SUBIR ARCHIVO */

                 /* ACTUALIZANDO AVATAR */
                 if (file_exists($path)) {
                     if ($path != $before_avatar) {
                         unlink($before_avatar);
                     }

                     require_once $config->get("entitiesFolder") . "Persona.php";
                     require_once $config->get("entitiesFolder") . "Usuario.php";
                     require_once $config->get("modelsFolder") . "PersonaModel.php";
                     require_once $config->get("modelsFolder") . "UsuarioModel.php";

                     $usuario = new Usuario();
                     $usuario->setUsu_id($user->usu_id);
                     $usuario->setUsu_avatar($name_avatar);

                     $usuarioModel = new UsuarioModel();
                     $r = $usuarioModel->updateAvatar($usuario);

                     if ($r->status == 200) {
                         $usuario->setUsu_usuario($user->usu_usuario);
                         $usuario->setUsu_password($user->usu_password);

                         if ($administracion) {
                             $r = $usuarioModel->validarUsuario($usuario);
                         } else {
                             $r = $usuarioModel->validarCliente($usuario);
                         }

                         if ($r->status == 200) {

                             if ($administracion) {
                                 $_SESSION[PrivateAppAuthController::$keySession] = json_encode($r->data);
                             } else {
                                 $_SESSION[AppController::$keySession] = json_encode($r->data);
                             }

                             print json_encode("Actualizado Correctamente");
                         }
                     }
                 }
                 /* FIN ACTUALIZANDO AVATAR */
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function update_portada() {
             if (PrivateAppAuthController::$auth || AppController::$auth) {
                 $config = Config::singleton();
                 $administracion = true;

                 if (PrivateAppAuthController::$auth) {
                     $user = PrivateAppAuthController::$auth;
                 } else if (AppController::$auth) {
                     $user = AppController::$auth;
                     $administracion = false;
                 }

                 /* SUBIR ARCHIVO */
                 $array_nombre = explode(".", $_FILES["usu_portada"]["name"]);
                 $tam = count($array_nombre);
                 $ext = $array_nombre[$tam - 1];

                 $name_portada = $user->usu_usuario . "." . $ext;
                 $path = $config->get("assetsRootFolder") . "portadas/$name_portada";

                 if ($user->usu_portada !== "") {
                     $before_portada = $config->get("assetsRootFolder") . "portadas/" . $user->usu_portada;
                 }

                 move_uploaded_file($_FILES["usu_portada"]["tmp_name"], $path);
                 /* FIN SUBIR ARCHIVO */

                 /* ACTUALIZANDO AVATAR */
                 if (file_exists($path)) {
                     if ($path != $before_portada) {
                         unlink($before_portada);
                     }

                     require_once $config->get("entitiesFolder") . "Persona.php";
                     require_once $config->get("entitiesFolder") . "Usuario.php";
                     require_once $config->get("modelsFolder") . "PersonaModel.php";
                     require_once $config->get("modelsFolder") . "UsuarioModel.php";

                     $usuario = new Usuario();
                     $usuario->setUsu_id($user->usu_id);
                     $usuario->setUsu_portada($name_portada);

                     $usuarioModel = new UsuarioModel();
                     $r = $usuarioModel->updatePortada($usuario);

                     if ($r->status == 200) {
                         $usuario->setUsu_usuario($user->usu_usuario);
                         $usuario->setUsu_password($user->usu_password);

                         if ($administracion) {
                             $r = $usuarioModel->validarUsuario($usuario);
                         } else {
                             $r = $usuarioModel->validarCliente($usuario);
                         }

                         if ($r->status == 200) {

                             if ($administracion) {
                                 $_SESSION[PrivateAppAuthController::$keySession] = json_encode($r->data);
                             } else {
                                 $_SESSION[AppController::$keySession] = json_encode($r->data);
                             }

                             header("location: ?controller=Index&action=perfil");
                         }
                     }
                 }
                 /* FIN ACTUALIZANDO AVATAR */
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function search_user() {
             if (PrivateAppAuthController::$auth || AppController::$auth) {
                 $config = Config::singleton();
                 require_once $config->get("entitiesFolder") . "Persona.php";
                 require_once $config->get("entitiesFolder") . "Usuario.php";
                 require_once $config->get("modelsFolder") . "PersonaModel.php";
                 require_once $config->get("modelsFolder") . "UsuarioModel.php";

                 $usuario = new Usuario();
                 $usuario->setUsu_usuario($_POST["usu_usuario"]);

                 $usuarioModel = new UsuarioModel();
                 $r = $usuarioModel->buscarUsuario($usuario);
                 sleep(2);
                 print json_encode($r);
             }
         }

         public function update_user() {
             if (PrivateAppAuthController::$auth || AppController::$auth) {
                 $config = Config::singleton();
                 $administracion = true;

                 if (PrivateAppAuthController::$auth) {
                     $user = PrivateAppAuthController::$auth;
                 } else if (AppController::$auth) {
                     $user = AppController::$auth;
                     $administracion = false;
                 }

                 require_once $config->get("entitiesFolder") . "Persona.php";
                 require_once $config->get("entitiesFolder") . "Usuario.php";
                 require_once $config->get("modelsFolder") . "PersonaModel.php";
                 require_once $config->get("modelsFolder") . "UsuarioModel.php";

                 $usuario = new Usuario();
                 $usuario->setPer_id($user->per_id);
                 $usuario->setPer_nombre($_POST["per_nombre"]);
                 $usuario->setPer_apellido($_POST["per_apellido"]);
                 $usuario->setPer_fecha_nacimiento($_POST["per_fecha_nacimiento"]);
                 $usuario->setPer_genero(@$_POST["per_genero"]);
                 $usuario->setPer_direccion($_POST["per_direccion"]);
                 $usuario->setPer_telefono($_POST["per_telefono"]);
                 $usuario->setPer_correo($_POST["per_correo"]);

                 $usuario->setUsu_id($user->usu_id);
                 $usuario->setUsu_usuario($_POST["usu_usuario"]);

                 $usuarioModel = new UsuarioModel();
                 $r = $usuarioModel->updateUser($usuario);

                 if ($r->status === 200) {
                     $usuario->setUsu_usuario($_POST["usu_usuario"]);
                     $usuario->setUsu_password($user->usu_password);

                     if ($administracion) {
                         $r = $usuarioModel->validarUsuario($usuario);
                     } else {
                         $r = $usuarioModel->validarCliente($usuario);
                     }

                     if ($r->status == 200) {

                         if ($administracion) {
                             $_SESSION[PrivateAppAuthController::$keySession] = json_encode($r->data);
                         } else {
                             $_SESSION[AppController::$keySession] = json_encode($r->data);
                         }

                         header("location: ?controller=Index&action=perfil");
                     }
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function update_password() {
             if (PrivateAppAuthController::$auth || AppController::$auth) {

                 $config = Config::singleton();
                 $administracion = true;

                 if (PrivateAppAuthController::$auth) {
                     $user = PrivateAppAuthController::$auth;
                 } else if (AppController::$auth) {
                     $user = AppController::$auth;
                     $administracion = false;
                 }

                 require_once $config->get("entitiesFolder") . "Persona.php";
                 require_once $config->get("entitiesFolder") . "Usuario.php";
                 require_once $config->get("modelsFolder") . "PersonaModel.php";
                 require_once $config->get("modelsFolder") . "UsuarioModel.php";

                 $usuario = new Usuario();
                 $usuario->setUsu_id($user->usu_id);
                 $usuario->setUsu_password($_POST["usu_password"], true);

                 $usuarioModel = new UsuarioModel;
                 $r = $usuarioModel->buscarPassword($usuario);

                 if ($r->status == 200) {

                     if ($user->usu_estado === Usuario::ESTADO_ACTIVO) {
                         $usuario->setUsu_password($_POST["usu_password_confirmar"], true);
                         $r = $usuarioModel->updatePassword($usuario);
                     } else {
                         $usuario->setUsu_password($_POST["usu_password_confirmar"], true);
                         $usuario->setUsu_estado(Usuario::ESTADO_ACTIVO);
                         $r = $usuarioModel->resetPassword($usuario);
                     }

                     if ($r->status == 200) {

                         $usuario->setUsu_usuario($user->usu_usuario);
                         $usuario->setUsu_password($_POST["usu_password_confirmar"], true);

                         if ($administracion) {
                             $r = $usuarioModel->validarUsuario($usuario);
                         } else {
                             $r = $usuarioModel->validarCliente($usuario);
                         }

                         if ($r->status == 200) {

                             if ($administracion) {
                                 $_SESSION[PrivateAppAuthController::$keySession] = json_encode($r->data);
                             } else {
                                 $_SESSION[AppController::$keySession] = json_encode($r->data);
                             }

                             header("location: ?controller=Index&action=perfil");
                         }
                     }
                 } else {
                     require_once $config->get("entitiesFolder") . "Rol.php";
                     require_once $config->get("modelsFolder") . "RolModel.php";

                     $rolModel = new RolModel();
                     $rol = $rolModel->get();

                     $vars["roles"] = $rol->data;
                     $vars["msg"] = $r->msg;
                     $vars["status"] = 501;
                     $this->view->show("private/editar_password.php", $vars);
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function update_estado() {
             if (PrivateAppAuthController::$auth) {
                 $config = Config::singleton();
                 require_once $config->get("entitiesFolder") . "Persona.php";
                 require_once $config->get("entitiesFolder") . "Usuario.php";
                 require_once $config->get("modelsFolder") . "PersonaModel.php";
                 require_once $config->get("modelsFolder") . "UsuarioModel.php";

                 $usuario = new Usuario();
                 $usuario->setUsu_estado($_POST["usu_estado"]);
                 $usuario->setUsu_id($_POST["usu_id"]);

                 $usuarioModel = new UsuarioModel();
                 $r = $usuarioModel->updateEstado($usuario);
                 print json_encode($r);
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function insert_empleado() {
             if (PrivateAppAuthController::$auth) {
                 if (PrivateAppAuthController::$auth->rol_id === 2) {
                     $user = PrivateAppAuthController::$auth;

                     require_once $this->config->get("entitiesFolder") . "Persona.php";
                     require_once $this->config->get("modelsFolder") . "PersonaModel.php";
                     require_once $this->config->get("entitiesFolder") . "Usuario.php";
                     require_once $this->config->get("modelsFolder") . "UsuarioModel.php";
                     require_once $this->config->get("entitiesFolder") . "ParqueaderoAdministradorEmpleado.php";
                     require_once $this->config->get("modelsFolder") . "ParqueaderoAdministradorEmpleadoModel.php";
                     require_once $this->config->get("entitiesFolder") . "ParqueaderoAdministrador.php";
                     require_once $this->config->get("modelsFolder") . "ParqueaderoAdministradorModel.php";

                     $usuario = new Usuario();
                     $usuarioModel = new UsuarioModel();

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
                     $usuario->setRol_id(3);

                     $retorno_empleado = $usuarioModel->insert($usuario);

                     $padm = new ParqueaderoAdministrador();
                     $padmModel = new ParqueaderoAdministradorModel();

                     $padm->setAdm_id($user->usu_id);
                     $retorno_padm = $padmModel->getByAdmin($padm);

                     if ($retorno_padm->status === 200) {
                         $pae = new ParqueaderoAdministradorEmpleado();
                         $paeModel = new ParqueaderoAdministradorEmpleadoModel();

                         $padm = $retorno_padm->data;
                         $padm instanceof ParqueaderoAdministrador;

                         $pae->setPadm_id($padm->getPadm_id());
                         $pae->setEmp_id($retorno_empleado->data);
                         $retorno_pae = $paeModel->insert($pae);

                         if ($retorno_pae->status === 200) {
                             require_once $this->config->get("controllersFolder") . "private/admin/IndexController.php";
                             $status = 200;
                             $msg = "Empleado registrado exitosamente se envio un e-mail a: {$usuario->getPer_correo()} con los datos de la cuenta";
                             $index = new IndexController();
                             $index->empleados($status, $msg);
                         }
                     }
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
                 require_once $this->config->get("entitiesFolder") . "Persona.php";
                 require_once $this->config->get("modelsFolder") . "PersonaModel.php";
                 require_once $this->config->get("entitiesFolder") . "Usuario.php";
                 require_once $this->config->get("modelsFolder") . "UsuarioModel.php";

                 require_once $this->config->get("entitiesFolder") . "TipoIdentificacion.php";
                 require_once $this->config->get("modelsFolder") . "TipoIdentificacionModel.php";

                 $tiposModel = new TipoIdentificacionModel();
                 $tipos = $tiposModel->get();

                 $usuario = new Usuario;
                 $usuario->setUsu_id($_POST["emp_id"]);

                 $usuarioModel = new UsuarioModel();
                 $retorno_usuario = $usuarioModel->getById($usuario);

                 if ($retorno_usuario->status === 200) {
                     $vars["tipos"] = $tipos->data;
                     $vars["empleado"] = $retorno_usuario->data;
                     $this->view->show("private/admin/empleado/get_empleado.php", $vars);
                 }
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }
     }