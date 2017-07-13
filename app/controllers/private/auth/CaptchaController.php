<?php

class CaptchaController implements IController {
  private $captcha;
  
  public function __construct() {
    $config = Config::singleton();
    require_once $config->get("classFolder")."Captcha.php";
    $this->captcha = Captcha::singleton();
  }
  
  public function index() {
    $this->captcha->renderCaptcha();
  }
}