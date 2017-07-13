<?php

class Mail extends PHPMailer {

  private $mailFrom;
  private $mailNameFrom;

  public function __construct($exceptions = null) {
    $config = Config::singleton();
    $this->isSMTP();
    $this->SMTPDebug = $config->get("mailDebug");
    $this->Host = $config->get("mailHost");
    $this->SMTPAuth = $config->get("mailAuth");
    $this->Username = $config->get("mailUsername");
    $this->Password = $config->get("mailPassword");
    $this->SMTPSecure = $config->get("mailSMTPSecure");
    $this->Port = $config->get("mailPort");
    $this->mailFrom = $config->get("mailFrom");
    $this->mailNameFrom = $config->get("mailNameFrom");
    $this->setFrom($this->mailFrom, $this->mailNameFrom);
  }

  public function sendEmail($subject, $body, $recipients = []) {
    $config = Config::singleton();
    $retorno = new stdClass();
    if ($config->get("fireTest")) {
      foreach ($recipients as $usuario) {
        if($usuario instanceof Usuario){
          $this->addAddress($usuario->getPer_correo(), $usuario->getPer_nombre());
        }else{
          $this->addAddress($usuario["email"], $usuario["name"]);
        }
      }

      $this->Subject = $subject;
      $this->Body = $body;
      $this->AltBody = $body;
     
      if ($this->send()) {
        $retorno->status = 200;
        $retorno->msg = "Mensaje enviado con exito";
      } else {
        $retorno->status = 500;
        $retorno->msg = "Mensaje no fue enviado con exito";
      }
      return $retorno;
      
    } else {
      $retorno->status = 200;
      $retorno->msg = "Evitando el envio de correos.";
      return $retorno;
    }
  }
  
  public function sendEmailRegistro($usuario){
    $config = Config::singleton();
    $destinatarios = [$usuario];
        
    $subject = "Registro exitoso en el sistema {$config->get("nameApp")}";
    $body = "<h1>Bienvenido!</h1><br>";
    $body.="Usted puede ingresar al sistema de informacion por el siguiente link {$config->get('rootHTTP')}";
        
    return $this->sendEmail($subject, $body, $destinatarios);
  }
  
  public function sendEmailRestorePassword($usuario){
    $config = Config::singleton();
    $destinatarios = [$usuario];
    $usuario instanceof Usuario;

    $subject = "Contraseña actualizada en el sistema de información {$config->get("nameApp")}";
    $body = "<h1>Contraseña Restaurada!</h1><br>";
    $body.= "<h4>Usuario: {$usuario->getUsu_usuario()}</h4>";
    $body .= "<h4>Contraseña: {$usuario->getUsu_password()}</h4><br>";
    $body.="Usted puede ingresar al sistema de informacion por el siguiente link {$config->get('rootHTTP')}/roles";
    
        
    return $this->sendEmail($subject, $body, $destinatarios);
  }
  
  public function sendEmailRegistroUsuario($usuario){
    $config = Config::singleton();
    $destinatarios = [$usuario];
    $usuario instanceof Usuario;

    $subject = "Registro exitoso en sistema de informacion {$config->get("nameApp")}";
    $body = "<h1>Registro.</h1><br>";
    $body .= "<h4>Usuario: {$usuario->getUsu_usuario()}</h4>";
    $body .= "<h4>Contraseña: {$usuario->getPer_identificacion()}</h4><br>";
    $body .="Usted puede ingresar al sistema de informacion por el siguiente link {$config->get('rootHTTP')}/roles";
    
        
    return $this->sendEmail($subject, $body, $destinatarios);
  }


}
