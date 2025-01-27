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
                    $this->dao->insertRegistro($data); // Insertar nuevo registro
                } elseif ($action === 'update') {
                    $data['id_HistorialRegistros'] = $_POST['id_HistorialRegistros'];
                    $this->dao->updateRegistro($data); // Actualizar registro existente
                }

                // Redirigir después de guardar
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
            $registros = $this->dao->getAllRegistros(); // Obtener todos los registros para mostrarlos
            include 'view/historial/WebHistorial.php';
        }
    }

    public function list() {
        if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id_HistorialRegistros'])) {
            // Eliminar registro
            $id_HistorialRegistros = $_GET['id_HistorialRegistros'];
            $this->dao->deleteRegistro($id_HistorialRegistros);

            // Redirigir después de eliminar
            header("Location: index.php?c=Historial&f=list");
            exit();
        }

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $registros = $this->dao->searchRegistros($search); // Buscar registros
        } else {
            $registros = $this->dao->getAllRegistros(); // Obtener todos los registros
        }

        $titulo = 'Historial de Registros';
        include VHISTORIAL . 'list.php';
    }
}

