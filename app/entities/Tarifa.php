<?php

class Tarifa implements \JsonSerializable{
    private $tar_id;
    private $tar_valor_minuto;
    private $tar_valor_hora;
    private $tar_hora_minima;
    private $tar_valor_minima;
    private $tar_hora_maxima;
    private $tar_valor_maxima;
    private $tar_valor_dia;
    private $tar_valor_quincena;
    private $tar_valor_mes;
    private $par_id;
    private $tiv_id;
    
    function getTar_valor_hora() {
        return $this->tar_valor_hora;
    }

    function setTar_valor_hora($tar_valor_hora) {
        $this->tar_valor_hora = $tar_valor_hora;
    }
    
    function getTar_id() {
        return $this->tar_id;
    }

    function getTar_valor_minuto() {
        return $this->tar_valor_minuto;
    }

    function getTar_hora_minima() {
        return $this->tar_hora_minima;
    }

    function getTar_valor_minima() {
        return $this->tar_valor_minima;
    }

    function getTar_hora_maxima() {
        return $this->tar_hora_maxima;
    }

    function getTar_valor_maxima() {
        return $this->tar_valor_maxima;
    }

    function getTar_valor_dia() {
        return $this->tar_valor_dia;
    }

    function getTar_valor_quincena() {
        return $this->tar_valor_quincena;
    }

    function getTar_valor_mes() {
        return $this->tar_valor_mes;
    }

    function getPar_id() {
        return $this->par_id;
    }

    function getTiv_id() {
        return $this->tiv_id;
    }

    function setTar_id($tar_id) {
        $this->tar_id = $tar_id;
    }

    function setTar_valor_minuto($tar_valor_minuto) {
        $this->tar_valor_minuto = $tar_valor_minuto;
    }

    function setTar_hora_minima($tar_hora_minima) {
        $this->tar_hora_minima = $tar_hora_minima;
    }

    function setTar_valor_minima($tar_valor_minima) {
        $this->tar_valor_minima = $tar_valor_minima;
    }

    function setTar_hora_maxima($tar_hora_maxima) {
        $this->tar_hora_maxima = $tar_hora_maxima;
    }

    function setTar_valor_maxima($tar_valor_maxima) {
        $this->tar_valor_maxima = $tar_valor_maxima;
    }

    function setTar_valor_dia($tar_valor_dia) {
        $this->tar_valor_dia = $tar_valor_dia;
    }

    function setTar_valor_quincena($tar_valor_quincena) {
        $this->tar_valor_quincena = $tar_valor_quincena;
    }

    function setTar_valor_mes($tar_valor_mes) {
        $this->tar_valor_mes = $tar_valor_mes;
    }

    function setPar_id($par_id) {
        $this->par_id = $par_id;
    }

    function setTiv_id($tiv_id) {
        $this->tiv_id = $tiv_id;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
