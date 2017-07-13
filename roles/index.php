<?php
session_start();
require_once "../app/controllers/private/auth/PrivateAppAuthController.php";
PrivateAppAuthController::main();
?>

