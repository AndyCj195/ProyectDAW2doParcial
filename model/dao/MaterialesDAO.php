<?php
// autor: Arroba Carrillo Omar Andrés
require_once 'config/Conexion.php';

class MaterialesDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    // Método para seleccionar todos los registros
    public function selectAll($estadoDelMaterial) {
        try {
            // Consulta para filtrar por estado del material
            $query = "SELECT * FROM gestionmateriales WHERE estadoDelMaterial = :estadoDelMaterial";
            $stmt = $this->con->prepare($query);
            $stmt->bindParam(':estadoDelMaterial', $estadoDelMaterial, PDO::PARAM_STR);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $materiales = [];
            foreach ($resultados as $resultado) {
                $material = new Materiales();
                $material->setId($resultado['id']);
                $material->setTipoDeMateriales($resultado['tipoDeMateriales']);
                $material->setCantidadTotalKg($resultado['cantidadTotalKg']);
                $material->setEstadoDelMaterial($resultado['estadoDelMaterial']);
                $material->setComunidadZonaAsociada($resultado['comunidadZonaAsociada']);
                $material->setEmpresaAsignada($resultado['empresaAsignada']);
                $materiales[] = $material;
            }
            return $materiales;
        } catch (PDOException $e) {
            // Registro de error
            error_log("Error en selectAll de MaterialesDAO: " . $e->getMessage());
            echo "Error al listar materiales: " . $e->getMessage();
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


    public function selectByFilters($filtros) {
        try {
            $query = "SELECT * FROM gestionmateriales WHERE 1=1";
            $params = [];
    
            // Filtro por texto
            if (!empty($filtros['texto'])) {
                $query .= " AND tipoDeMateriales LIKE :texto";
                $params[':texto'] = "%" . $filtros['texto'] . "%";
            }
    
            // Filtro por estado
            if (!empty($filtros['estado'])) {
                $query .= " AND estadoDelMaterial = :estado";
                $params[':estado'] = $filtros['estado'];
            }
    
            $stmt = $this->con->prepare($query);
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $materiales = [];
            foreach ($resultados as $resultado) {
                $material = new Materiales();
                $material->setId($resultado['id']);
                $material->setTipoDeMateriales($resultado['tipoDeMateriales']);
                $material->setCantidadTotalKg($resultado['cantidadTotalKg']);
                $material->setEstadoDelMaterial($resultado['estadoDelMaterial']);
                $material->setComunidadZonaAsociada($resultado['comunidadZonaAsociada']);
                $material->setEmpresaAsignada($resultado['empresaAsignada']);
                $materiales[] = $material;
            }
            return $materiales;
        } catch (PDOException $e) {
            error_log("Error en selectByFilters de MaterialesDAO: " . $e->getMessage());
            return [];
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

    
}

?>



