<?php

class TiempoContratoParqueaderoModel implements IModel {

    private $conexion;
    private $table = "tbl_tiempo_contrato_parqueadero";
    private $nameEntity = "TiempoContratoParqueadero";

    function __construct() {
        $this->conexion = SPDO::singleton();
    }

    public function delete($obj) {
        
    }

    public function get($obj = null) {
        $retorno = new stdClass();

        try {
            $sql = "SELECT * FROM {$this->table}";
            $query = $this->conexion->prepare($sql);
            $query->execute();
            $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->nameEntity);
            $retorno->status = 200;
            $retorno->mgs = "Consulta exitosa";
        } catch (Exception $e) {
            $retorno->status = 501;
            $retorno->mgs = $e->getMessage();
        }
        return $retorno;
    }

    public function getById($obj) {
        $retorno = new stdClass();
        try {
            $obj instanceof TiempoContratoParqueadero;
            $sql = "SELECT *  FROM {$this->table} WHERE tcp_id = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getTcp_id());
            $query->execute();
            $retorno->data = $query->fetchObject($this->nameEntity);
            $retorno->status = 200;
            $retorno->msg = "Registro encontrado";
            if (!$retorno->data instanceof $this->nameEntity) {
                $retorno->status = 201;
                $retorno->msg = "{$this->nameEntity} no encontrado";
            }
        } catch (PDOException $e) {
            $retorno->msg = $e->getMessage();
            $retorno->status = 501;
        }
        return $retorno;
    }

    public function insert($obj) {
        
    }

    public function update($obj) {
        
    }
    
    public function contratosParqueaderos(){
        $retorno = new stdClass();
        
        try{
            $sql = "SELECT pcp.pcp_fecha_pago, pcp.pcp_fecha_inicio_periodo, pcp.pcp_fecha_fin_periodo, pcp.pcp_valor, "
                 . "par.par_nombre FROM tbl_contrato_parqueadero AS cp INNER JOIN tbl_pago_contrato_parqueadero AS pcp "
                 . "ON cp.con_id = pcp.con_id INNER JOIN tbl_parqueadero AS par ON par.par_id = cp.par_id";
            
            $query = $this->conexion->prepare($sql);
            $query->execute();
            
            $retorno->data = $query->fetchAll();
            $retorno->status = 200;
            $retorno->msg = "Datos de contratos de parqueaderos";
        } catch (Exception $ex) {
            $retorno->msg = $ex->getMessage();
            $retorno->status = 501;
        }
        
        return $retorno;
    }
}