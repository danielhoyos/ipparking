<?php

     class Factura implements \JsonSerializable, Serializable {
         
         private $fac_id;
         private $fac_codigo;
         private $fac_fecha_venta;
         private $fac_hora_venta;
         private $fac_valor_total;
         private $pao_id;
         private $fac_pdf;
         
         function getFac_id() {
             return $this->fac_id;
         }

         function getFac_codigo() {
             return $this->fac_codigo;
         }

         function getFac_fecha_venta() {
             return $this->fac_fecha_venta;
         }

         function getFac_hora_venta() {
             return $this->fac_hora_venta;
         }

         function getFac_valor_total() {
             return $this->fac_valor_total;
         }

         function getPao_id() {
             return $this->pao_id;
         }

         function getFac_pdf() {
             return $this->fac_pdf;
         }

         function setFac_id($fac_id) {
             $this->fac_id = $fac_id;
         }

         function setFac_codigo($fac_codigo) {
             $this->fac_codigo = $fac_codigo;
         }

         function setFac_fecha_venta($fac_fecha_venta) {
             $this->fac_fecha_venta = $fac_fecha_venta;
         }

         function setFac_hora_venta($fac_hora_venta) {
             $this->fac_hora_venta = $fac_hora_venta;
         }

         function setFac_valor_total($fac_valor_total) {
             $this->fac_valor_total = $fac_valor_total;
         }

         function setPao_id($pao_id) {
             $this->pao_id = $pao_id;
         }

         function setFac_pdf($fac_pdf) {
             $this->fac_pdf = $fac_pdf;
         }

         
         public function jsonSerialize() {
             return get_object_vars($this);
         }

         public function serialize() {
             
         }

         public function unserialize($serialized) {
             
         }

     }
     