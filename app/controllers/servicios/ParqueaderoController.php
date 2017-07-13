<?php

     class ParqueaderoController implements IController {

         private $view;
         private $config;

         function __construct() {
             $this->config = Config::singleton();
             $this->view = new View();
         }

         public function index() {
             require_once "{$this->config->get("entitiesFolder")}Parqueadero.php";
             require_once "{$this->config->get("modelsFolder")}ParqueaderoModel.php";

             $parqueaderoModel = new ParqueaderoModel();

             $parqueaderos = $parqueaderoModel->get();
             $datosParqueadero = $parqueaderos->data;

             for ($i = 0; $i < count($datosParqueadero); $i++) {
                 $datosParqueadero instanceof Parqueadero;

                 $direccion = str_replace(" ", "+", $datosParqueadero[$i]->getPar_direccion());
                 $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $direccion . ",Popayán,Cauca,Colombia&key=AIzaSyA0pxOsW84bUJ4_L4qNl11PjFwkVwusNFE";
                 $json = file_get_contents($url);
                 $par = json_decode($json);
                 $parqueaderos->data[$i]->par_latitud = $par->results[0]->geometry->location->lat;
                 $parqueaderos->data[$i]->par_longitud = $par->results[0]->geometry->location->lng;
             }

             print json_encode($parqueaderos->data);
         }

         public function ocupacion() {
             require_once "{$this->config->get("entitiesFolder")}Parqueadero.php";
             require_once "{$this->config->get("modelsFolder")}ParqueaderoModel.php";

             $parqueadero = new Parqueadero();
             $parqueaderoModel = new ParqueaderoModel();

             $parqueadero->setPar_id($_REQUEST["parqueadero"]);
             $r = $parqueaderoModel->getDatosOcupacion($parqueadero);

             echo json_encode($r);
         }

         public function camaras() {
             require_once "{$this->config->get("entitiesFolder")}Parqueo.php";
             require_once "{$this->config->get("modelsFolder")}ParqueoModel.php";
             require_once "{$this->config->get("entitiesFolder")}Camara.php";
             require_once "{$this->config->get("modelsFolder")}CamaraModel.php";

             $parqueo = new Parqueo();
             $parqueoModel = new ParqueoModel();

             $parqueo->setCliente_id($_REQUEST["cliente_id"]);
             $parqueo->setPao_estado("activo");

             $r = $parqueoModel->getParqueoCam($parqueo);

             if ($r->tam === 0) {
                 print "false";
             } else {
                 $cam_id = $r->data->cam_id;
                 $camara = new Camara();
                 $camaraModel = new CamaraModel();

                 $camara->setCam_id($cam_id);
                 $datos = $camaraModel->getById($camara);
                 print json_encode($datos->data);
             }
         }

         public function datosParqueo() {
             require_once "{$this->config->get("entitiesFolder")}Parqueo.php";
             require_once "{$this->config->get("modelsFolder")}ParqueoModel.php";
             require_once "{$this->config->get("entitiesFolder")}Camara.php";
             require_once "{$this->config->get("modelsFolder")}CamaraModel.php";

             $parqueo = new Parqueo();
             $parqueoModel = new ParqueoModel();

             $parqueo->setCliente_id($_REQUEST["cliente_id"]);
             $parqueo->setPao_estado("activo");

             $r = $parqueoModel->getParqueoCam($parqueo);
             
             print json_encode($r->data);
         }

         public function facturasUsuario(){
            require_once "{$this->config->get("entitiesFolder")}Factura.php";
            require_once "{$this->config->get("modelsFolder")}FacturaModel.php";

            $factura = new stdClass();
            $facturaModel = new FacturaModel();
            $factura->cliente_id = $_REQUEST["cliente_id"];
            $r = $facturaModel->facturasUsuario($factura);

            if(count($r->data) === 0){
                print "false";
            }else{
                print json_encode($r->data);
            }
         }
     }