<?php

if(isset($_REQUEST["status"])){
    $status = $_REQUEST["status"];
    $msg = $_REQUEST["msg"];
}

if (isset($status) ) {
  if ($status == 200) {
    ?>
    <div class="custom ui-widget">
      <div class="ui-state-highlight ui-corner-all" style="padding: 0 .7em;">
        <p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
          <strong>Hey!</strong> <?php echo $msg ?></p>
      </div>
    </div>
    <?php
  } else {
    ?>
    <div class="custom ui-widget">
      <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
        <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
          <strong>Alert:</strong> <?php echo $msg ?></p>
      </div>
    </div>
    <?php
  }
}
?>