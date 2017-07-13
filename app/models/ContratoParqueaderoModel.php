<?php

     class ContratoParqueaderoModel implements IModel {

         private $conexion;
         private $table = "tbl_contrato_parqueadero";
         private $nameEntity = "ContratoParqueadero";

         function __construct() {
             $this->conexion = SPDO::singleton();
         }

         public function delete($obj) {
             
         }

         public function get($obj = null) {
             
         }

         public function getById($obj) {
             
         }

         public function insert($obj) {
             $retorno = new stdClass();
             try {
                 $obj instanceof ContratoParqueadero;
                 $sql = "insert into {$this->table} values(null,?,?,?)";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getTcp_id());
                 @$query->bindParam(2, $obj->getCon_descripcion());
                 @$query->bindParam(3, $obj->getPar_id());
                 $query->execute();
                 $id = $this->conexion->lastInsertId();
                 $retorno->data = $id;
                 $retorno->status = 200;
                 $retorno->msg = "Contrato de Parqueadero insertado.";
             } catch (PDOException $e) {
                 $retorno->msg = $e->getMessage();
                 $retorno->status = 501;
             }
             return $retorno;
         }

         public function update($obj) {
             
         }
     }