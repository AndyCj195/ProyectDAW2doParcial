<?php
//autor:CESAR XAVIER VILLACIS ALVIA
require_once 'Config/Conexion.php'; 


class RutasRecoleccionDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConnection();
    }

    public function create(RutasRecoleccionDTO $ruta) {
        try {
            $query = "INSERT INTO RutasRecoleccion (FechaDeRecoleccion, HoraDeRecoleccion, materialesARecoger, EmpresaEncargada, SectorCubierto, VehiculoAsignado)
                      VALUES (:FechaDeRecoleccion, :HoraDeRecoleccion, :materialesARecoger, :EmpresaEncargada, :SectorCubierto, :VehiculoAsignado)";
            $stmt = $this->conexion->prepare($query);
    
            $fechaDeRecoleccion = $ruta->getFechaDeRecoleccion();
            $horaDeRecoleccion = $ruta->getHoraDeRecoleccion();
            $materialesARecoger = $ruta->getMaterialesARecoger();
            $empresaEncargada = $ruta->getEmpresaEncargada();
            $sectorCubierto = $ruta->getSectorCubierto();
            $vehiculoAsignado = $ruta->getVehiculoAsignado();
    
            $stmt->bindParam(':FechaDeRecoleccion', $fechaDeRecoleccion, PDO::PARAM_STR);
            $stmt->bindParam(':HoraDeRecoleccion', $horaDeRecoleccion, PDO::PARAM_STR);
            $stmt->bindParam(':materialesARecoger', $materialesARecoger, PDO::PARAM_STR);
            $stmt->bindParam(':EmpresaEncargada', $empresaEncargada, PDO::PARAM_STR);
            $stmt->bindParam(':SectorCubierto', $sectorCubierto, PDO::PARAM_STR);
            $stmt->bindParam(':VehiculoAsignado', $vehiculoAsignado, PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                return true;
            } else {
                error_log("Error en la consulta: " . implode(", ", $stmt->errorInfo()));
                return false;
            }
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
            $query = "SELECT * FROM RutasRecoleccion WHERE id_RutasRecoleccion = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
    
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            error_log("Error al obtener la ruta: " . $ex->getMessage());
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
                      WHERE id_RutasRecoleccion = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $ruta->getId(), PDO::PARAM_INT);
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
