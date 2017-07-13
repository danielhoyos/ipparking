<?php

class TipoIdentificacion implements \JsonSerializable{
    private $tip_id;
    private $tip_nombre;
    
    function getTip_id() {
        return $this->tip_id;
    }

    function getTip_nombre() {
        return $this->tip_nombre;
    }

    function setTip_id($tip_id) {
        $this->tip_id = $tip_id;
    }

    function setTip_nombre($tip_nombre) {
        $this->tip_nombre = $tip_nombre;
    }

    public function jsonSerialize() {
        $vars = get_object_vars($this);
        return $vars;
    }

}
