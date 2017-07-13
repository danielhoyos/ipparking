<?php

class NovedadController implements IController {

    private $config;
    private $view;

    function __construct() {
        $this->config = Config::singleton();
        $this->view = new View();
        require_once $this->config->get("entitiesFolder") . "Novedad.php";
        require_once $this->config->get("modelsFolder") . "NovedadModel.php";
    }

    public function index() {
        
    }

    public function insertNovedad() {
        $novedad = new Novedad();
        $novedadModel = new NovedadModel();

        $novedad->setNov_nombre($_POST["nov_nombre"]);
        $novedad->setNov_apellido($_POST["nov_apellido"]);
        $novedad->setNov_correo($_POST["nov_correo"]);
        $novedad->setNov_telefono($_POST["nov_telefono"]);
        $novedad->setNov_asunto($_POST["nov_asunto"]);
        $novedad->setNov_mensaje($_POST["nov_mensaje"]);
        $novedad->setNov_estado(Novedad::ESTADO_PENDIENTE);

        $r = $novedadModel->insert($novedad);

        if($r->status === 200){
            $vars["msg"] = $r->msg . "Por favor espere su respuesta por medio del correo: {$_POST["nov_correo"]} o por su teléfono";
        }else{
            $vars["msg"] = $r->msg;
        }
        
        $vars["status"] = $r->status;
        $this->view->show("public/contacto.php", $vars);
    }

}
