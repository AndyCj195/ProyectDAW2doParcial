<?php
require_once 'config/Conexion.php';
require_once 'model/dto/HistorialRegistro.php';

class HistorialDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::getConnection();
    }

    public function getRegistroById($id_HistorialRegistros) {
        $sql = "SELECT * FROM historialregistros WHERE id_HistorialRegistros = :id_HistorialRegistros";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_HistorialRegistros' => $id_HistorialRegistros]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertRegistro($data) {
        $sql = "INSERT INTO historialregistros (FechaDeRegistro, TipoDelMaterialReciclado, CantidadReciclada, EstadoDelRegistro, EmpresaRecolectora)
                VALUES (:FechaDeRegistro, :TipoDelMaterialReciclado, :CantidadReciclada, :EstadoDelRegistro, :EmpresaRecolectora)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function getAllRegistros() {
        $sql = "SELECT * FROM historialregistros";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateRegistro($data) {
        $sql = "UPDATE historialregistros
                SET FechaDeRegistro = :FechaDeRegistro, 
                    TipoDelMaterialReciclado = :TipoDelMaterialReciclado, 
                    CantidadReciclada = :CantidadReciclada, 
                    EstadoDelRegistro = :EstadoDelRegistro, 
                    EmpresaRecolectora = :EmpresaRecolectora
                WHERE id_HistorialRegistros = :id_HistorialRegistros";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function deleteRegistro($id_HistorialRegistros) {
        $sql = "DELETE FROM historialregistros WHERE id_HistorialRegistros = :id_HistorialRegistros";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_HistorialRegistros' => $id_HistorialRegistros]);
    }

    public function searchRegistros($search) {
        $sql = "SELECT * FROM historialregistros 
                WHERE TipoDelMaterialReciclado LIKE :search OR EmpresaRecolectora LIKE :search";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['search' => '%' . $search . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}