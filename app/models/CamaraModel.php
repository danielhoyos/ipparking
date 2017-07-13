<?php

     class CamaraModel implements IModel {

         private $conexion;
         private $table = "tbl_camara";
         private $nameEntity = "Camara";

         function __construct() {
             $this->conexion = SPDO::singleton();
         }

         public function delete($obj) {
             
         }

         public function get($obj = null) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Camara;

                 $where = "";

                 if ($obj !== null) {
                     $where = "WHERE par_id = {$obj->getPar_id()}";
                 }

                 $sql = "SELECT * FROM {$this->table} {$where}";
                 $query = $this->conexion->prepare($sql);
                 $query->execute();

                 $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->nameEntity);
                 $retorno->status = 200;
                 $retorno->msg = "Camaras Encontradas";
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }

             return $retorno;
         }

         public function getById($obj) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Camara;
                 $sql = "SELECT * FROM {$this->table} WHERE cam_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getCam_id());
                 $query->execute();

                 $retorno->data = $query->fetchObject($this->nameEntity);
                 
                 if($retorno->data instanceof $this->nameEntity){
                     $retorno->status = 200;
                 }else{
                     $retorno->status = 201;
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
                 $obj instanceof Camara;

                 $sql = "INSERT INTO {$this->table} VALUES(null, ?, ?, ?, ?, ?, ?)";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getCam_nombre());
                 @$query->bindParam(2, $obj->getCam_ip());
                 @$query->bindParam(3, $obj->getCam_puerto());
                 @$query->bindParam(4, $obj->getCam_usuario());
                 @$query->bindParam(5, $obj->getCam_password());
                 @$query->bindParam(6, $obj->getPar_id());
                 $query->execute();

                 $retorno->status = 200;
                 $retorno->msg = "Camara Registrada Exitosamente";
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }

             return $retorno;
         }

         public function update($obj) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Camara;

                 $sql = "UPDATE {$this->table}  SET cam_nombre = ?, "
                                                                    . "cam_ip = ?, "
                                                                    . "cam_puerto = ?, "
                                                                    . "cam_usuario = ?, "
                                                                    . "cam_password = ? "
                                                                    . "WHERE cam_id = ?";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getCam_nombre());
                 @$query->bindParam(2, $obj->getCam_ip());
                 @$query->bindParam(3, $obj->getCam_puerto());
                 @$query->bindParam(4, $obj->getCam_usuario());
                 @$query->bindParam(5, $obj->getCam_password());
                 @$query->bindParam(6, $obj->getCam_id());
                 @$query->execute();

                 $retorno->status = 200;
                 $retorno->msg = "Camara Actualizada Exitosamente";
             } catch (Exception $e) {
                 $retorno->status = 501;
                 $retorno->msg = $e->getMessage();
             }

             return $retorno;
         }
     }