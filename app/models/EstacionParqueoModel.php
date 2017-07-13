<?php

     class EstacionParqueoModel implements IModel {

         private $conexion;
         private $table = "tbl_parqueo_estacion";
         private $nameEntity = "EstacionParqueo";

         function __construct() {
             $this->conexion = SPDO::singleton();
         }

         public function get($obj = null) {
             
         }

         public function getByParqueo($obj) {
             $retorno = new stdClass();

             try {
                 $obj instanceof EstacionParqueo;
                 $sql = "SELECT * FROM {$this->table} INNER JOIN tbl_estacion "
                          ."ON {$this->table}.est_id = tbl_estacion.est_id WHERE pao_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getPao_id());
                 $query->execute();

                 $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->nameEntity);
                 $retorno->status = 200;
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }

             return $retorno;
         }

         public function insert($obj) {
             $retorno = new stdClass();

             try {
                 $obj instanceof EstacionParqueo;
                 $sql = "INSERT INTO {$this->table} values(null,?,?)";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getEst_id());
                 @$query->bindParam(2, $obj->getPao_id());
                 $query->execute();

                 $retorno->status = 200;
                 $retorno->msg = "{$this->nameEntity} registrada. ";
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }

             return $retorno;
         }

         public function update($obj) {
             
         }

         public function delete($obj) {
             
         }

         public function getById($obj) {
             
         }

     }