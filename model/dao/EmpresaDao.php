<?php
require_once 'config/Conexion.php';

class EmpresaDao
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::getConexion();
    }

    // Método para crear una nueva empresa
    public function crear($empresa)
    {
        try {
            $query = "INSERT INTO consultaempresas 
                      (tipoDeMaterialSolicitado, zonaComunidadConsultada, estadoDeLaSolicitud, 
                       fechaEstimadaDeRecoleccion, cantidadRequerida) 
                      VALUES (:tipoDeMaterialSolicitado, :zonaComunidadConsultada, :estadoDeLaSolicitud, 
                              :fechaEstimadaDeRecoleccion, :cantidadRequerida)";

            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':tipoDeMaterialSolicitado', $empresa->getTipoDeMaterialSolicitado(), PDO::PARAM_STR);
            $stmt->bindParam(':zonaComunidadConsultada', $empresa->getZonaComunidadConsultada(), PDO::PARAM_STR);
            $stmt->bindParam(':estadoDeLaSolicitud', $empresa->getEstadoDeLaSolicitud(), PDO::PARAM_STR);
            $stmt->bindParam(':fechaEstimadaDeRecoleccion', $empresa->getFechaEstimadaDeRecoleccion(), PDO::PARAM_STR);
            $stmt->bindParam(':cantidadRequerida', $empresa->getCantidadRequerida(), PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $ex) {
            echo 'Error al insertar en consultaempresas: ' . $ex->getMessage();
            return false;
        }
    }

    // Método para obtener una empresa por ID
    public function obtenerPorId($id)
    {
        try {
            $query = "SELECT * FROM consultaempresas WHERE id = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $empresa = new Empresa();
                $empresa->setId($result['id']);
                $empresa->setTipoDeMaterialSolicitado($result['tipoDeMaterialSolicitado']);
                $empresa->setZonaComunidadConsultada($result['zonaComunidadConsultada']);
                $empresa->setEstadoDeLaSolicitud($result['estadoDeLaSolicitud']);
                $empresa->setFechaEstimadaDeRecoleccion($result['fechaEstimadaDeRecoleccion']);
                $empresa->setCantidadRequerida($result['cantidadRequerida']);
                return $empresa;
            }
            return null; // No se encontró la empresa
        } catch (PDOException $ex) {
            echo 'Error al obtener la empresa: ' . $ex->getMessage();
            return null;
        }
    }

    // Método para editar una empresa
    public function editar($empresa)
    {
        try {
            $query = "UPDATE consultaempresas SET 
                      tipoDeMaterialSolicitado = :tipoDeMaterialSolicitado,
                      zonaComunidadConsultada = :zonaComunidadConsultada,
                      estadoDeLaSolicitud = :estadoDeLaSolicitud,
                      fechaEstimadaDeRecoleccion = :fechaEstimadaDeRecoleccion,
                      cantidadRequerida = :cantidadRequerida
                      WHERE id = :id";

            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':tipoDeMaterialSolicitado', $empresa->getTipoDeMaterialSolicitado(), PDO::PARAM_STR);
            $stmt->bindParam(':zonaComunidadConsultada', $empresa->getZonaComunidadConsultada(), PDO::PARAM_STR);
            $stmt->bindParam(':estadoDeLaSolicitud', $empresa->getEstadoDeLaSolicitud(), PDO::PARAM_STR);
            $stmt->bindParam(':fechaEstimadaDeRecoleccion', $empresa->getFechaEstimadaDeRecoleccion(), PDO::PARAM_STR);
            $stmt->bindParam(':cantidadRequerida', $empresa->getCantidadRequerida(), PDO::PARAM_INT);
            $stmt->bindParam(':id', $empresa->getId(), PDO::PARAM_INT); // Asegúrate de que el método getId() esté definido en la clase Empresa ```php
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo 'Error al actualizar la empresa: ' . $ex->getMessage();
            return false;
        }
    }

    // Método para eliminar una empresa
    public function eliminar($id)
    {
        try {
            $query = "DELETE FROM consultaempresas WHERE id = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo 'Error al eliminar la empresa: ' . $ex->getMessage();
            return false;
        }
    }

    // Método para obtener todas las empresas
    public function obtenerTodas()
    {
        try {
            $query = "SELECT * FROM consultaempresas";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();

            $empresas = [];
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $empresa = new Empresa();
                $empresa->setId($data['id']); // Asegúrate de que el método setId() esté definido en la clase Empresa
                $empresa->setTipoDeMaterialSolicitado($data['tipoDeMaterialSolicitado']);
                $empresa->setZonaComunidadConsultada($data['zonaComunidadConsultada']);
                $empresa->setEstadoDeLaSolicitud($data['estadoDeLaSolicitud']);
                $empresa->setFechaEstimadaDeRecoleccion($data['fechaEstimadaDeRecoleccion']);
                $empresa->setCantidadRequerida($data['cantidadRequerida']);
                $empresas[] = $empresa;
            }
            return $empresas;
        } catch (PDOException $ex) {
            echo 'Error al obtener las empresas: ' . $ex->getMessage();
            return [];
        }
    }
}
?>