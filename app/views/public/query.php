<?php
  $config = Config::singleton();
?>

<html>
  <head>
    <script src="<?php echo $config->get("jsFolder")."/lib/jquery.js" ?>" ></script>
    <script src="<?php echo $config->get("jsFolder")."lib/jqueryui/jquery-ui.min.js" ?>" ></script>
  </head>

  <body>
    <?php 
    if(isset($datos)){
        echo "<pre>";
        print_r($datos);

        echo $datos;
    }
    ?>
    <form action="?controller=Index&action=insertQuery" method="POST">
      <label>Ingrese la consulta: </label><br>
      <textarea name="query" id="query" rows="10" cols="50"></textarea><br><br>

      <button id="enviarConsulta">Enviar</button>
    </form>
  </body>
</html>