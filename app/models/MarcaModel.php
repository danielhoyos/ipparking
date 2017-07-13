<?php

     class MarcaModel implements IModel {

         private $conexion;
         private $table = "tbl_marca";
         private $nameEntity = "Marca";

         function __construct() {
             $this->conexion = SPDO::singleton();
         }

         public function delete($obj) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Marca;
                 $sql = "DELETE FROM {$this->table} WHERE mar_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getMar_id());
                 $query->execute();

                 $retorno->status = 200;
                 $retorno->msg = "Marca eliminada correctamente.";
             } catch (Exception $ex) {
                 $retorno->status = 501;
                 $retorno->msg = $ex->getMessage();
             }
             return $retorno;
         }

         public function get($obj = null) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Marca;

                 $sql = "SELECT * FROM $this->table";
                 $query = $this->conexion->prepare($sql);
                 $query->execute();
                 $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->nameEntity);
                 $retorno->status = 200;
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
                 $obj instanceof Marca;
                 $sql = "SELECT * FROM {$this->table} WHERE mar_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getMar_id());
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

         public function insert($obj) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Marca;
                 $sql = "INSERT INTO {$this->table} VALUES(NULL,?,?,?)";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getMar_nombre());
                 @$query->bindParam(2, $obj->getMar_avatar());
                 @$query->bindParam(3, $obj->getTiv_id());
                 $query->execute();

                 $retorno->status = 200;
                 $retorno->msg = "Marca registrada exitosamente";
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }

             return $retorno;
         }

         public function update($obj) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Marca;
                 $sql = "UPDATE {$this->table} SET mar_nombre = ?, tiv_id = ? WHERE mar_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getMar_nombre());
                 @$query->bindParam(2, $obj->getTiv_id());
                 @$query->bindParam(3, $obj->getMar_id());
                 $query->execute();

                 $retorno->status = 200;
                 $retorno->msg = "Marca actualizada exitosamente";
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }

             return $retorno;
         }
     }