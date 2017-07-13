<?php

class ParqueoModel implements IModel {

    private $conexion;
    private $table = "tbl_parqueo";
    private $nameEntity = "Parqueo";

    function __construct() {
        $this->conexion = SPDO::singleton();
    }

    public function delete($obj) {
        
    }

    public function get($obj = null) {
        $retorno = new stdClass();
        try {
            $obj instanceof Parqueo;
            $sql = "SELECT * FROM {$this->table}";
            $query = $this->conexion->prepare($sql);
            $query->execute();
            $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->nameEntity);
            $retorno->status = 200;
            $retorno->msg = "Parqueo encontrados.";
        } catch (PDOException $e) {
            $retorno->msg = $e->getMessage();
            $retorno->status = 501;
        }
        return $retorno;
    }

    public function getById($obj) {
        $retorno = new stdClass();
        try {
            $obj instanceof Parqueo;
            $sql = "SELECT * FROM {$this->table} INNER JOIN tbl_vehiculo "
                    . "ON {$this->table}.veh_id = tbl_vehiculo.veh_id INNER JOIN tbl_usuario "
                    . "ON {$this->table}.cliente_id = tbl_usuario.usu_id INNER JOIN tbl_persona "
                    . "ON tbl_usuario.per_id = tbl_persona.per_id "
                    . "WHERE {$this->table}.pao_id = ? ";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPao_id());
            $query->execute();
            $retorno->data = $query->fetchObject($this->nameEntity);
            $retorno->status = 200;
            $retorno->msg = "Datos de Parqueo.";
        } catch (PDOException $e) {
            $retorno->msg = $e->getMessage();
            $retorno->status = 501;
        }
        return $retorno;
    }
    
    public function getParqueoCam($obj) {
        $retorno = new stdClass();
        try {
            $obj instanceof Parqueo;
            $sql = "SELECT * FROM {$this->table} AS pao INNER JOIN tbl_usuario as usu "
                 . "ON pao.cliente_id = usu.usu_id INNER JOIN tbl_estacion AS est "
                 . "ON est.est_id = pao.est_id WHERE pao_estado = ? AND pao.cliente_id = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPao_estado());
            @$query->bindParam(2, $obj->getCliente_id());
            $query->execute();
            $retorno->tam = $query->rowcount();
            $retorno->data = $query->fetchObject($this->nameEntity);
            $retorno->status = 200;
        } catch (PDOException $e) {
            $retorno->msg = $e->getMessage();
            $retorno->status = 501;
        }
        return $retorno;
    }

    public function insert($obj) {
        $retorno = new stdClass();
        try {
            $obj instanceof Parqueo;
            $sql = "INSERT INTO {$this->table} VALUES(null,?,?,?,?,?,?,?,?,?)";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPao_fecha_inicio());
            @$query->bindParam(2, $obj->getPao_hora_inicio());
            @$query->bindParam(3, $obj->getPao_fecha_fin());
            @$query->bindParam(4, $obj->getPao_hora_fin());
            @$query->bindParam(5, $obj->getEst_id());
            @$query->bindParam(6, $obj->getVeh_id());
            @$query->bindParam(7, $obj->getVendedor_id());
            @$query->bindParam(8, $obj->getCliente_id());
            @$query->bindParam(9, $obj->getPao_estado());
            $query->execute();
            $retorno->data = $this->conexion->lastInsertId();
            $retorno->status = 200;
            $retorno->msg = "Parqueo insertado.";
        } catch (PDOException $e) {
            $retorno->msg = $e->getMessage();
            $retorno->status = 501;
        }
        return $retorno;
    }

    public function update($obj) {
        $retorno = new stdClass();
        try {
            $obj instanceof Parqueo;
            $sql = "UPDATE {$this->table} SET pao_fecha_fin = ?, pao_hora_fin = ?, pao_estado = ? "
                 . "WHERE pao_id = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPao_fecha_fin());
            @$query->bindParam(2, $obj->getPao_hora_fin());
            @$query->bindParam(3, $obj->getPao_estado());
            @$query->bindParam(4, $obj->getPao_id());
            $query->execute();
            $retorno->status = 200;
            $retorno->msg = "Parqueo finalizado.";
        } catch (PDOException $e) {
            $retorno->msg = $e->getMessage();
            $retorno->status = 501;
        }
        return $retorno;
    }
}