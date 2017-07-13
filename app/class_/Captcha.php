<?php

class Captcha implements \JsonSerializable {

  private static $instance = null;
  private $secret = "";
  private $cadena = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTWXYZ1234567890";

  const KEY = "captcha";

  private function __construct() {
    if (isset($_SESSION[self::KEY])) {
      $this->secret = $_SESSION[self::KEY];
    } else {
      $this->generateCaptcha();
    }
  }

  public static function singleton() {
    if (self::$instance === null) {
      self::$instance = new Captcha();
    }
    return self::$instance;
  }

  public function generateCaptcha($max = 5) {
    $this->secret = "";
    for ($i = 0; $i < $max; $i++) {
      $rand = rand(0, strlen($this->cadena) - 1);
      $this->secret .= $this->cadena[$rand];
    }
    $_SESSION[self::KEY] = $this->secret;
    return $this->secret;
  }

  public function renderCaptcha() {
    $this->generateCaptcha();
    
    $config = Config::singleton();
    header("Content-Type:image/png");
    $im = imagecreatefrompng($config->get("assetsFolder")."template/captcha.png");
    $alpha = imagecolorallocatealpha($im, 255, 255, 255, 100);
    $negro = imagecolorallocate($im, 0, 0, 0);
    $fuente = $config->get("assetsRootFolder")."fonts/captcha.ttf";
    imagettftext($im, 40, 10, 15, 95, $negro, $fuente, $_SESSION[self::KEY]);
    imagefilledrectangle($im, 0, 0, imagesx($im), imagesy($im), $alpha);
    imagepng($im);
    imagedestroy($im);
  }

  public function validateSecret($value) {
    $retorno = new stdClass();
    
    if($_SESSION[self::KEY] === $value){
      $retorno->status = 200;
      $retorno->msg = "Captcha Correcto";
    }else{
      $retorno->status = 500;
      $retorno->msg = "Captcha incorrecto";
      $retorno->captcha = $this->secret;
    }
    return $retorno;
  }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
