<?php

class PrivateAppAdminController {

    public static function verificarAuth() {
        $config = Config::singleton();
        require_once $config->get('controllersFolder') . "private/auth/PrivateAppAuthController.php";

        PrivateAppAuthController::verificarAuth();

        if (!PrivateAppAuthController::$auth) {
            header("location: ../?msg=Inicie sesion&status=501");
        } else {
            if (PrivateAppAuthController::$auth->rol_id !== 2) {
                header("location: ../?msg=No tiene permisos suficientes para ingresar en esta seccion&status=501&rol={PrivateAppAuthController::$auth->rol_id}");
            }
        }
    }

    public static function main() {
        require_once '../../app/class_/Config.php';
        require_once '../../config.php';
        
        self::verificarAuth();
        require_once $config->get('modelsFolder') . "SPDO.php";
        require_once $config->get('viewsFolder') . "View.php";
        require_once $config->get('controllersFolder') . "IController.php";
        require_once $config->get('modelsFolder') . "IModel.php";

        if (PrivateAppAuthController::$auth->usu_estado === "activo") {
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
        } else {
            $controllerName = "IndexController";
            $actionName = "form_editar_password";
            if (@$_GET["action"] === "update_password") {
                $actionName = "update_password";
            }else if(@$_GET["action"] === "logout"){
                $actionName = "logout";
            }
        }
        $controllerPath = $config->get('controllersFolder') . "private/admin/" . $controllerName . '.php';
        
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