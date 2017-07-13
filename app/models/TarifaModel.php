<?php

     class TarifaModel implements IModel {

         private $conexion;
         private $table = "tbl_tarifa";
         private $nameEntity = "Tarifa";

         function __construct() {
             $this->conexion = SPDO::singleton();
         }

         public function delete($obj) {
             
         }

         public function get($obj = null) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Tarifa;
                 $sql = "SELECT * FROM {$this->table} WHERE par_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getPar_id());
                 $query->execute();

                 $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->nameEntity);
                 $retorno->status = 200;
                 $retorno->msg = "Tarifas encontradas exitosamente";
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }

             return $retorno;
         }

         public function getTarifas() {
             $retorno = new stdClass();

             try {
                 $sql = "SELECT * FROM {$this->table}";
                 $query = $this->conexion->prepare($sql);
                 $query->execute();

                 $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->nameEntity);
                 $retorno->status = 200;
                 $retorno->msg = "Tarifas encontradas exitosamente";
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }

             return $retorno;
         }

         public function getById($obj) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Tarifa;
                 $sql = "SELECT * FROM {$this->table} WHERE tar_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getTar_id());
                 $query->execute();

                 $retorno->data = $query->fetchObject($this->nameEntity);
                 $retorno->status = 200;
                 $retorno->msg = "Tarifa encontrada exitosamente";
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }
             return $retorno;
         }

         public function insert($obj) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Tarifa;

                 $sql = "INSERT INTO {$this->table} VALUES(null, 0, 0, 0, 0, 0, 0, 0, 0 , 0, ?, ?)";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getPar_id());
                 @$query->bindParam(2, $obj->getTiv_id());
                 $query->execute();

                 $retorno->status = 200;
                 $retorno->mgs = "Tarifa Insertada Correctamente";
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->mgs = $e->getMessage();
             }

             return $retorno;
         }

         public function update($obj) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Tarifa;

                 $sql = "UPDATE {$this->table} SET "
                  . "tar_valor_minuto = ?,"
                  . "tar_valor_hora = ?,"
                  . "tar_hora_minima = ?,"
                  . "tar_valor_minima = ?,"
                  . "tar_hora_maxima = ?,"
                  . "tar_valor_maxima = ?,"
                  . "tar_valor_dia = ?,"
                  . "tar_valor_quincena = ?,"
                  . "tar_valor_mes = ? "
                  . "WHERE tar_id = ?;";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getTar_valor_minuto());
                 @$query->bindParam(2, $obj->getTar_valor_hora());
                 @$query->bindParam(3, $obj->getTar_hora_minima());
                 @$query->bindParam(4, $obj->getTar_valor_minima());
                 @$query->bindParam(5, $obj->getTar_hora_maxima());
                 @$query->bindParam(6, $obj->getTar_valor_maxima());
                 @$query->bindParam(7, $obj->getTar_valor_dia());
                 @$query->bindParam(8, $obj->getTar_valor_quincena());
                 @$query->bindParam(9, $obj->getTar_valor_mes());
                 @$query->bindParam(10, $obj->getTar_id());
                 $query->execute();

                 $retorno->status = 200;
                 $retorno->msg = "Tarifa Actualizada Correctamente";
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msh = $e->getMessage();
             }

             return $retorno;
         }

         public function getByTipoVehiculo($obj) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Tarifa;
                 $sql = "SELECT * FROM {$this->table} WHERE par_id = ? AND tiv_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getPar_id());
                 @$query->bindParam(2, $obj->getTiv_id());
                 $query->execute();

                 $retorno->data = $query->fetchObject($this->nameEntity);
                 $retorno->status = 200;
                 $retorno->msg = "Consulta Exitosa";
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }

             return $retorno;
         }

     }