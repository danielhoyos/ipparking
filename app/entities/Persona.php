<?php

class  Persona implements \JsonSerializable{
    private $per_id;
    private $tip_id;
    private $per_identificacion;
    private $per_nombre;
    private $per_apellido;
    private $per_genero;
    private $per_direccion;
    private $per_fecha_nacimiento;
    private $per_correo;
    private $per_telefono;
    
    function getPer_id() {
        return $this->per_id;
    }

    function getTip_id() {
        return $this->tip_id;
    }

    function getPer_identificacion() {
        return $this->per_identificacion;
    }
    
    function getPer_nombre() {
        return $this->per_nombre;
    }

    function getPer_apellido() {
        return $this->per_apellido;
    }

    function getPer_genero() {
        return $this->per_genero;
    }

    function getPer_direccion() {
        return $this->per_direccion;
    }

    function getPer_fecha_nacimiento() {
        return $this->per_fecha_nacimiento;
    }

    function getPer_correo() {
        return $this->per_correo;
    }

    function getPer_telefono() {
        return $this->per_telefono;
    }

    function setPer_id($per_id) {
        $this->per_id = $per_id;
    }

    function setTip_id($tip_id) {
        $this->tip_id = $tip_id;
    }

    function setPer_identificacion($per_identificacion) {
        $this->per_identificacion = $per_identificacion;
    }
    
    function setPer_nombre($per_nombre) {
        $this->per_nombre = $per_nombre;
    }

    function setPer_apellido($per_apellido) {
        $this->per_apellido = $per_apellido;
    }

    function setPer_genero($per_genero) {
        $this->per_genero = $per_genero;
    }

    function setPer_direccion($per_direccion) {
        $this->per_direccion = $per_direccion;
    }

    function setPer_fecha_nacimiento($per_fecha_nacimiento) {
        $this->per_fecha_nacimiento = $per_fecha_nacimiento;
    }

    function setPer_correo($per_correo) {
        $this->per_correo = $per_correo;
    }

    function setPer_telefono($per_telefono) {
        $this->per_telefono = $per_telefono;
    }

    public function jsonSerialize() {
        $vars = get_object_vars($this);
        return $vars;
    }

}
