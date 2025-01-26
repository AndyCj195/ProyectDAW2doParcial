<?php
// Autor: CESAR XAVIER VILLACIS ALVIA
class RutasRecoleccionDTO {
    private $id_RutasRecoleccion;
    private $FechaDeRecoleccion;
    private $HoraDeRecoleccion;
    private $materialesARecoger;
    private $EmpresaEncargada;
    private $SectorCubierto;
    private $VehiculoAsignado;

    // Constructor para inicializar propiedades
    public function __construct(
        $id_RutasRecoleccion = null,
        $FechaDeRecoleccion = null,
        $HoraDeRecoleccion = null,
        $materialesARecoger = null,
        $EmpresaEncargada = null,
        $SectorCubierto = null,
        $VehiculoAsignado = null
    ) {
        $this->id_RutasRecoleccion = $id_RutasRecoleccion;
        $this->FechaDeRecoleccion = $FechaDeRecoleccion;
        $this->HoraDeRecoleccion = $HoraDeRecoleccion;
        $this->materialesARecoger = $materialesARecoger;
        $this->EmpresaEncargada = $EmpresaEncargada;
        $this->SectorCubierto = $SectorCubierto;
        $this->VehiculoAsignado = $VehiculoAsignado;
    }

    // Métodos getters
    public function getId() {
        return $this->id_RutasRecoleccion;
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

    // Métodos setters
    public function setId($id_RutasRecoleccion) {
        $this->id_RutasRecoleccion = $id_RutasRecoleccion;
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
