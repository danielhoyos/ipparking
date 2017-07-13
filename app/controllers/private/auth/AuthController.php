<?php

class AuthController implements IController {

    private $view;

    public function __construct() {
        $this->view = new View();
    }

    public function index() {
        if (PrivateAppAuthController::$auth) {
            $vars["msg"] = @$_REQUEST["msg"];
            $vars["status"] = @$_REQUEST["status"];

            $user = PrivateAppAuthController::$auth;

            if ($user->rol_id === 1) {
                header("location: gerente/");
            } else if ($user->rol_id === 2) {
                header("location: admin/");
            } else if ($user->rol_id === 3) {
                header("location: empleado/");
            }
        } else {
            $this->view->show("private/auth/index.php");
        }
    }

    public function logout() {
        if (PrivateAppAuthController::$auth) {
            session_destroy();
            $msg = "Sessión cerrada Correctamente. Regrese Pronto";
            $status = 200;
            header("location: ../?msg={$msg}&status={$status}");
        } else {
            $this->view->show("private/auth/index.php");
        }
    }

    public function validarUsuario() {
        $config = Config::singleton();
        require_once $config->get("entitiesFolder") . "Persona.php";
        require_once $config->get("entitiesFolder") . "Usuario.php";
        require_once $config->get("modelsFolder") . "UsuarioModel.php";

        $usuario = new Usuario();
        $usuario->setUsu_usuario($_POST["usu_usuario"]);
        $usuario->setUsu_password($_POST["usu_password"], true);

        $usuarioModel = new UsuarioModel();
        $r = $usuarioModel->validarUsuario($usuario);
        $userAuth = $r->data;
        $userAuth instanceof Usuario;

        if ($r->status == 200 && $userAuth->getUsu_estado() !== Usuario::ESTADO_INACTIVO && $r->data->getRol_id() != 4) {
            $_SESSION[PrivateAppAuthController::$keySession] = json_encode($r->data);
            if ($r->data->getRol_id() === 1) {
                header("location: gerente/");
            } else if ($r->data->getRol_id() === 2) {
                header("location: admin/");
            } else if ($r->data->getRol_id() === 3) {
                header("location: empleado/");
            }
        } else if ($r->status == 200 && $userAuth->getUsu_estado() === Usuario::ESTADO_INACTIVO && $r->data->getRol_id() != 4) {
            $msg = "El Usuario ingresado esta Inactivo. Para Activarlo pongase en contacto con ipparking.servicioalcliente@gmail.com";
            $status = 501;
            header("location: ?msg={$msg}&status={$status}");
        }else {
            header("location: ?msg={$r->msg}&status={$r->status}");
        }
    }

    public function form_restore_password() {
        $vars["msg"] = @$_REQUEST["msg"];
        $vars["status"] = @$_REQUEST["status"];
        $this->view->show("private/auth/restore_password.php", $vars);
    }

    public function validateCaptcha() {
        $config = Config::singleton();
        require_once $config->get("classFolder") . "Captcha.php";
        
        $captcha = Captcha::singleton();
        $r = $captcha->validateSecret($_POST["captcha"]);
        print json_encode($r);
    }

    public function restore_password() {
        $config = Config::singleton();
        require_once $config->get("entitiesFolder") . "Persona.php";
        require_once $config->get("entitiesFolder") . "Usuario.php";
        require_once $config->get("modelsFolder") . "UsuarioModel.php";

        $usuario = new Usuario();
        $usuario->setPer_correo($_POST["correo_restore"]);

        $usuarioModel = new UsuarioModel();
        $r = $usuarioModel->buscarCorreo($usuario);

        if ($r->status === 200) {
            $u = $r->data;
            $u instanceof Usuario;

            if ($u->getUsu_estado() === Usuario::ESTADO_ACTIVO) {
                $usuario->setUsu_password($r->data->per_identificacion, true);
                $usuario->setUsu_id($u->getUsu_id());
                $usuario->setPer_nombre($u->per_nombre);
                $usuario->setUsu_estado(Usuario::ESTADO_PENDIENTE);

                $r = $usuarioModel->resetPassword($usuario);

                $vars["status"] = $r->status;
                if ($r->status === 200) {
                    require_once $config->get("libsFolder") . "PHPMailer-master/PHPMailerAutoload.php";
                    require_once $config->get("classFolder") . "Mail.php";

                    $usuario->setUsu_usuario($u->getUsu_usuario());
                    $usuario->setUsu_password($u->per_identificacion);
                    $mail = new Mail();
                    $remail = $mail->sendEmailRestorePassword($usuario);

                    $vars["msg"] = "Se le envio un e-mail con su nueva contraseña a el siguiente correo: " . $_POST["correo_restore"];
                    $this->view->show("private/auth/index.php", $vars);
                } else {
                    $vars["msg"] = "La contraseña no pudo ser modificada.";
                    $this->view->show("private/auth/restore_password.php", $vars);
                }
            } else if ($u->getUsu_estado() === Usuario::ESTADO_PENDIENTE) {
                $vars["msg"] = "Ya fue enviado un correo con los datos de recuperación de la contraseña.";
                $vars["status"] = 200;
                $this->view->show("private/auth/index.php", $vars);
            } else {
                $vars["msg"] = "El Correo ingresado esta Inactivo. Para Activarlo pongase en contacto con ipparking.servicioalcliente@gmail.com";
                $vars["status"] = 501;
                $this->view->show("private/auth/restore_password.php", $vars);
            }
        } else {
            $vars["msg"] = "El Correo ingresado no esta asociado a ninguna cuenta";
            $vars["status"] = $r->status;
            $this->view->show("private/auth/restore_password.php", $vars);
        }
    }
}