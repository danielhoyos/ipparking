<?php

     class VehiculoModel implements IModel {

         private $conexion;
         private $table = "tbl_vehiculo";
         private $nameEntity = "Vehiculo";

         function __construct() {
             $this->conexion = SPDO::singleton();
         }

         public function delete($obj) {
             
         }

         public function get($obj = null) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Vehiculo;
                 $where = "";
                 if ($obj != null) {
                     $where = "WHERE veh_placa = '{$obj->getVeh_placa()}'";
                 }
                 $sql = "SELECT * FROM {$this->table} INNER JOIN tbl_tipo_vehiculo ON {$this->table}.tiv_id = tbl_tipo_vehiculo.tiv_id {$where}";
                 $query = $this->conexion->prepare($sql);
                 $query->execute();

                 if ($obj != null) {
                     $retorno->data = $query->fetchObject($this->nameEntity);
                 } else {
                     $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->nameEntity);
                 }

                 if ($retorno->data instanceof $this->nameEntity) {
                     $retorno->status = 200;
                 } else {
                     $retorno->status = 201;
                 }
                 $retorno->msg = "Consulta Exitosa";
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }

             return $retorno;
         }

         public function getById($obj) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Vehiculo;
                 $sql = "SELECT * FROM {$this->table} WHERE veh_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getVeh_id());
                 $query->execute();

                 $retorno->data = $query->fetchObject($this->nameEntity);

                 if ($retorno->data instanceof $this->nameEntity) {
                     $retorno->status = 200;
                     $retorno->msg = "Vehiculo registrado";
                 } else {
                     $retorno->status = 201;
                     $retorno->msg = "Vehiculo no registrado";
                 }
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }

             return $retorno;
         }

         public function insert($obj) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Vehiculo;
                 $sql = "INSERT INTO {$this->table} VALUES(null,?,?,?,?)";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getVeh_placa());
                 @$query->bindParam(2, $obj->getVeh_color());
                 @$query->bindParam(3, $obj->getMar_id());
                 @$query->bindParam(4, $obj->getTiv_id());
                 $query->execute();
                 $retorno->data = $this->conexion->lastInsertId();
                 $retorno->status = 200;
                 $retorno->msg = "Vehiculo registrado exitosamente";
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }
             return $retorno;
         }

         public function update($obj) {
             
         }
     }