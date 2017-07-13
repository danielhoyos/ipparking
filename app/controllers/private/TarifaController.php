<?php

class TarifaController implements IController {

    private $view;
    private $config;

    function __construct() {
        $this->config = Config::singleton();

        $this->view = new View();
    }

    public function index($msg = null, $status = null) {
        require_once $this->config->get("entitiesFolder") . "ParqueaderoAdministrador.php";
        require_once $this->config->get("modelsFolder") . "ParqueaderoAdministradorModel.php";

        require_once $this->config->get("entitiesFolder") . "Tarifa.php";
        require_once $this->config->get("modelsFolder") . "TarifaModel.php";

        $user = PrivateAppAuthController::$auth;
        $user instanceof Usuario;

        $parqueadero_admin = new ParqueaderoAdministrador();
        $parqueadero_admin->setAdm_id($user->usu_id);

        $parquedero_admin_model = new ParqueaderoAdministradorModel();
        $retorno_parqueadero_admin = $parquedero_admin_model->datosParqueaderoAdministrador($parqueadero_admin);
        $info_parqueadero = $retorno_parqueadero_admin->data;
        $info_parqueadero instanceof ParqueaderoAdministrador;

        $tarifas = new Tarifa();
        $tarifasModel = new TarifaModel();

        $tarifas->setPar_id($info_parqueadero->getPar_id());
        $retorno_tarifas = $tarifasModel->get($tarifas);

        if($msg !== null && $status !== null){
            $vars["msg"] = $msg;
            $vars["status"] = $status;
        }
        $vars["tarifas"] = $retorno_tarifas->data;
        $this->view->show("private/admin/tarifas/tarifas.php", $vars);
    }
    
    public function tarifasById(){
        require_once $this->config->get("entitiesFolder") . "Tarifa.php";
        require_once $this->config->get("modelsFolder") . "TarifaModel.php";
        
        $tarifa = new Tarifa();
        $tarifa->setTar_id($_POST["tar_id"]);
        $tarifaModel = new TarifaModel();
        $retorno_tarifa = $tarifaModel->getById($tarifa);
        
        echo json_encode($retorno_tarifa);
    }
    
    public function update_tarifa(){
        require_once $this->config->get("entitiesFolder") . "Tarifa.php";
        require_once $this->config->get("modelsFolder") . "TarifaModel.php";
        
        $tarifa = new Tarifa();
        $tarifaModel = new TarifaModel();
        
        $tarifa->setTar_id($_POST["tar_id"]);
        $tarifa->setTar_valor_minuto($_POST["tar_valor_minuto"]);
        $tarifa->setTar_valor_hora($_POST["tar_valor_hora"]);
        $tarifa->setTar_hora_minima($_POST["tar_hora_minima"]);
        $tarifa->setTar_valor_minima($_POST["tar_valor_minima"]);
        $tarifa->setTar_hora_maxima($_POST["tar_hora_maxima"]);
        $tarifa->setTar_valor_maxima($_POST["tar_valor_maxima"]);
        $tarifa->setTar_valor_dia($_POST["tar_valor_dia"]);
        $tarifa->setTar_valor_quincena($_POST["tar_valor_quincena"]);
        $tarifa->setTar_valor_mes($_POST["tar_valor_mes"]);
        
        $retorno_tarifa = $tarifaModel->update($tarifa);
        $this->index($retorno_tarifa->msg, $retorno_tarifa->status);
    }
}