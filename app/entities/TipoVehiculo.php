<?php

     class TipoVehiculo implements \JsonSerializable {

         private $tiv_id;
         private $tiv_nombre;

         function getTiv_id() {
             return $this->tiv_id;
         }

         function getTiv_nombre() {
             return $this->tiv_nombre;
         }

         function setTiv_id($tiv_id) {
             $this->tiv_id = $tiv_id;
         }

         function setTiv_nombre($tiv_nombre) {
             $this->tiv_nombre = $tiv_nombre;
         }

         public function jsonSerialize() {
             return get_object_vars($this);
         }

     }
     