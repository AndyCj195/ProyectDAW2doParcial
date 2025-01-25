<?php
require_once 'model/dao/HistorialDAO.php';

class HistorialController {
    private $dao;

    public function __construct() {
        $this->dao = new HistorialDAO();
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action'])) {
                $action = $_POST['action'];
                $data = [
                    'FechaDeRegistro' => $_POST['fechaDeRegistro'],
                    'TipoDelMaterialReciclado' => $_POST['tipoDelMaterial'],
                    'CantidadReciclada' => $_POST['cantidadReciclada'],
                    'EstadoDelRegistro' => $_POST['estadoDelRegistro'],
                    'EmpresaRecolectora' => $_POST['empresaRecolectora'],
                ];

                if ($action === 'create') {
                    $this->dao->insertRegistro($data);
                } elseif ($action === 'update') {
                    $data['id_HistorialRegistros'] = $_POST['id_HistorialRegistros'];
                    $this->dao->updateRegistro($data);
                }

                // Recargar la página actual
                header("Location: index.php?c=Historial&f=index");
                exit();
            }
        } else {
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
                if ($action === 'edit' && isset($_GET['id_HistorialRegistros'])) {
                    $id_HistorialRegistros = $_GET['id_HistorialRegistros'];
                    $registroEdit = $this->dao->getRegistroById($id_HistorialRegistros);
                } elseif ($action === 'delete' && isset($_GET['id_HistorialRegistros'])) {
                    $id_HistorialRegistros = $_GET['id_HistorialRegistros'];
                    $this->dao->deleteRegistro($id_HistorialRegistros);

                    // Recargar la página actual
                    header("Location: index.php?c=Historial&f=index");
                    exit();
                }
            } elseif (isset($_GET['search'])) {
                $search = $_GET['search'];
                $registros = $this->dao->searchRegistros($search);
            } else {
                $registros = $this->dao->getAllRegistros();
            }
        }
        include 'view/historial/WebHistorial.php';
    }
}