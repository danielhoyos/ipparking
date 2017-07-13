<?php

class PagoContratoParqueadero{
    private $pcp_id;
    private $con_id;
    private $pcp_fecha_pago;
    private $pcp_fecha_inicio_periodo;
    private $pcp_fecha_fin_periodo;
    private $pcp_valor;
    
    function getPcp_id() {
        return $this->pcp_id;
    }

    function getCon_id() {
        return $this->con_id;
    }

    function getPcp_fecha_pago() {
        return $this->pcp_fecha_pago;
    }

    function getPcp_fecha_inicio_periodo() {
        return $this->pcp_fecha_inicio_periodo;
    }

    function getPcp_fecha_fin_periodo() {
        return $this->pcp_fecha_fin_periodo;
    }

    function getPcp_valor() {
        return $this->pcp_valor;
    }

    function setPcp_id($pcp_id) {
        $this->pcp_id = $pcp_id;
    }

    function setCon_id($con_id) {
        $this->con_id = $con_id;
    }

    function setPcp_fecha_pago($pcp_fecha_pago) {
        $this->pcp_fecha_pago = $pcp_fecha_pago;
    }

    function setPcp_fecha_inicio_periodo($pcp_fecha_inicio_periodo) {
        $this->pcp_fecha_inicio_periodo = $pcp_fecha_inicio_periodo;
    }

    function setPcp_fecha_fin_periodo($pcp_fecha_fin_periodo) {
        $this->pcp_fecha_fin_periodo = $pcp_fecha_fin_periodo;
    }

    function setPcp_valor($pcp_valor) {
        $this->pcp_valor = $pcp_valor;
    }


}
