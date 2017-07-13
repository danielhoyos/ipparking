<?php

class Marca implements \JsonSerializable{
    
    private $mar_id;
    private $mar_nombre;
    private $mar_avatar;
    private $tiv_id;
    
    function getMar_id() {
        return $this->mar_id;
    }

    function getMar_nombre() {
        return $this->mar_nombre;
    }

    function getMar_avatar() {
        return $this->mar_avatar;
    }

    function getTiv_id() {
        return $this->tiv_id;
    }

    function setMar_id($mar_id) {
        $this->mar_id = $mar_id;
    }

    function setMar_nombre($mar_nombre) {
        $this->mar_nombre = $mar_nombre;
    }

    function setMar_avatar($mar_avatar) {
        $this->mar_avatar = $mar_avatar;
    }

    function setTiv_id($tiv_id) {
        $this->tiv_id = $tiv_id;
    }
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
