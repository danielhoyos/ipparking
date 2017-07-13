<?php

     class IndexController implements IController {

         private $view;
         private $usuarioController;
         private $personaController;
         private $parqueaderoController;
         private $parqueoController;
         PRIVATE $facturaController;

         public function __construct() {
             $config = Config::singleton();
             require_once $config->get("controllersFolder") . "private/UsuarioController.php";
             require_once $config->get("controllersFolder") . "private/PersonaController.php";
             require_once $config->get("controllersFolder") . "private/ParqueaderoController.php";
             require_once $config->get("controllersFolder") . "private/ParqueoController.php";
             require_once $config->get("controllersFolder") . "private/FacturaController.php";

             $this->personaController = new PersonaController();
             $this->usuarioController = new UsuarioController();
             $this->parqueaderoController = new ParqueaderoController();
             $this->parqueoController = new ParqueoController();
             $this->facturaController = new FacturaController();
             $this->view = new View();
         }

         public function formQuery() {
             $this->view->show("public/query.php");
         }

         public function insertQuery() {
             $config = Config::singleton();
             require_once"{$config->get("modelsFolder")}QueryModel.php";

             $queryModel = new QueryModel();
             $respuesta = $queryModel->createQuery($_POST["query"]);
             $vars["datos"] = $respuesta;
             $this->view->show("public/query.php", $vars);
         }

         public function formEmail() {
             $this->view->show("public/email.php");
         }

         public function enviarEmail() {
             $config = Config::singleton();

             $to = "dehoyos5@misena.edu.co";
             $subject = "PRUEBA HTML";

             $message = "<html>";
             $message .= "<head>";
             $message .= "</head>";
             $message .= "<body>";
             $message .= "<h3>Registro Existo en el sistema de parqueaderos IPParking: </h3>";
             $message .= "<label>Usuario: danielhoyos@gmail.com</label><br>";
             $message .= "<label>Password: 1061791895</label><br><br>";
             $message .= "<label>Ingresa dando click </label><a href=" . $config->get('rootHTTP') . ">aquí</a>";
             $message .= "</body>";
             $message .= "</html>";

             $mensage = "<html>
    <head>
        <style type='text/css'>
        #header{
            width: 500px;
            min-height: 60px;
            background-color: dimgrey;
        }

        #header #logo_header{
            width: 50px;
            height: 50px;
            background-size: 100% 100%;
            vertical-align: top;
            display: inline-block;
            padding: 5px;
        }


        #header #titulo_header{
            width: 420px;
            height: 50px;
            vertical-align: top;
            display: inline-block;
            font-size: 50px;
            color: #ffcf00;
            text-shadow: 3px 3px 3px #121212;
        }
        </style>
    </head>
    <body>
        <header id='header'>
            <img id='logo_header' src='assets/template/icon.png'/>
            <div id='titulo_header'><label>IPPARKING</label></div>
        </header>
    </body>
