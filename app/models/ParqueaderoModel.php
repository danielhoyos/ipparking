<?php

class ParqueaderoModel implements IModel {

    private $conexion;
    private $table = "tbl_parqueadero";
    private $nameEntity = "Parqueadero";

    function __construct() {
        $this->conexion = SPDO::singleton();
    }

    public function delete($obj) {
        
    }

    public function get($obj = null) {
        $retorno = new stdClass();

        try {
            $obj instanceof Parqueadero;
            $sql = "SELECT * FROM {$this->table}";
            $query = $this->conexion->prepare($sql);
            $query->execute();

            $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->nameEntity);
            $retorno->status = 200;
            $retorno->msg = "Parqueaderos Encontrados Exitosamente.";
        } catch (Exception $e) {
            $retorno->status = 501;
            $retorno->msg = $e->getMessage();
        }

        return $retorno;
    }

    public function getById($obj) {
        $retorno = new stdClass();

        try {
            $obj instanceof Parqueadero;
            $sql = "SELECT * FROM {$this->table} WHERE par_id = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPar_id());
            $query->execute();

            $retorno->data = $query->fetchObject($this->nameEntity);
            $retorno->status = 200;
            $retorno->msg = "Parqueaderos Exitosamente.";
        } catch (Exception $e) {
            $retorno->status = 501;
            $retorno->msg = $e->getMessage();
        }

        return $retorno;
    }
    
    public function getDatosOcupacion($obj) {
        $retorno = new stdClass();
        try {
            $obj instanceof Parqueadero;
            $sql = "SELECT * FROM tbl_estacion WHERE par_id = ? and est_tipo = 'vehiculo'";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPar_id());
            $query->execute();
            $retorno->estaciones = $query->rowCount();
            
            $sql = "SELECT * FROM tbl_estacion WHERE par_id = ? and est_tipo = 'vehiculo' AND est_estado = 'disponible'";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPar_id());
            $query->execute();
            $retorno->estacionesDisponibles = $query->rowCount();
        } catch (Exception $e) {
            $retorno->status = 501;
            $retorno->msg = $e->getMessage();
        }

        return $retorno;
    }

    public function insert($obj) {
        $retorno = new stdClass();

        try {
            $obj instanceof Parqueadero;
            $sql = "INSERT INTO {$this->table} values(null,?,?,?,?,null,null,null,null,null,?, null)";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPar_nit());
            @$query->bindParam(2, $obj->getPar_nombre());
            @$query->bindParam(3, $obj->getPar_direccion());
            @$query->bindParam(4, $obj->getPar_telefono());
            @$query->bindParam(5, $obj->getPar_fecha_registro());
            $query->execute();
            $id = $this->conexion->lastInsertId();
            $retorno->data = $id;
            $retorno->status = 200;
            $retorno->msg = "{$this->nameEntity} registrado. ";
        } catch (Exception $e) {
            $retorno->status = 501;
            $retorno->msg = $e->getMessage();
        }

        return $retorno;
    }

    public function update($obj) {
        $retorno = new stdClass();

        try {
            $obj instanceof Parqueadero;

            $sql = "UPDATE {$this->table} SET par_nombre = ?, 
                                              par_direccion = ?, 
                                              par_telefono = ?
                                          WHERE par_id = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPar_nombre());
            @$query->bindParam(2, $obj->getPar_direccion());
            @$query->bindParam(3, $obj->getPar_telefono());
            @$query->bindParam(4, $obj->getPar_id());
            $query->execute();

            $retorno->status = 200;
            $retorno->msg = "{$this->nameEntity} actualizado exitosamente...";
        } catch (Exception $e) {
            $retorno->status = 501;
            $retorno->msg = $e->getMessage();
        }
        return $retorno;
    }

    public function getDatosParqueadero($obj) {
        $retorno = new stdClass();

        try {
            $obj instanceof Parqueadero;
            $sql = "SELECT * FROM tbl_persona INNER JOIN tbl_usuario
                    on tbl_persona.per_id = tbl_usuario.per_id INNER JOIN tbl_parqueadero_administrador 
                    on tbl_usuario.usu_id = tbl_parqueadero_administrador.adm_id INNER JOIN tbl_parqueadero 
                    on tbl_parqueadero_administrador.par_id = tbl_parqueadero.par_id INNER JOIN tbl_contrato_parqueadero
                    on tbl_parqueadero.par_id = tbl_contrato_parqueadero.par_id INNER JOIN tbl_pago_contrato_parqueadero 
                    on tbl_contrato_parqueadero.con_id = tbl_pago_contrato_parqueadero.con_id WHERE tbl_parqueadero.par_id = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPar_id());
            $query->execute();

            $retorno->data = $query->fetchObject($this->nameEntity);
            $retorno->status = 200;
            $retorno->msg = "Parqueaderos Exitosamente.";
        } catch (Exception $e) {
            $retorno->status = 501;
            $retorno->msg = $e->getMessage();
        }
        return $retorno;
    }
    
    public function updateAvatar($obj){
        $retorno = new stdClass();

        try {
            $obj instanceof Parqueadero;

            $sql = "UPDATE {$this->table} SET par_avatar = ? WHERE par_id = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPar_avatar());
            @$query->bindParam(2, $obj->getPar_id());
            $query->execute();

            $retorno->status = 200;
            $retorno->msg = "Avatar de parqueadero actualizado exitosamente...";
        } catch (Exception $e) {
            $retorno->status = 501;
            $retorno->msg = $e->getMessage();
        }
        return $retorno;
    }
}