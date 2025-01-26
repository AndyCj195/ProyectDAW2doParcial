<!--Author: Jorge Suárez Valarezo-->    
<?php
require_once 'model/dao/HistorialDAO.php';

class HistorialController {
    private $dao;

    public function __construct() {
        $this->dao = new HistorialDAO();
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lógica para manejar creación y edición
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
    
                // Redirigir después de realizar la acción
                header("Location: index.php?c=Historial&f=list");
                exit();
            }
        } else {
            if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id_HistorialRegistros'])) {
                // Obtener datos para edición
                $id_HistorialRegistros = $_GET['id_HistorialRegistros'];
                $registroEdit = $this->dao->getRegistroById($id_HistorialRegistros);
            }
            $titulo = 'Registro de materiales reciclados';
            include 'view/historial/WebHistorial.php';
        }
    }

    public function list() {
        // Lógica para mostrar la lista y manejar la búsqueda
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $registros = $this->dao->searchRegistros($search);
        } else {
            $registros = $this->dao->getAllRegistros();
        }
    
        // Lógica para eliminación
        if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id_HistorialRegistros'])) {
            $id_HistorialRegistros = $_GET['id_HistorialRegistros'];
            $this->dao->deleteRegistro($id_HistorialRegistros);
    
            // Redirigir después de eliminar
            header("Location: index.php?c=Historial&f=list");
            exit();
        }
        $titulo = 'Historial de Registros';
        include VHISTORIAL.'list.php';
    }
    
}