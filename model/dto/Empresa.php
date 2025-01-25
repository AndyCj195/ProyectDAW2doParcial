<?php

class Empresa{
    private $id;
    private $tipoDeMaterialSolicitado;
    private $zonaComunidadConsultada;
    private $estadoDeLaSolicitud;
    private $fechaEstimadaDeRecoleccion;
    private $cantidadRequerida;

    function __construct(){}

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTipoDeMaterialSolicitado(){
        return $this->tipoDeMaterialSolicitado;
    }

    public function setTipoDeMaterialSolicitado($tipoDeMaterialSolicitado){
        $this->tipoDeMaterialSolicitado = $tipoDeMaterialSolicitado;
    }

    public function getZonaComunidadConsultada(){
        return $this->zonaComunidadConsultada;
    }

    public function setZonaComunidadConsultada($zonaComunidadConsultada){
        $this->zonaComunidadConsultada = $zonaComunidadConsultada;
    }

    public function getEstadoDeLaSolicitud(){
        return $this->estadoDeLaSolicitud;
    }

    public function setEstadoDeLaSolicitud($estadoDeLaSolicitud){
        $this->estadoDeLaSolicitud = $estadoDeLaSolicitud;
    }

    public function getFechaEstimadaDeRecoleccion(){
        return $this->fechaEstimadaDeRecoleccion;
    }

    public function setFechaEstimadaDeRecoleccion($fechaEstimadaDeRecoleccion){
        $this->fechaEstimadaDeRecoleccion = $fechaEstimadaDeRecoleccion;
    }

    public function getCantidadRequerida(){
        return $this->cantidadRequerida;
    }

    public function setCantidadRequerida($cantidadRequerida){
        $this->cantidadRequerida = $cantidadRequerida;
    }

    public function __toString(){
        return "Empresa{id=$this->id, tipoDeMaterialSolicitado=$this->tipoDeMaterialSolicitado, zonaComunidadConsultada=$this->zonaComunidadConsultada, estadoDeLaSolicitud=$this->estadoDeLaSolicitud, fechaEstimadaDeRecoleccion=$this->fechaEstimadaDeRecoleccion, cantidadRequerida=$this->cantidadRequerida}";
    }

}

?>