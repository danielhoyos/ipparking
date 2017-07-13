<?php
session_start();
require_once "../../app/controllers/private/admin/PrivateAppAdminController.php";
PrivateAppAdminController::main();