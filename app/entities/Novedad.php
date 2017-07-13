<?php

class Novedad{
    private $nov_id;
    private $nov_nombre;
    private $nov_apellido;
    private $nov_correo;
    private $nov_telefono;
    private $nov_asunto;
    private $nov_mensaje;
    private $nov_estado;
    private $usu_id;
    
    const ASUNTO_FELICITACION = "felicitacion";
    const ASUNTO_SOLICITUD = "solicitud";
    const ASUNTO_QUEJA = "queja";
    const ASUNTO_PEDIDO = "pedido";
    
    const ESTADO_ATENDIDA = "atendida";
    const ESTADO_PENDIENTE = "pendiente";
    
    function getNov_id() {
        return $this->nov_id;
    }

    function getNov_nombre() {
        return $this->nov_nombre;
    }

    function getNov_apellido() {
        return $this->nov_apellido;
    }

    function getNov_correo() {
        return $this->nov_correo;
    }

    function getNov_telefono() {
        return $this->nov_telefono;
    }

    function getNov_asunto() {
        return $this->nov_asunto;
    }

    function getNov_mensaje() {
        return $this->nov_mensaje;
    }

    function getNov_estado() {
        return $this->nov_estado;
    }

    function getUsu_id() {
        return $this->usu_id;
    }

    function setNov_id($nov_id) {
        $this->nov_id = $nov_id;
    }

    function setNov_nombre($nov_nombre) {
        $this->nov_nombre = $nov_nombre;
    }

    function setNov_apellido($nov_apellido) {
        $this->nov_apellido = $nov_apellido;
    }

    function setNov_correo($nov_correo) {
        $this->nov_correo = $nov_correo;
    }

    function setNov_telefono($nov_telefono) {
        $this->nov_telefono = $nov_telefono;
    }

    function setNov_asunto($nov_asunto) {
        $this->nov_asunto = $nov_asunto;
    }

    function setNov_mensaje($nov_mensaje) {
        $this->nov_mensaje = $nov_mensaje;
    }

    function setNov_estado($nov_estado) {
        $this->nov_estado = $nov_estado;
    }

    function setUsu_id($usu_id) {
        $this->usu_id = $usu_id;
    }
}

