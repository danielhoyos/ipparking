<?php

     class MarcaController implements IController {

         private $config;
         private $view;

         function __construct() {
             $this->config = Config::singleton();
             $this->view = new View();
         }

         public function index() {
             if (PrivateAppAuthController::$auth) {
                 require_once "{$this->config->get("entitiesFolder")}Marca.php";
                 require_once "{$this->config->get("entitiesFolder")}TipoVehiculo.php";
                 require_once "{$this->config->get("modelsFolder")}MarcaModel.php";
                 require_once "{$this->config->get("modelsFolder")}TipoVehiculoModel.php";
                 $marcaModel = new MarcaModel();
                 $tivModel = new TipoVehiculoModel();

                 $vars["marcas"] = $marcaModel->get();
                 $vars["tiposVehiculos"] = $tivModel->get();
                 $this->view->show("private/gerente/marcas.php", $vars);
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function eliminarMarca() {
             if (PrivateAppAuthController::$auth) {
                 require_once "{$this->config->get("entitiesFolder")}Marca.php";
                 require_once "{$this->config->get("modelsFolder")}MarcaModel.php";

                 $marca = new Marca();
                 $marcaModel = new MarcaModel();

                 $marca->setMar_id(base64_decode($_REQUEST["token"]));
                 $respuesta = $marcaModel->delete($marca);

                 header("location: ?action=marcas&msg={$respuesta->msg}&status={$respuesta->status}");
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function datosMarca() {
             if (PrivateAppAuthController::$auth) {
                 require_once "{$this->config->get("entitiesFolder")}Marca.php";
                 require_once "{$this->config->get("modelsFolder")}MarcaModel.php";
                 require_once "{$this->config->get("entitiesFolder")}TipoVehiculo.php";
                 require_once "{$this->config->get("modelsFolder")}TipoVehiculoModel.php";

                 $marca = new Marca();
                 $marcaModel = new MarcaModel();
                 
                 $tivModel = new TipoVehiculoModel();
                 $tiposVehiculos = $tivModel->get();

                 $marca->setMar_id($_POST["mar_id"]);
                 $respuesta = $marcaModel->getById($marca);

                 $vars["marca"] = $respuesta->data;
                 $vars["vehiculos"] = $tiposVehiculos->data;
                 echo json_encode($vars);
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function insert() {
             if (PrivateAppAuthController::$auth) {
                 require_once "{$this->config->get("entitiesFolder")}Marca.php";
                 require_once "{$this->config->get("modelsFolder")}MarcaModel.php";

                 $marca = new Marca();
                 $marcaModel = new MarcaModel();
                 $nombreAvatar = "";

                 if ($_FILES["mar_avatar"]["name"] === "") {
                     $nombreAvatar = "default_marca.png";
                 } else {
                     $array_nombre = explode(".", $_FILES["mar_avatar"]["name"]);
                     $tam = count($array_nombre);
                     $ext = $array_nombre[$tam - 1];

                     $nombreAvatar = $_POST["mar_nombre"] . "." . $ext;
                     $path = $this->config->get("assetsRootFolder") . "marcas/$nombreAvatar";

                     move_uploaded_file($_FILES["mar_avatar"]["tmp_name"], $path);
                 }

                 $marca->setMar_avatar($nombreAvatar);
                 $marca->setMar_nombre($_POST["mar_nombre"]);
                 $marca->setTiv_id($_POST["tiv_id"]);
                 $respuesta = $marcaModel->insert($marca);

                 header("location: ?action=marcas&msg={$respuesta->msg}&status={$respuesta->status}");
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }

         public function update() {
             if (PrivateAppAuthController::$auth) {
                 require_once "{$this->config->get("entitiesFolder")}Marca.php";
                 require_once "{$this->config->get("modelsFolder")}MarcaModel.php";

                 $marca = new Marca();
                 $marcaModel = new MarcaModel();
                 
                 $marca->setMar_id($_POST["mar_id_update"]);
                 $marca->setMar_nombre($_POST["mar_nombre_update"]);
                 $marca->setTiv_id($_POST["tiv_id_update"]);
                 $respuesta = $marcaModel->update($marca);

                 header("location: ?action=marcas&msg={$respuesta->msg}&status={$respuesta->status}");
             } else {
                 $this->view->show("private/auth/index.php");
             }
         }
     }