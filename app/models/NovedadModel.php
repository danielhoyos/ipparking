<?php

class NovedadModel implements IModel {

    private $conexion;
    private $table = "tbl_novedad";
    private $nameEntity = "Novedad";

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
            $obj instanceof Novedad;
            $sql = "INSERT INTO {$this->table} values(null,?,?,?,?,?,?,?,null)";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getNov_nombre());
            @$query->bindParam(2, $obj->getNov_apellido());
            @$query->bindParam(3, $obj->getNov_correo());
            @$query->bindParam(4, $obj->getNov_telefono());
            @$query->bindParam(5, $obj->getNov_asunto());
            @$query->bindParam(6, $obj->getNov_mensaje());
            @$query->bindParam(7, $obj->getNov_estado());
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
}