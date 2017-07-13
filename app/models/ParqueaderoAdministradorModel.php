<?php

class ParqueaderoAdministradorModel implements IModel {

    private $conexion;
    private $table = "tbl_parqueadero_administrador";
    private $nameEntity = "ParqueaderoAdministrador";

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
            $obj instanceof ParqueaderoAdministrador;
            $sql = "INSERT INTO {$this->table} values(null,?,?)";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPar_id());
            @$query->bindParam(2, $obj->getAdm_id());
            $query->execute();

            $retorno->status = 200;
            $retorno->msg = "Registro Insertado Correctamente";
        } catch (Exception $e) {
            $retorno->status = 501;
            $retorno->msg = $e->getMessage();
        }

        return $retorno;
    }

    public function update($obj) {
        
    }

    public function datosParqueaderoAdministrador($obj) {
        $retorno = new stdClass();

        try {
            $obj instanceof ParqueaderoAdministrador;
            $sql = "SELECT * FROM {$this->table} INNER JOIN tbl_parqueadero 
                    on {$this->table}.par_id = tbl_parqueadero.par_id INNER JOIN tbl_contrato_parqueadero 
                    on {$this->table}.par_id = tbl_contrato_parqueadero.par_id INNER JOIN tbl_pago_contrato_parqueadero 
                    on tbl_contrato_parqueadero.con_id = tbl_pago_contrato_parqueadero.con_id WHERE tbl_parqueadero_administrador.adm_id = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getAdm_id());
            $query->execute();

            $retorno->data = $query->fetchObject($this->nameEntity);
            $retorno->status = 200;
            $retorno->msg = "Registro encontrado";
        } catch (Exception $e) {
            $retorno->status = 501;
            $retorno->msg = $e->get_message();
        }

        return $retorno;
    }

    public function getByAdmin($obj) {
        $retorno = new stdClass();

        try {
            $obj instanceof ParqueaderoAdministrador;
            $sql = "SELECT * FROM {$this->table} WHERE adm_id = ? ";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getAdm_id());
            $query->execute();
            
            $retorno->data = $query->fetchObject($this->nameEntity);
            $retorno->status = 200;
            $retorno->msg = "Encontrado Exitosamente";
        } catch (Exception $e) {
            $retorno->status = 501;
            $retorno->msg = $e->getMessage();
        }
        
        return $retorno;
    }
}