</html>";


             $headers = "MIME-Version: 1.0" . "\r\n";
             $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
             $headers .= 'From: IPParking <ipparking.servicioalcliente@gmail.com>' . "\r\n";
             $headers .= "Reply-To: IPParking <ipparking.servicioalcliente@gmail.com>" . "\r\n";

             $this_mail = mail($to, $subject, $mensage, $headers);

             if ($this_mail) {
                 echo 'Enviado';
             } else {
                 echo error_message;
             }
         }

         public function mail() {
             $this->view->show("public/email.php");
         }

         public function index() {
             $this->view->show("public/index.php");
         }

         public function home() {
             if (AppController::$auth) {
                 $this->view->show("private/cliente/index.php");
             } else {
                 header("location: ?action=index");
             }
         }

         public function perfil() {
             if (AppController::$auth) {
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
                 $this->view->show("public/index.php");
             }
         }

         public function update_avatar() {
             if (AppController::$auth) {
                 $this->usuarioController->update_avatar();
             } else {
                 $this->view->show("public/index.php");
             }
         }

         public function update_portada() {
             if (AppController::$auth) {
                 $this->usuarioController->update_portada();
             } else {
                 $this->view->show("public/index.php");
             }
         }

         public function search_user() {
             if (AppController::$auth) {
                 $this->usuarioController->search_user();
             } else {
                 $this->view->show("public/index.php");
             }
         }

         public function search_email() {
             if (AppController::$auth) {
                 $this->personaController->search_email();
             } else {
                 $this->view->show("public/index.php");
             }
         }

         public function update_user() {
             if (AppController::$auth) {
                 $this->usuarioController->update_user();
             } else {
                 $this->view->show("public/index.php");
             }
         }

         public function form_editar_password() {
             if (AppController::$auth) {
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
                 $this->view->show("public/index.php");
             }
         }

         public function update_password() {
             if (AppController::$auth) {
                 $this->usuarioController->update_password();
             } else {
                 $this->view->show("public/index.php");
             }
         }

         public function parqueaderos() {
             $this->parqueaderoController->parqueaderos();
         }

         public function facturas() {
             if (AppController::$auth) {
                 $this->facturaController->index();
             } else {
                 $this->view->show("public/index.php");
             }
         }

         /*          * ****************** REVISAR ************************* */

         public function formEditarPassword() {
             $config = Config::singleton();
             require_once $config->get("rootFolder") . $config->get("controllersFolder") . "private/administracion/auth/PrivateAppAuthSuperAdminController.php";
             require_once $config->get("rootFolder") . $config->get("controllersFolder") . "AppController.php";
             $usuarioAuth = "";
             $login = "";

             if (AppController::$auth) {
                 $usuarioAuth = AppController::$auth;
             } else if (PrivateAppAuthSuperAdminController::$auth) {
                 $usuarioAuth = PrivateAppAuthSuperAdminController::$auth;
             }

             if ($usuarioAuth !== "") {
                 $this->view->show("private/editarPassword.php");
             } else {
                 $this->view->show("public/home.php");
             }
         }

         public function editarPassword() {
             $config = Config::singleton();

             require_once $config->get("rootFolder") . $config->get("controllersFolder") . "UsuarioController.php";
             $usuario = new UsuarioController;

             $usuario->editarPassword();
         }

         public function editarCliente() {
             $config = Config::singleton();

             require_once $config->get("rootFolder") . $config->get("controllersFolder") . "UsuarioController.php";
             $usuario = new UsuarioController;

             $usuario->editarCliente();
         }

         /*          * ****************** FIN REVISAR ************************* */

         public function contacto() {
             $config = Config::singleton();

             $var["msg"] = @$_REQUEST["msg"];
             $var["status"] = @$_REQUEST["status"];
             $this->view->show("public/contacto.php", $var);
         }

         public function registrarContacto() {
             $config = Config::singleton();
             require_once $config->get("rootFolder") . $config->get("entitiesFolder") . "Contacto.php";
             require_once $config->get("rootFolder") . $config->get("modelsFolder") . "ContactoModel.php";

             $contactoModel = new ContactoModel();
             $r = $contactoModel->get();
             $existe = false;

             foreach ($r->data as $contacto) {
                 $contacto instanceof Contacto;

                 if ($contacto->getConCorreo() === $_POST['conCorreo'] && $contacto->getConEstado() === "NO ATENDIDA") {
                     $existe = true;
                     break;
                 }
             }

             if ($existe) {
                 header("location: ?action=contacto&msg=No se puede registrar el contacto porqué aún no se responde su ultima solicitud.");
             } else {
                 $contacto = new Contacto();
                 $contacto->setConNombre($_POST['conNombre']);
                 $contacto->setConApellido($_POST['conApellido']);
                 $contacto->setConCorreo($_POST['conCorreo']);
                 $contacto->setConTelefono($_POST['conTelefono']);
                 $contacto->setIdAsunto($_POST['idAsunto']);
                 $contacto->setConMensaje($_POST['conMensaje']);

                 $contactoModel = new ContactoModel();
                 $r = $contactoModel->insert($contacto);
                 header("location: ?action=contacto&msg={$r->msg}&status={$r->status}");
             }
         }

         public function mision() {
             $this->view->show("public/mision.php");
         }

         public function vision() {
             $this->view->show("public/vision.php");
         }

         public function politicas() {
             $this->view->show("public/politicas.php");
         }

         public function seguridad() {
             $this->view->show("public/seguridad.php");
         }

         public function servicios() {
             $this->view->show("public/servicios.php");
         }

         public function responsabilidad() {
             $this->view->show("public/responsabilidad.php");
         }

         public function parqueos() {
             if (AppController::$auth) {
                 $this->parqueoController->indexCliente();
             } else {
                 $this->view->show("public/index.php");
             }
         }

         public function datos_parqueo_usuario() {
             if (AppController::$auth) {
                 $this->parqueoController->datosParqueoCliente();
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

     }
     