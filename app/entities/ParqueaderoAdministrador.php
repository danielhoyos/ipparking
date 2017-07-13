<?php

class ParqueaderoAdministrador{
    private $padm_id;
    private $par_id;
    private $adm_id;
    
    function getPadm_id() {
        return $this->padm_id;
    }

    function getPar_id() {
        return $this->par_id;
    }

    function getAdm_id() {
        return $this->adm_id;
    }

    function setPadm_id($padm_id) {
        $this->padm_id = $padm_id;
    }

    function setPar_id($par_id) {
        $this->par_id = $par_id;
    }

    function setAdm_id($adm_id) {
        $this->adm_id = $adm_id;
    }


            
}
