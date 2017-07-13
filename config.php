<?php
date_default_timezone_set('America/Bogota');
$config = Config::singleton();
$config instanceof Config;

$folderApp = "IPParking";
$config->set("dbhost","localhost");
$config->set("dbname","bds_ipparking");
$config->set("dbuser","root");
$config->set("dbpass","");
$config->set("folderApp",$folderApp);
$config->set("nameApp","IPPARKING");
$config->set("rootFolder",$_SERVER["DOCUMENT_ROOT"]."/{$folderApp}/");
$config->set("controllersFolder", $config->get("rootFolder")."app/controllers/" );
$config->set("modelsFolder",$config->get("rootFolder")."app/models/" );
$config->set("entitiesFolder",$config->get("rootFolder")."app/entities/" );
$config->set("viewsFolder",$config->get("rootFolder")."app/views/" );
$config->set("classFolder",$config->get("rootFolder")."app/class_/" );
$config->set("libsFolder",$config->get("rootFolder")."libs/" );
$config->set("rootHTTP","http://{$_SERVER['HTTP_HOST']}/{$folderApp}/");
$config->set("assetsFolder", $config->get("rootHTTP")."assets/");
$config->set("assetsRootFolder", $config->get("rootFolder")."assets/");
$config->set("facturasFolder", $config->get("rootFolder")."assets/facturas/");
$config->set("facturasHttp", $config->get("rootHTTP")."assets/facturas/");
$config->set("cssFolder", $config->get("rootHTTP")."css/");
$config->set("jsFolder", $config->get("rootHTTP")."js/");

$config->set("mailDebug",0);
$config->set("mailHost","smtp.gmail.com");
$config->set("mailAuth",true);
$config->set("mailUsername","ipparking.servicioalcliente@gmail.com");
$config->set("mailPassword","IPParking1061791895");
$config->set("mailSMTPSecure","ssl");
$config->set("mailPort",465);
$config->set("mailFrom","ipparking.servicioalcliente@gmail.com");
$config->set("mailNameFrom","IPPARKING");

$config->set("fireTest", true);
?>