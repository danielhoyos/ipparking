<?php

class PersonaModel implements IModel {

    private $conexion;
    private $table = "tbl_persona";
    private $nameEntity = "Persona";

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
            $obj instanceof Persona;
            if ($obj->getPer_correo() === null)
                $sql = "INSERT INTO {$this->table} VALUES(null,?,?,?,?,null,null,null,null,null)";
            else
                $sql = "INSERT INTO {$this->table} VALUES(null,?,?,?,?, null, ?, null, ?, ?)";

            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getTip_id());
            @$query->bindParam(2, $obj->getPer_identificacion());
            @$query->bindParam(3, $obj->getPer_nombre());
            @$query->bindParam(4, $obj->getPer_apellido());
            @$query->bindParam(5, $obj->getPer_direccion());
            @$query->bindParam(6, $obj->getPer_correo());
            @$query->bindParam(7, $obj->getPer_telefono());
            $query->execute();
            $id = $this->conexion->lastInsertId();
            $retorno->data = $id;
            $retorno->status = 200;
            $retorno->msg = "Registro insertado.";
        } catch (PDOException $e) {
            $retorno->msg = $e->getMessage();
            $retorno->status = 501;
        }
        return $retorno;
    }

    public function update($obj) {
        $retorno = new stdClass();
        try {
            $obj instanceof Persona;
            $sql = "UPDATE {$this->table} SET "
                    . "per_nombre = ?,"
                    . "per_apellido = ?,"
                    . "per_fecha_nacimiento = ?,"
                    . "per_genero = ?,"
                    . "per_direccion = ?,"
                    . "per_telefono = ?, "
                    . "per_correo = ? "
                    . "WHERE per_id =?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPer_nombre());
            @$query->bindParam(2, $obj->getPer_apellido());
            @$query->bindParam(3, $obj->getPer_fecha_nacimiento());
            @$query->bindParam(4, $obj->getPer_genero());
            @$query->bindParam(5, $obj->getPer_direccion());
            @$query->bindParam(6, $obj->getPer_telefono());
            @$query->bindParam(7, $obj->getPer_correo());
            @$query->bindParam(8, $obj->getPer_id());
            $query->execute();
            $retorno->data = $obj;
            $retorno->status = 200;
            $retorno->msg = "Persona Actualizada.";
        } catch (PDOException $e) {
            $retorno->msg = $e->getMessage();
            $retorno->status = 501;
        }
        return $retorno;
    }

    public function buscarCorreo(Persona $persona) {
        $retorno = new stdClass();
        try {
            $sql = "SELECT *  FROM {$this->table} WHERE per_correo = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $persona->getPer_correo());
            $query->execute();
            $retorno->data = $query->fetchObject($this->nameEntity);

            if (!$retorno->data instanceof $this->nameEntity) {
                $retorno->status = 201;
                $retorno->msg = "Correo disponible";
            } else {
                $retorno->status = 200;
                $retorno->msg = "Correo no disponible";
            }
        } catch (PDOException $e) {
            $retorno->msg = $e->getMessage();
            $retorno->status = 501;
        }
        return $retorno;
    }
    
    public function buscarIdentificacion(Persona $persona) {
        $retorno = new stdClass();
        try {
            $sql = "SELECT *  FROM {$this->table} INNER JOIN tbl_usuario "
            . "ON {$this->table}.per_id = tbl_usuario.per_id "
            . "WHERE {$this->table}.per_identificacion = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $persona->getPer_identificacion());
            $query->execute();
            $retorno->data = $query->fetchObject($this->nameEntity);

            if (!$retorno->data instanceof $this->nameEntity) {
                $retorno->status = 201;
                $retorno->msg = "Identificación disponible";
            } else {
                $retorno->status = 200;
                $retorno->msg = "Identificación no disponible";
            }
        } catch (PDOException $e) {
            $retorno->msg = $e->getMessage();
            $retorno->status = 501;
        }
        return $retorno;
    }
}