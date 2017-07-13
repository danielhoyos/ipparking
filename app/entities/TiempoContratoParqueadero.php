<?php

class TiempoContratoParqueadero implements \JsonSerializable{
    private $tcp_id;
    private $tcp_cantidad_meses;
    private $tcp_valor;
    
    function getTcp_id() {
        return $this->tcp_id;
    }

    function getTcp_cantidad_meses() {
        return $this->tcp_cantidad_meses;
    }

    function getTcp_valor() {
        return $this->tcp_valor;
    }

    function setTcp_id($tcp_id) {
        $this->tcp_id = $tcp_id;
    }

    function setTcp_cantidad_meses($tcp_cantidad_meses) {
        $this->tcp_cantidad_meses = $tcp_cantidad_meses;
    }

    function setTcp_valor($tcp_valor) {
        $this->tcp_valor = $tcp_valor;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
