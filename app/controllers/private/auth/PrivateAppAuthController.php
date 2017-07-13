<?php

class PrivateAppAuthController {

  public static $auth;
  public static $keySession = "usuario";

  public static function verificarAuth() {
    if (isset($_SESSION[self::$keySession])) {
      self::$auth = json_decode($_SESSION[self::$keySession]);
    } else {
      self::$auth = false;
    }
  }

  public static function main() {
      require_once "../app/class_/Config.php";
      require_once "../config.php"; 
    
    self::verificarAuth();
    
    require_once $config->get("modelsFolder") . "SPDO.php"; 
    require_once $config->get("viewsFolder") . "View.php"; 
    require_once $config->get("controllersFolder") . "IController.php";
    require_once $config->get("modelsFolder") . "IModel.php";
    
    if (!empty($_GET["controller"])) {
      $controllerName = $_GET["controller"] . "Controller";
    } else {
      $controllerName = "AuthController";
    }

    if (!empty($_GET["action"])) {
      $actionName = $_GET["action"];
    } else {
      $actionName = "index";
    }

    $controllerPath = $config->get("controllersFolder") ."private/auth/". $controllerName . '.php';

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