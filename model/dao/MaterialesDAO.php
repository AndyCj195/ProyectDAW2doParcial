<?php
// autor: Arroba Carrillo Omar Andrés
require_once 'config/Conexion.php';

class MaterialesDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    // Método para seleccionar todos los registros
    public function selectAll($parametro) {
        try {
            $sql = "SELECT * FROM gestionmateriales WHERE tipoDeMateriales LIKE :parametro OR comunidadZonaAsociada LIKE :parametro";
            $stmt = $this->con->prepare($sql);
            $conlike = '%' . $parametro . '%';
            $stmt->bindParam(':parametro', $conlike, PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        } catch (PDOException $e) {
            error_log("Error en selectAll de GestionMaterialesDAO: " . $e->getMessage());
            echo "Error en selectAll de GestionMaterialesDAO: " . $e->getMessage();
            return [];
        }
    }

    // Método para seleccionar un registro por ID
    public function selectOne($id) {
        try {
            $sql = "SELECT * FROM gestionmateriales WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return $res;
        } catch (PDOException $e) {
            error_log("Error en selectOne de GestionMaterialesDAO: " . $e->getMessage());
            return null;
        }
    }

    // Método para insertar un nuevo registro
    public function insert($material) {
        try {
            $sql = "INSERT INTO gestionmateriales (tipoDeMateriales, cantidadTotalKg, estadoDelMaterial, comunidadZonaAsociada, empresaAsignada) 
                    VALUES (:tipoDeMateriales, :cantidadTotalKg, :estadoDelMaterial, :comunidadZonaAsociada, :empresaAsignada)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':tipoDeMateriales', $material->getTipoDeMateriales(), PDO::PARAM_STR);
            $stmt->bindParam(':cantidadTotalKg', $material->getCantidadTotalKg(), PDO::PARAM_STR);
            $stmt->bindParam(':estadoDelMaterial', $material->getEstadoDelMaterial(), PDO::PARAM_STR);
            $stmt->bindParam(':comunidadZonaAsociada', $material->getComunidadZonaAsociada(), PDO::PARAM_STR);
            $stmt->bindParam(':empresaAsignada', $material->getEmpresaAsignada(), PDO::PARAM_STR);
            $res = $stmt->execute();
            return $res;
        } catch (PDOException $e) {
            error_log("Error en insert de GestionMaterialesDAO: " . $e->getMessage());
            return false;
        }
    }

    // Método para actualizar un registro existente
    public function update($material) {
        try {
            $sql = "UPDATE gestionmateriales SET tipoDeMateriales = :tipoDeMateriales, cantidadTotalKg = :cantidadTotalKg, estadoDelMaterial = :estadoDelMaterial, 
                    comunidadZonaAsociada = :comunidadZonaAsociada, empresaAsignada = :empresaAsignada WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':tipoDeMateriales', $material->getTipoDeMateriales(), PDO::PARAM_STR);
            $stmt->bindParam(':cantidadTotalKg', $material->getCantidadTotalKg(), PDO::PARAM_STR);
            $stmt->bindParam(':estadoDelMaterial', $material->getEstadoDelMaterial(), PDO::PARAM_STR);
            $stmt->bindParam(':comunidadZonaAsociada', $material->getComunidadZonaAsociada(), PDO::PARAM_STR);
            $stmt->bindParam(':empresaAsignada', $material->getEmpresaAsignada(), PDO::PARAM_STR);
            $stmt->bindParam(':id', $material->getId(), PDO::PARAM_INT);
            $res = $stmt->execute();
            return $res;
        } catch (PDOException $e) {
            error_log("Error en update de GestionMaterialesDAO: " . $e->getMessage());
            return false;
        }
    }

    // Método para eliminar un registro por ID
    public function delete($id) {
        try {
            $sql = "DELETE FROM gestionmateriales WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $res = $stmt->execute();
            return $res;
        } catch (PDOException $e) {
            error_log("Error en delete de GestionMaterialesDAO: " . $e->getMessage());
            return false;
        }
    }

    // Método para eliminar lógicamente un registro
    public function logicalDelete($id) {
        try {
            $sql = "UPDATE gestionmateriales SET estadoDelMaterial = 'No disponible' WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $res = $stmt->execute();
            return $res;
        } catch (PDOException $e) {
            error_log("Error en logicalDelete de GestionMaterialesDAO: " . $e->getMessage());
            return false;
        }
    }
}

?>



