<?php

class AppController {

    public static $auth;
    public static $keySession = "cliente";

    public static function verificarLogin() {
        if (isset($_SESSION[self::$keySession])) {
            self::$auth = json_decode($_SESSION[self::$keySession]);
        } else {
            self::$auth = false;
        }
    }

    public static function main() {
        //Incluimos algunas clases:

        require_once 'app/class_/Config.php'; //de configuracion
        require_once 'config.php'; //Archivo con configuraciones.
        
        self::verificarLogin();
        
        require_once $config->get('modelsFolder') . "SPDO.php";
        require_once $config->get('viewsFolder') . "View.php";
        require_once $config->get('controllersFolder') . "IController.php";
        require_once $config->get('modelsFolder') . "IModel.php"; 
        
        if (!empty($_GET['controller'])) {
            $controllerName = $_GET['controller'] . 'Controller';
        } else {
            $controllerName = "IndexController";
        }

        if (!empty($_GET['action'])) {
            $actionName = $_GET['action'];
        } else {
            $actionName = "index";
        }

        $controllerPath = $config->get('controllersFolder') . $controllerName . '.php';
        
        if (is_file($controllerPath)) {
            require_once $controllerPath;
        } else {
            die("El controlador {$controllerName} no existe - 404 not found");
        }

        if (is_callable(array($controllerName, $actionName)) == false) {
            trigger_error($controllerName . '->' . $actionName . '()  no existe', E_USER_NOTICE);
            return false;
        }
        
        $controller = new $controllerName();
        if ($controller instanceof IController) {
            $controller->$actionName();
        } else {
            die('El objeto no es una instancia de IController');
        }
    }

}
?>