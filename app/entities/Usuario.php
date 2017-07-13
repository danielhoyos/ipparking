<?php

class Usuario extends Persona implements \JsonSerializable {

    private $usu_id;
    private $usu_usuario;
    private $usu_password;
    private $usu_avatar;
    private $usu_portada;
    private $usu_estado;
    private $usu_fecha_registro;
    private $rol_id;

    const ESTADO_ACTIVO = "activo";
    const ESTADO_INACTIVO = "inactivo";
    const ESTADO_PENDIENTE = "pendiente";

    function getUsu_id() {
        return $this->usu_id;
    }

    function getUsu_usuario() {
        return $this->usu_usuario;
    }

    function getUsu_password() {
        return $this->usu_password;
    }

    function getUsu_avatar() {
        return $this->usu_avatar;
    }

    function getUsu_portada() {
        return $this->usu_portada;
    }

    function getUsu_estado() {
        return $this->usu_estado;
    }

    function getUsu_fecha_registro() {
        return $this->usu_fecha_registro;
    }

    function getRol_id() {
        return $this->rol_id;
    }

    function setUsu_id($usu_id) {
        $this->usu_id = $usu_id;
    }

    function setUsu_usuario($usu_usuario) {
        $this->usu_usuario = $usu_usuario;
    }

    function setUsu_password($usu_password, $codificar = false) {
        if ($codificar) {
            $usu_password = md5($usu_password);
        }
        $this->usu_password = $usu_password;
    }

    function setUsu_avatar($usu_avatar) {
        $this->usu_avatar = $usu_avatar;
    }

    function setUsu_portada($usu_portada) {
        $this->usu_portada = $usu_portada;
    }

    function setUsu_estado($usu_estado) {
        $this->usu_estado = $usu_estado;
    }

    function setUsu_fecha_registro($usu_fecha_registro) {
        $this->usu_fecha_registro = $usu_fecha_registro;
    }

    function setRol_id($rol_id) {
        $this->rol_id = $rol_id;
    }

    public function jsonSerialize() {
        $vars = get_object_vars($this);
        return $vars;
    }

}
