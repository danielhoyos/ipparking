<?php

class Parqueadero implements \JsonSerializable{
    private $par_id;
    private $par_nit;
    private $par_nombre;
    private $par_direccion;
    private $par_telefono;
    private $par_capacidad_carros;
    private $par_capacidad_motos;
    private $par_capacidad_bicicletas;
    private $par_capacidad_cascos;
    private $par_capacidad_llaves;
    private $par_fecha_registro;
    private $par_avatar;
    
    function getPar_avatar() {
        return $this->par_avatar;
    }

    function setPar_avatar($par_avatar) {
        $this->par_avatar = $par_avatar;
    }
    
    function getPar_id() {
        return $this->par_id;
    }

    function getPar_nit() {
        return $this->par_nit;
    }

    function getPar_nombre() {
        return $this->par_nombre;
    }

    function getPar_direccion() {
        return $this->par_direccion;
    }

    function getPar_telefono() {
        return $this->par_telefono;
    }

    function getPar_capacidad_carros() {
        return $this->par_capacidad_carros;
    }

    function getPar_capacidad_motos() {
        return $this->par_capacidad_motos;
    }

    function getPar_capacidad_bicicletas() {
        return $this->par_capacidad_bicicletas;
    }

    function getPar_capacidad_cascos() {
        return $this->par_capacidad_cascos;
    }

    function getPar_capacidad_llaves() {
        return $this->par_capacidad_llaves;
    }

    function getPar_fecha_registro() {
        return $this->par_fecha_registro;
    }

    function setPar_id($par_id) {
        $this->par_id = $par_id;
    }

    function setPar_nit($par_nit) {
        $this->par_nit = $par_nit;
    }

    function setPar_nombre($par_nombre) {
        $this->par_nombre = $par_nombre;
    }

    function setPar_direccion($par_direccion) {
        $this->par_direccion = $par_direccion;
    }

    function setPar_telefono($par_telefono) {
        $this->par_telefono = $par_telefono;
    }

    function setPar_capacidad_carros($par_capacidad_carros) {
        $this->par_capacidad_carros = $par_capacidad_carros;
    }

    function setPar_capacidad_motos($par_capacidad_motos) {
        $this->par_capacidad_motos = $par_capacidad_motos;
    }

    function setPar_capacidad_bicicletas($par_capacidad_bicicletas) {
        $this->par_capacidad_bicicletas = $par_capacidad_bicicletas;
    }

    function setPar_capacidad_cascos($par_capacidad_cascos) {
        $this->par_capacidad_cascos = $par_capacidad_cascos;
    }

    function setPar_capacidad_llaves($par_capacidad_llaves) {
        $this->par_capacidad_llaves = $par_capacidad_llaves;
    }

    function setPar_fecha_registro($par_fecha_registro) {
        $this->par_fecha_registro = $par_fecha_registro;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
