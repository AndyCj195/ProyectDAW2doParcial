<?php
require_once 'config/Conexion.php';

class EmpresaDao{
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConexion();
    }

    public function crear ($tipoDeMaterialSolicitado, $zonaComunidadConsultada, $estadoDeLaSolicitud,$fechaEstimadaDeRecoleccion,$cantidadRequerida){
    try{
        $query = "INSERT INTO consultaempresas (tipoDeMaterialSolicitado, zonaComunidadConsultada, 
        estadoDeLaSolicitud, fechaEstimadaDeRecoleccion, cantidadRequerida) 
                VALUES (:tipoDeMaterialSolicitado, : zonaComunidadConsultada, :estadoDeLaSolicitud,
                 :fechaEstimadaDeRecoleccion, :cantidadRequerida)";
        $stmt = $this->conexion->prepare($query);

        $stmt->bindParam(':tipoDeMaterialSolicitado', $tipoDeMaterialSolicitado, PDO::PARAM_STR);
        $stmt->bindParam(':zonaComunidadConsultada', $zonaComunidadConsultada, PDO::PARAM_STR);
        $stmt->bindParam(':estadoDeLaSolicitud', $estadoDeLaSolicitud, PDO::PARAM_STR);
        $stmt->bindParam(':fechaEstimadaDeRecoleccion', $fechaEstimadaDeRecoleccion, PDO::PARAM_STR);
        $stmt->bindParam(':cantidadRequerida', $cantidadRequerida, PDO::PARAM_STR);
        $res = $stmt->execute();
        return $res;
    }catch(PDOException $ex){
        echo 'Error al insertar usuario: '.$ex->getMessage();
        return false;
    }
    }

    public function editar($id, $tipoDeMaterialSolicitado, $zonaComunidadConsultada, $estadoDeLaSolicitud, $fechaEstimadaDeRecoleccion, $cantidadRequerida) {
        try {
            $query = "UPDATE consultaempresas SET 
                      tipoDeMaterialSolicitado = :tipoDeMaterialSolicitado, 
                      zonaComunidadConsultada = :zonaComunidadConsultada, 
                      estadoDeLaSolicitud = :estadoDeLaSolicitud, 
                      fechaEstimadaDeRecoleccion = :fechaEstimadaDeRecoleccion, 
                      cantidadRequerida = :cantidadRequerida 
                      WHERE id = :id";
            $stmt = $this->conexion->prepare($query);
    
            $stmt->bindParam(':tipoDeMaterialSolicitado', $tipoDeMaterialSolicitado, PDO::PARAM_STR);
            $stmt->bindParam(':zonaComunidadConsultada', $zonaComunidadConsultada, PDO::PARAM_STR);
            $stmt->bindParam(':estadoDeLaSolicitud', $estadoDeLaSolicitud, PDO::PARAM_STR);
            $stmt->bindParam(':fechaEstimadaDeRecoleccion', $fechaEstimadaDeRecoleccion, PDO::PARAM_STR);
            $stmt->bindParam(':cantidadRequerida', $cantidadRequerida, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            $res = $stmt->execute();
            return $res;
        } catch (PDOException $ex) {
            echo 'Error al editar registro: ' . $ex->getMessage();
            return false;
        }
    }

    public function listar() {
        try {
            $query = "SELECT * FROM consultaempresas";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();
            
            // Obtener todos los registros
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        } catch (PDOException $ex) {
            echo 'Error al listar registros: ' . $ex->getMessage();
            return [];
        }
    }

    public function buscarPorId($id) {
        try {
            $query = "SELECT * FROM consultaempresas WHERE id = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (PDOException $ex) {
            echo 'Error al buscar registro por id: ' . $ex->getMessage();
            return null;
        }
    }

}
    
?>