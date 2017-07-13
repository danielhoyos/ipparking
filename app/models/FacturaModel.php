<?php

     class FacturaModel implements IModel {

         private $conexion;
         private $table = "tbl_factura";
         private $entityName = "Factura";

         function __construct() {
             $this->conexion = SPDO::singleton();
         }

         public function delete($obj) {
             
         }

         public function get($obj = null) {
             $retorno = new stdClass();

             try {
                 $sql = "SELECT * FROM {$this->table} INNER JOIN tbl_parqueo "
                  . "ON {$this->table}.pao_id = tbl_parqueo.pao_id INNER JOIN tbl_vehiculo "
                  . "ON tbl_vehiculo.veh_id = tbl_parqueo.veh_id INNER JOIN tbl_usuario "
                  . "ON tbl_parqueo.cliente_id = tbl_usuario.usu_id INNER JOIN tbl_persona "
                  . "ON tbl_persona.per_id = tbl_usuario.per_id "
                  . "ORDER BY (fac_codigo+0) DESC";
                 $query = $this->conexion->prepare($sql);
                 $query->execute();

                 $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->entityName);
                 $retorno->status = 200;
                 $retorno->msg = "Registro de {$this->entityName} Exitosa";
             } catch (Exception $ex) {
                 $retorno->status = 501;
                 $retorno->msg = $ex->getMessage();
             }

             return $retorno;
         }

         public function getById($obj) {
             
         }

         public function insert($obj) {
             $retorno = new stdClass();

             try {
                 $obj instanceof Factura;
                 $sql = "INSERT INTO {$this->table} VALUES(NULL, ?,?,?,?,?,?)";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->getFac_codigo());
                 @$query->bindParam(2, $obj->getFac_fecha_venta());
                 @$query->bindParam(3, $obj->getFac_hora_venta());
                 @$query->bindParam(4, $obj->getFac_valor_total());
                 @$query->bindParam(5, $obj->getPao_id());
                 @$query->bindParam(6, $obj->getFac_pdf());
                 $query->execute();

                 $retorno->status = 200;
                 $retorno->msg = "Registro de {$this->entityName} Exitosa";
             } catch (Exception $ex) {
                 $retorno->status = 501;
                 $retorno->msg = $ex->getMessage();
             }

             return $retorno;
         }

         public function update($obj) {
             
         }

         public function cantidadFacturasParqueadero($par_id) {
             $retorno = new stdClass();

             try {
                 $sql = "SELECT * from tbl_factura INNER JOIN tbl_parqueo "
                  . "ON tbl_parqueo.pao_id = tbl_factura.pao_id INNER JOIN tbl_estacion "
                  . "ON tbl_estacion.est_id = tbl_parqueo.est_id WHERE tbl_estacion.par_id = {$par_id}";

                 $query = $this->conexion->prepare($sql);
                 $query->execute();

                 $retorno->data = $query->rowCount();
                 $retorno->status = 200;
                 $retorno->msg = "Consulta Exitosa";
             } catch (Exception $ex) {
                 $retorno->status = 501;
                 $retorno->msg = $ex->getMessage();
             }

             return $retorno;
         }

         public function facturasUsuario($obj) {
             $retorno = new stdClass();

             try {
                 $sql = "SELECT fac.fac_id, fac.fac_codigo, fac.fac_fecha_venta, fac.fac_hora_venta, fac.fac_pdf, pao.pao_id, pao.pao_fecha_inicio, pao.pao_hora_inicio, pao.pao_fecha_fin, pao.pao_hora_fin, pao.est_id, pao.veh_id, pao.vendedor_id, pao.cliente_id, pao.pao_estado FROM {$this->table} AS fac INNER JOIN tbl_parqueo AS pao ON fac.pao_id = pao.pao_id WHERE pao.cliente_id = ? ORDER BY (fac_codigo+0) DESC";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->cliente_id);
                 $query->execute();

                 $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->entityName);
                 $retorno->status = 200;
                 $retorno->msg = "Registro de {$this->entityName} Exitosa";
             } catch (Exception $ex) {
                 $retorno->status = 501;
                 $retorno->msg = $ex->getMessage();
             }

             return $retorno;
         }

         public function facturasCliente($obj) {
             $retorno = new stdClass();

             try {
                 $sql = "SELECT * FROM {$this->table} AS fac INNER JOIN tbl_parqueo AS pao ON fac.pao_id = pao.pao_id WHERE pao.cliente_id = ? ORDER BY (fac_codigo+0) DESC";
                 $query = $this->conexion->prepare($sql);
                 @$query->bindParam(1, $obj->cliente_id);
                 $query->execute();

                 $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->entityName);
                 $retorno->status = 200;
                 $retorno->msg = "Consulta exitosa";
             } catch (Exception $ex) {
                 $retorno->status = 501;
                 $retorno->msg = $ex->getMessage();
             }

             return $retorno;
         }
     }