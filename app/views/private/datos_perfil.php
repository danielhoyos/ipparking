<?php

     require_once "{$config->get("controllersFolder")}private/auth/PrivateAppAuthController.php";
     require_once "{$config->get("controllersFolder")}AppController.php";

     if (PrivateAppAuthController::$auth) {
         $user = PrivateAppAuthController::$auth;
     } else if (AppController::$auth) {
         $user = AppController::$auth;
     }

     $user instanceof Usuario;
     $array_nombre = explode(" ", $user->per_nombre);
     $nombre = $array_nombre[0];

     $portada = "";
     $avatar = "";
     $rol = "";

     if ($user->usu_portada !== null) {
         $path = $config->get("assetsFolder") . "portadas/" . $user->usu_portada;

         $url = get_headers($path);
         $string = $url[0];
         if (strpos($string, "200")) {
             $portada = $path;
         }
     } else {
         $portada = $config->get("assetsFolder") . "portadas/portada.jpg";
     }

     if ($user->usu_avatar !== null) {
         $path = $config->get("assetsFolder") . "avatar/" . $user->usu_avatar;
         $url = get_headers($path);
         $string = $url[0];
         if (strpos($string, "200")) {
             $avatar = $path;
         }
     } else {
         $avatar = $config->get("assetsFolder") . "avatar/avatar.png";
     }

     foreach ($roles as $r) {
         $r instanceof Rol;

         if ($r->getRol_id() == $user->rol_id) {
             $rol = $r->getRol_nombre();
         }
     }