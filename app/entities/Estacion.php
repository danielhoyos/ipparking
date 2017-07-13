<?php

class Estacion implements \JsonSerializable{
    private $est_id;
    private $est_codigo;
    private $est_tipo;
    private $est_estado;
    private $cam_id;
    private $tiv_id;
    private $par_id;
    
    public static $EstacionDisponible = "disponible";
    public static $EstacionNoDisponible = "nodisponible";
    
    public static $EstacionVehiculo = "vehiculo";
    public static $EstacionLlave = "llave";
    public static $EstacionCasco = "casco";
    
    function getCam_id() {
        return $this->cam_id;
    }

    function setCam_id($cam_id) {
        $this->cam_id = $cam_id;
    }
    
    function getEst_tipo() {
        return $this->est_tipo;
    }

    function setEst_tipo($est_tipo) {
        $this->est_tipo = $est_tipo;
    }
    
    function getEst_estado() {
        return $this->est_estado;
    }

    function setEst_estado($est_estado) {
        $this->est_estado = $est_estado;
    }
                
    function getEst_id() {
        return $this->est_id;
    }

    function getEst_codigo() {
        return $this->est_codigo;
    }

    function getTiv_id() {
        return $this->tiv_id;
    }

    function getPar_id() {
        return $this->par_id;
    }

    function setEst_id($est_id) {
        $this->est_id = $est_id;
    }

    function setEst_codigo($est_codigo) {
        $this->est_codigo = $est_codigo;
    }

    function setTiv_id($tiv_id) {
        $this->tiv_id = $tiv_id;
    }

    function setPar_id($par_id) {
        $this->par_id = $par_id;
    }

         public function jsonSerialize() {
             return get_object_vars($this);
         }

     }
