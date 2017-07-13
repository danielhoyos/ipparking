<?php

     class Camara implements \JsonSerializable {

         private $cam_id;
         private $cam_nombre;
         private $cam_ip;
         private $cam_puerto;
         private $cam_usuario;
         private $cam_password;
         private $par_id;

         function getCam_id() {
             return $this->cam_id;
         }

         function getCam_nombre() {
             return $this->cam_nombre;
         }

         function getCam_ip() {
             return $this->cam_ip;
         }

         function getCam_puerto() {
             return $this->cam_puerto;
         }

         function getCam_usuario() {
             return $this->cam_usuario;
         }

         function getCam_password() {
             return $this->cam_password;
         }

         function getPar_id() {
             return $this->par_id;
         }

         function setCam_id($cam_id) {
             $this->cam_id = $cam_id;
         }

         function setCam_nombre($cam_nombre) {
             $this->cam_nombre = $cam_nombre;
         }

         function setCam_ip($cam_ip) {
             $this->cam_ip = $cam_ip;
         }

         function setCam_puerto($cam_puerto) {
             $this->cam_puerto = $cam_puerto;
         }

         function setCam_usuario($cam_usuario) {
             $this->cam_usuario = $cam_usuario;
         }

         function setCam_password($cam_password) {
             $this->cam_password = $cam_password;
         }

         function setPar_id($par_id) {
             $this->par_id = $par_id;
         }
         
         public function jsonSerialize() {
             return get_object_vars($this);
         }

     }
     