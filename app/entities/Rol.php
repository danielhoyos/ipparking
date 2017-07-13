<?php

class Rol implements \JsonSerializable{
    private $rol_id; 
    private $rol_nombre;
    
    function getRol_id() {
        return $this->rol_id;
    }

    function getRol_nombre() {
        return $this->rol_nombre;
    }

    function setRol_id($rol_id) {
        $this->rol_id = $rol_id;
    }

    function setRol_nombre($rol_nombre) {
        $this->rol_nombre = $rol_nombre;
    }

    public function jsonSerialize() {
        $vars = get_object_vars($this);
        return $vars;
    }

}
