<?php

class Vehiculo implements \JsonSerializable{
    
    private $veh_id;
    private $veh_placa;
    private $veh_color;
    private $mar_id;
    private $tiv_id;
    
    function getVeh_color() {
        return $this->veh_color;
    }

    function setVeh_color($veh_color) {
        $this->veh_color = $veh_color;
    }
    
    function getVeh_id() {
        return $this->veh_id;
    }

    function getVeh_placa() {
        return $this->veh_placa;
    }

    function getMar_id() {
        return $this->mar_id;
    }

    function getTiv_id() {
        return $this->tiv_id;
    }

    function setVeh_id($veh_id) {
        $this->veh_id = $veh_id;
    }

    function setVeh_placa($veh_placa) {
        $this->veh_placa = $veh_placa;
    }

    function setMar_id($mar_id) {
        $this->mar_id = $mar_id;
    }

    function setTiv_id($tiv_id) {
        $this->tiv_id = $tiv_id;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}