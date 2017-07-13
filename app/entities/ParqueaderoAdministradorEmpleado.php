<?php

class ParqueaderoAdministradorEmpleado {

    private $pae_id;
    private $padm_id;
    private $emp_id;

    function getPae_id() {
        return $this->pae_id;
    }

    function getPadm_id() {
        return $this->padm_id;
    }

    function getEmp_id() {
        return $this->emp_id;
    }

    function setPae_id($pae_id) {
        $this->pae_id = $pae_id;
    }

    function setPadm_id($padm_id) {
        $this->padm_id = $padm_id;
    }

    function setEmp_id($emp_id) {
        $this->emp_id = $emp_id;
    }

}

?>