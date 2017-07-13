<?php

class ContratoParqueadero{
    private $con_id;
    private $tcp_id;
    private $con_descripcion;
    private $par_id;
    
    function getCon_id() {
        return $this->con_id;
    }

    function getTcp_id() {
        return $this->tcp_id;
    }

    function getCon_descripcion() {
        return $this->con_descripcion;
    }

    function getPar_id() {
        return $this->par_id;
    }

    function setCon_id($con_id) {
        $this->con_id = $con_id;
    }

    function setTcp_id($tcp_id) {
        $this->tcp_id = $tcp_id;
    }

    function setCon_descripcion($con_descripcion) {
        $this->con_descripcion = $con_descripcion;
    }

    function setPar_id($par_id) {
        $this->par_id = $par_id;
    }
}

