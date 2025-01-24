<?php
class RutasRecoleccionDTO {
    private $id;
    private $FechaDeRecoleccion;
    private $HoraDeRecoleccion;
    private $materialesARecoger;
    private $EmpresaEncargada;
    private $SectorCubierto;
    private $VehiculoAsignado;

    // Constructor para inicializar propiedades
    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getFechaDeRecoleccion() {
        return $this->FechaDeRecoleccion;
    }

    public function getHoraDeRecoleccion() {
        return $this->HoraDeRecoleccion;
    }

    public function getMaterialesARecoger() {
        return $this->materialesARecoger;
    }

    public function getEmpresaEncargada() {
        return $this->EmpresaEncargada;
    }

    public function getSectorCubierto() {
        return $this->SectorCubierto;
    }

    public function getVehiculoAsignado() {
        return $this->VehiculoAsignado;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFechaDeRecoleccion($FechaDeRecoleccion) {
        $this->FechaDeRecoleccion = $FechaDeRecoleccion;
    }

    public function setHoraDeRecoleccion($HoraDeRecoleccion) {
        $this->HoraDeRecoleccion = $HoraDeRecoleccion;
    }

    public function setMaterialesARecoger($materialesARecoger) {
        $this->materialesARecoger = $materialesARecoger;
    }

    public function setEmpresaEncargada($EmpresaEncargada) {
        $this->EmpresaEncargada = $EmpresaEncargada;
    }

    public function setSectorCubierto($SectorCubierto) {
        $this->SectorCubierto = $SectorCubierto;
    }

    public function setVehiculoAsignado($VehiculoAsignado) {
        $this->VehiculoAsignado = $VehiculoAsignado;
    }
}
?>
