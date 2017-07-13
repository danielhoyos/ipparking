<?php

     class AuthController implements IController {

         private $view;
         private $config;

         function __construct() {
             $this->view = new View();
             $this->config = Config::singleton();
         }

         public function index() {
             
         }

         public function validarCliente() {
             require_once "{$this->config->get("entitiesFolder")}Persona.php";
             require_once "{$this->config->get("entitiesFolder")}Usuario.php";
             require_once "{$this->config->get("modelsFolder")}PersonaModel.php";
             require_once "{$this->config->get("modelsFolder")}UsuarioModel.php";

             $usuario = new Usuario();
             $usuarioModel = new UsuarioModel();

             $usu_usuario = trim($_POST["usu_usuario"]);
             $usu_password = trim($_POST["usu_password"]);

             $usuario->setUsu_usuario(strip_tags($usu_usuario));
             $usuario->setUsu_password(strip_tags($usu_password), true);

             $r = $usuarioModel->validarCliente($usuario);
             $userAuth = $r->data;
             $userAuth instanceof Usuario;

             if ($r->status === 200 && $userAuth->getUsu_estado() !== Usuario::ESTADO_INACTIVO) {
                 $_SESSION[AppController::$keySession] = json_encode($r->data);
                 header("location: ?action=home");
             } else if ($r->status == 200 && $userAuth->getUsu_estado() === Usuario::ESTADO_INACTIVO) {
                 $msg = "El Usuario ingresado esta Inactivo. Para Activarlo pongase en contacto con ipparking.servicioalcliente@gmail.com";
                 $status = 501;
                 header("location: ?msg={$msg}&status={$status}");
             }else{
                 header("location: ?msg={$r->msg}&status={$r->status}");
             }
         }

         public function logout() {
             if (AppController::$auth) {
                 session_destroy();
                 $msg = "Sessión cerrada Correctamente. Regrese Pronto";
                 $status = 200;
                 header("location: ?msg={$msg}&status={$status}");
             } else {
                 $this->view->show("public/index.php");
             }
         }

     }
     