<?php

class View {

  function __construct() {
    
  }

  public function show($name, $vars = array()) {
    $config = Config::singleton();

    $template = $config->get('viewsFolder') . $name;

    if (file_exists($template) == false) {
      trigger_error('Template `' . $template . '` does not exist.', E_USER_NOTICE);
      return false;
    }
    
    extract($vars);

    include($template);
  }

}

?>