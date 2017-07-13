<?php

     class EstacionModel implements IModel {

         private $conexion;
         private $table = "tbl_estacion";
         private $nameEntity = "Estacion";

         function __construct() {
             $this->conexion = SPDO::singleton();
         }

         public function delete($obj) {
             $retorno = new stdClass();
             try {
                 $obj instanceof Estacion;
                 $sql = "DELETE FROM {$this->table} WHERE par_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getPar_id());
                 $query->execute();
                 $retorno->status = 200;
                 $retorno->msg = "{$this->nameEntity} eliminado";
             } catch (PDOException $e) {
                 $retorno->msg = $e->getMessage();
                 $retorno->status = 501;
             }
             return $retorno;
         }

         public function get($obj = null) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Estacion;
                 $where = "";

                 if ($obj !== null)
                     $where = "WHERE par_id = ?";

                 $sql = "SELECT * FROM {$this->table} {$where}";
                 $query = $this->conexion->prepare($sql);
                 if ($obj !== null)
                     @$query->bindParam(1, $obj->getPar_id());
                 $query->execute();

                 $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->nameEntity);
                 $retorno->status = 200;
                 $retorno->msg = "Estaciones encontrados exitosamente";
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }

             return $retorno;
         }

         public function getById($obj) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Estacion;
                 $sql = "SELECT * FROM {$this->table} WHERE est_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getEst_id());
                 $query->execute();

                 $retorno->data = $query->fetchObject($this->nameEntity);

                 if ($retorno->data instanceof $this->nameEntity) {
                     $retorno->status = 200;
                     $retorno->msg = "Estación encontrada exitosamente";
                 } else {
                     $retorno->status = 201;
                     $retorno->msg = "Estación no encontrada";
                 }
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }

             return $retorno;
         }

         public function getEstacionAccesorio($obj) {
             $retorno = new stdClass();

             try {
                 
                 $limit = 0;
                 if($obj->getEst_tipo() === "llave"){
                     $limit++;
                 }else{
                     $limit = $limit + 2;
                 }
                 
                 $obj instanceof Estacion;
                 $sql = "SELECT * FROM {$this->table} WHERE est_tipo = ? AND est_estado = ? AND par_id = ? LIMIT {$limit}";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getEst_tipo());
                 @$query->bindParam(2, $obj->getEst_estado());
                 @$query->bindParam(3, $obj->getPar_id());
                 $query->execute();
                 $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->nameEntity);

                 if ($retorno->data instanceof $this->nameEntity) {
                     $retorno->status = 200;
                     $retorno->msg = "Estación encontrada exitosamente";
                 } else {
                     $retorno->status = 201;
                     $retorno->msg = "Estación no encontrada";
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
                 $obj instanceof Estacion;
                 $sql = "INSERT INTO {$this->table} values(null,?,?,?,?,?,?)";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getEst_codigo());
                 @$query->bindParam(2, $obj->getEst_tipo());
                 @$query->bindParam(3, $obj->getEst_estado());
                 @$query->bindParam(4, $obj->getCam_id());
                 @$query->bindParam(5, $obj->getTiv_id());
                 @$query->bindParam(6, $obj->getPar_id());
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

         public function updateEstado($obj) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Estacion;
                 $sql = "UPDATE {$this->table} SET est_estado = ? WHERE est_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getEst_estado());
                 @$query->bindParam(2, $obj->getEst_id());
                 $query->execute();

                 $retorno->status = 200;
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }

             return $retorno;
         }
     }