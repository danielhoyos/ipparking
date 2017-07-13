<?php

     class EstacionParqueo implements \JsonSerializable {

         private $paes_id;
         private $est_id;
         private $pao_id;

         function getPaes_id() {
             return $this->paes_id;
         }

         function getEst_id() {
             return $this->est_id;
         }

         function getPao_id() {
             return $this->pao_id;
         }

         function setPaes_id($paes_id) {
             $this->paes_id = $paes_id;
         }

         function setEst_id($est_id) {
             $this->est_id = $est_id;
         }

         function setPao_id($pao_id) {
             $this->pao_id = $pao_id;
         }

         public function jsonSerialize() {
             return get_object_vars($this);
         }

     }
     