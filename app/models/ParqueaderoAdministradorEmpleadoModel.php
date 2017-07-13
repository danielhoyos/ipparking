<?php

class ParqueaderoAdministradorEmpleadoModel implements IModel {

    private $conexion;
    private $table = "tbl_parqueadero_administrador_empleado";
    private $nameEntity = "ParqueaderoAdministradorEmpleado";

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
            $obj instanceof ParqueaderoAdministradorEmpleado;

            $sql = "INSERT INTO {$this->table} values(null,?,?)";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPadm_id());
            @$query->bindParam(2, $obj->getEmp_id());
            $query->execute();

            $retorno->status = 200;
            $retorno->msg = "Insertado Correctamente";
        } catch (Exception $e) {
            $retorno->status = 501;
            $retorno->msg = $e->getMessage();
        }

        return $retorno;
    }

    public function update($obj) {
        
    }
    
    public function empleadosByParqueaderoAdministrador($obj) {
        $retorno = new stdClass();
        try {
            $obj instanceof ParqueaderoAdministradorEmpleado;
            $sql = "SELECT * FROM {$this->table} INNER JOIN tbl_usuario "
                    . "ON tbl_usuario.usu_id = {$this->table}.emp_id INNER JOIN tbl_persona "
                    . "ON tbl_usuario.per_id = tbl_persona.per_id WHERE {$this->table}.padm_id = ?";
            $query = $this->conexion->prepare($sql);
            @$query->bindParam(1, $obj->getPadm_id());
            $query->execute();

            $retorno->data = $query->fetchAll(PDO::FETCH_CLASS, $this->nameEntity);
            $retorno->status = 200;
            $retorno->msg = "Encontrado exitosamente";
        } catch (PDOException $e) {
            $retorno->status = 501;
            $retorno->msg = $e->getMessage();
        }
        return $retorno;
    }
}