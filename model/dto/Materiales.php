<?php
// DTO: Data Transfer Object
class Materiales {
    // Propiedades
    private $id, $tipoDeMateriales, $cantidadTotalKg, $estadoDelMaterial, 
            $comunidadZonaAsociada, $empresaAsignada;

    // Constructor vacío
    public function __construct() {}

    // Métodos getter
    public function getId() {
        return $this->id;
    }

    public function getTipoDeMateriales() {
        return $this->tipoDeMateriales;
    }

    public function getCantidadTotalKg() {
        return $this->cantidadTotalKg;
    }

    public function getEstadoDelMaterial() {
        return $this->estadoDelMaterial;
    }

    public function getComunidadZonaAsociada() {
        return $this->comunidadZonaAsociada;
    }

    public function getEmpresaAsignada() {
        return $this->empresaAsignada;
    }

    // Métodos setter
    public function setId($id) {
        $this->id = $id;
    }

    public function setTipoDeMateriales($tipoDeMateriales) {
        $this->tipoDeMateriales = $tipoDeMateriales;
    }

    public function setCantidadTotalKg($cantidadTotalKg) {
        $this->cantidadTotalKg = $cantidadTotalKg;
    }

    public function setEstadoDelMaterial($estadoDelMaterial) {
        $this->estadoDelMaterial = $estadoDelMaterial;
    }

    public function setComunidadZonaAsociada($comunidadZonaAsociada) {
        $this->comunidadZonaAsociada = $comunidadZonaAsociada;
    }

    public function setEmpresaAsignada($empresaAsignada) {
        $this->empresaAsignada = $empresaAsignada;
    }

    // Métodos mágicos para acceso dinámico
    public function __set($nombre, $valor) {
        // Verifica que la propiedad exista
        if (property_exists('Materiales', $nombre)) {
            $this->$nombre = $valor;
        } else {
            echo "$nombre no existe.";
        }
    }

    public function __get($nombre) {
        // Verifica que la propiedad exista
        if (property_exists('Materiales', $nombre)) {
            return $this->$nombre;
        }
        // Retorna null si no existe
        return null;
    }
}
?>
