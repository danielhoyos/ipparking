<?php

class Parqueo implements \JsonSerializable{
    
    private $pao_id;
    private $pao_fecha_inicio;
    private $pao_hora_inicio;
    private $pao_fecha_fin;
    private $pao_hora_fin;
    private $est_id;
    private $veh_id;
    private $vendedor_id;
    private $cliente_id;
    private $pao_estado;
    
    static $PARQUEO_ACTIVO = "activo";
    static $PARQUEO_FINALIZADO = "finalizado";
    
    function getPao_estado() {
        return $this->pao_estado;
    }

    function setPao_estado($pao_estado) {
        $this->pao_estado = $pao_estado;
    }
    
    function getPao_id() {
        return $this->pao_id;
    }

    function getPao_fecha_inicio() {
        return $this->pao_fecha_inicio;
    }

    function getPao_hora_inicio() {
        return $this->pao_hora_inicio;
    }

    function getPao_fecha_fin() {
        return $this->pao_fecha_fin;
    }

    function getPao_hora_fin() {
        return $this->pao_hora_fin;
    }

    function getEst_id() {
        return $this->est_id;
    }

    function getVeh_id() {
        return $this->veh_id;
    }

    function getVendedor_id() {
        return $this->vendedor_id;
    }

    function getCliente_id() {
        return $this->cliente_id;
    }

    function setPao_id($pao_id) {
        $this->pao_id = $pao_id;
    }

    function setPao_fecha_inicio($pao_fecha_inicio) {
        $this->pao_fecha_inicio = $pao_fecha_inicio;
    }

    function setPao_hora_inicio($pao_hora_inicio) {
        $this->pao_hora_inicio = $pao_hora_inicio;
    }

    function setPao_fecha_fin($pao_fecha_fin) {
        $this->pao_fecha_fin = $pao_fecha_fin;
    }

    function setPao_hora_fin($pao_hora_fin) {
        $this->pao_hora_fin = $pao_hora_fin;
    }

    function setEst_id($est_id) {
        $this->est_id = $est_id;
    }

    function setVeh_id($veh_id) {
        $this->veh_id = $veh_id;
    }

    function setVendedor_id($vendedor_id) {
        $this->vendedor_id = $vendedor_id;
    }

    function setCliente_id($cliente_id) {
        $this->cliente_id = $cliente_id;
    }
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
