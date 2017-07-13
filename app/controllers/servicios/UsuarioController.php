<?php

class UsuarioController implements IController {

    private $view;
    private $config;
    private $captcha;

    function __construct() {
        $this->config = Config::singleton();
        $this->view = new View();

        require_once $this->config->get("classFolder") . "Captcha.php";
        $this->captcha = Captcha::singleton();
    }

    public function index() {
        
    }

    public function validarCliente() {
        $config = Config::singleton();
        require_once $config->get("entitiesFolder") . "Persona.php";
        require_once $config->get("entitiesFolder") . "Usuario.php";
        require_once $config->get("modelsFolder") . "UsuarioModel.php";

        $usuario = new Usuario();
        $usuario->setUsu_usuario(@$_REQUEST["user"]);
        $usuario->setUsu_password(@$_REQUEST["pass"], true);

        $usuarioModel = new UsuarioModel();
        $r = $usuarioModel->validarUsuario($usuario);
        print json_encode($r->data);
    }
    
    public function captcha(){
        $r = $this->captcha->generateCaptcha();
        print $r;
    }
    
    public function restore_password() {
        $config = Config::singleton();
        require_once $config->get("entitiesFolder") . "Persona.php";
        require_once $config->get("entitiesFolder") . "Usuario.php";
        require_once $config->get("modelsFolder") . "UsuarioModel.php";

        $usuario = new Usuario();
        $usuario->setPer_correo($_REQUEST["correo_restore"]);

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

                    print "Se le envio un e-mail con su nueva contraseña a el siguiente correo: " . $_REQUEST["correo_restore"];
                } else {
                    print "La contraseña no pudo ser modificada.";
                }
            } else if ($u->getUsu_estado() === Usuario::ESTADO_PENDIENTE) {
                print "Ya fue enviado un correo con los datos de recuperación de la contraseña.";
            } else {
                print "El Correo ingresado esta Inactivo. Para Activarlo pongase en contacto con ipparking.servicioalcliente@gmail.com";
            }
        } else {
            print "El Correo ingresado no esta asociado a ninguna cuenta";
        }
    }

}
