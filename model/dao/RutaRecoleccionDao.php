<?php
//autor:CESAR XAVIER VILLACIS ALVIA
require_once 'Config/Conexion.php'; 


class RutasRecoleccionDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConexion();
    }

    public function create(RutasRecoleccionDTO $ruta) {
        try {
            $query = "INSERT INTO RutasRecoleccion (FechaDeRecoleccion, HoraDeRecoleccion, materialesARecoger, EmpresaEncargada, SectorCubierto, VehiculoAsignado)
                      VALUES (:FechaDeRecoleccion, :HoraDeRecoleccion, :materialesARecoger, :EmpresaEncargada, :SectorCubierto, :VehiculoAsignado)";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':FechaDeRecoleccion', $ruta->getFechaDeRecoleccion(), PDO::PARAM_STR);
            $stmt->bindParam(':HoraDeRecoleccion', $ruta->getHoraDeRecoleccion(), PDO::PARAM_STR);
            $stmt->bindParam(':materialesARecoger', $ruta->getMaterialesARecoger(), PDO::PARAM_STR);
            $stmt->bindParam(':EmpresaEncargada', $ruta->getEmpresaEncargada(), PDO::PARAM_STR);
            $stmt->bindParam(':SectorCubierto', $ruta->getSectorCubierto(), PDO::PARAM_STR);
            $stmt->bindParam(':VehiculoAsignado', $ruta->getVehiculoAsignado(), PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $ex) {
            error_log("Error al crear ruta de recolección: " . $ex->getMessage());
            return false;
        }
    }
    public function readAll() {
        try {
            $query = "SELECT * FROM rutasrecoleccion";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $rutas = [];
            foreach ($resultados as $fila) {
                $ruta = new RutasRecoleccionDTO();
                $ruta->setId($fila['id_RutasRecoleccion']);
                $ruta->setFechaDeRecoleccion($fila['FechaDeRecoleccion']);
                $ruta->setHoraDeRecoleccion($fila['HoraDeRecoleccion']);
                $ruta->setmaterialesARecoger($fila['materialesARecoger']);
                $ruta->setEmpresaEncargada($fila['EmpresaEncargada']);
                $ruta->setSectorCubierto($fila['SectorCubierto']);
                $ruta->setVehiculoAsignado($fila['VehiculoAsignado']);
                $rutas[] = $ruta;
    
            }
            return $rutas;
        } catch (PDOException $ex) {
            error_log("Error al leer rutas de recolección: " . $ex->getMessage());
            return [];
        }
    }

    public function readById($id) {
        try {
            $query = "SELECT * FROM RutasRecoleccion WHERE id = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($fila) {
                return new RutasRecoleccionDTO(
                    $fila['id_RutasRecoleccion'],
                    $fila['FechaDeRecoleccion'],
                    $fila['HoraDeRecoleccion'],
                    $fila['materialesARecoger'],
                    $fila['EmpresaEncargada'],
                    $fila['SectorCubierto'],
                    $fila['VehiculoAsignado']
                );
            }
            return null;
        } catch (PDOException $ex) {
            error_log("Error al leer ruta de recolección por ID: " . $ex->getMessage());
            return null;
        }
    }

    public function update(RutasRecoleccionDTO $ruta) {
        try {
            $query = "UPDATE RutasRecoleccion 
                      SET FechaDeRecoleccion = :FechaDeRecoleccion,
                          HoraDeRecoleccion = :HoraDeRecoleccion,
                          materialesARecoger = :materialesARecoger,
                          EmpresaEncargada = :EmpresaEncargada,
                          SectorCubierto = :SectorCubierto,
                          VehiculoAsignado = :VehiculoAsignado
                      WHERE id = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id_RutasRecoleccion', $ruta->getid(), PDO::PARAM_INT);
            $stmt->bindParam(':FechaDeRecoleccion', $ruta->getFechaDeRecoleccion(), PDO::PARAM_STR);
            $stmt->bindParam(':HoraDeRecoleccion', $ruta->getHoraDeRecoleccion(), PDO::PARAM_STR);
            $stmt->bindParam(':materialesARecoger', $ruta->getMaterialesARecoger(), PDO::PARAM_STR);
            $stmt->bindParam(':EmpresaEncargada', $ruta->getEmpresaEncargada(), PDO::PARAM_STR);
            $stmt->bindParam(':SectorCubierto', $ruta->getSectorCubierto(), PDO::PARAM_STR);
            $stmt->bindParam(':VehiculoAsignado', $ruta->getVehiculoAsignado(), PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $ex) {
            error_log("Error al actualizar ruta de recolección: " . $ex->getMessage());
            return false;
        }
    }

    public function delete($id) {
        try {
            $query = "DELETE FROM RutasRecoleccion WHERE id_RutasRecoleccion = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $ex) {
            error_log("Error al eliminar ruta de recolección: " . $ex->getMessage());
            return false;
        }
    }
}
?>
