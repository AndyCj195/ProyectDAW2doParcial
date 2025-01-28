<!--Author: Jorge Suárez Valarezo-->    
<?php
require_once 'model/dao/HistorialDAO.php';

class HistorialController {
    private $dao;

    public function __construct() {
        $this->dao = new HistorialDAO();
    }

    public function index() {
        $search = ''; // Inicializar la variable de búsqueda
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

                header("Location: index.php?c=Historial&f=list");
                exit();
            }
        } else {
            if (isset($_GET['search'])) {
                $search = $_GET['search']; // Recuperar el término de búsqueda
                $registros = $this->dao->searchRegistros($search);
            } else {
                $registros = $this->dao->getAllRegistros();
            }

            if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id_HistorialRegistros'])) {
                $id_HistorialRegistros = $_GET['id_HistorialRegistros'];
                $registroEdit = $this->dao->getRegistroById($id_HistorialRegistros);
            }

            $titulo = 'Registro de materiales reciclados';
            include 'view/historial/WebHistorial.php';
        }
    }

    public function list() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id_HistorialRegistros'])) {
            $id_HistorialRegistros = $_GET['id_HistorialRegistros'];
            $this->dao->deleteRegistro($id_HistorialRegistros);

            header("Location: index.php?c=Historial&f=list");
            exit();
        }

        $registros = $this->dao->searchRegistros($search) ?? $this->dao->getAllRegistros();
        $titulo = 'Historial de Registros';
        include VHISTORIAL . 'list.php';
    }
}