<?php
  class QueryModel implements IModel{

    private $conexion;

    public function __construct(){
      $this->conexion = SPDO::singleton();
    }

    public function createQuery($sql){
      $retorno = new stdClass();

      try{
        $query = $this->conexion->prepare($sql);
        $query->execute();

        $retorno->status = 200;
        $retorno->msg = "Consulta Correcta";
        $retorno->data = $query->fetchAll();
      }catch(PDOException $e){
        $retorno->status = 501;
        $retorno->msg = $e->getMessage();
      }

      return $retorno;
    }

    function get($obj=null){

    }

    function insert($obj){
    }

    function update($obj){

    }

    function delete($obj){

    }

    function getById($obj){

    }
  }
?>