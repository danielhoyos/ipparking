<?php

class PagoContratoParqueaderoModel implements IModel {

    private $conexion;
    private $table = "tbl_pago_contrato_parqueadero";
    private $nameEntity = "PagoContratoParqueadero";

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
            $obj instanceof PagoContratoParqueadero;
            $sql = "insert into {$this->table} values(null,?,?,?,?,?)";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getCon_id());
            @$query->bindParam(2, $obj->getPcp_fecha_pago());
            @$query->bindParam(3, $obj->getPcp_fecha_inicio_periodo());
            @$query->bindParam(4, $obj->getPcp_fecha_fin_periodo());
            @$query->bindParam(5, $obj->getPcp_valor());
            $query->execute();
            $retorno->status = 200;
            $retorno->msg = "Pago de Contrato de Parqueadero insertado.";
        } catch (PDOException $e) {
            $retorno->msg = $e->getMessage();
            $retorno->status = 501;
        }
        return $retorno;
    }

    public function update($obj) {
        
    }
}