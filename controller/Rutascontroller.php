<?php
//autor: CESAR XAVIER VILLACIS ALVIA
require_once 'model/dao/RutaRecoleccionDao.php';
require_once 'model/dto/RutasRecoleccionDTO.php';

class RutasController {
    private $rutaDAO;

    public function __construct() {
        $this->rutaDAO = new RutasRecoleccionDAO();
    }

    public function index() {
        try {
            $rutas = $this->rutaDAO->readAll();
            require_once VRUTAS .'Verlista.php'; // Vista que lista todas las rutas
        } catch (Exception $e) {
            echo "Error al cargar las rutas: " . $e->getMessage();
        } 
    }

    public function createForm() {
        $titulo = "Crear rutas";
        require_once 'view/RutasRecoleccion/RutasR.CrearLista.php'; // Vista del formulario para crear rutas
    }


    public function create(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fecha = $_POST['FechaDeRecoleccion'];
            $hora = $_POST['HoraDeRecoleccion'];
            $materiales = $_POST['materialesARecoger'];
            $empresa = $_POST['EmpresaEncargada'];
            $sector = $_POST['SectorCubierto'];
            $vehiculo = $_POST['VehiculoAsignado'];
    
            $rutaDTO = new RutasRecoleccionDTO(null, $fecha, $hora, $materiales, $empresa, $sector, $vehiculo);
    
            if ($this->rutaDAO->create($rutaDTO)) {
                header("Location: index.php?c=Rutas&f=index");
                exit;
            } else {
                echo "Error al crear la ruta.";
            }
        }
    }
    
    


    public function editForm() {
        $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
    
        if (!$id) {
            die("ID no válido.");
        }
    
        $ruta = $this->rutaDAO->readById($id);
    
        if (!$ruta) {
            die("Ruta no encontrada.");
        }
    
        // Ajusta la ruta al archivo correcto
        require_once __DIR__ . "/../view/RutasRecoleccion/RutasR.EditarLista.php";
    }
    
    


    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_var($_POST['id_RutasRecoleccion'], FILTER_VALIDATE_INT);
            $fecha = $_POST['FechaDeRecoleccion'];
            $hora = $_POST['HoraDeRecoleccion'];
            $materiales = $_POST['materialesARecoger'];
            $empresa = $_POST['EmpresaEncargada'];
            $sector = $_POST['SectorCubierto'];
            $vehiculo = $_POST['VehiculoAsignado'];
    
            // Validación básica
            if (!$id || !$fecha || !$hora || !$materiales || !$empresa || !$sector) {
                echo "Todos los campos obligatorios deben ser llenados.";
                return;
            }
    
            // Crear DTO con los datos
            $rutaDTO = new RutasRecoleccionDTO($id, $fecha, $hora, $materiales, $empresa, $sector, $vehiculo);
    
            // Actualizar en la base de datos
            if ($this->rutaDAO->update($rutaDTO)) {
                header("Location: index.php?c=Rutas&f=index");
                exit;
            } else {
                echo "Error al actualizar la ruta.";
            }
        }
    }
    

 
    public function delete($id) {
        // Validación básica del ID
        if (!$id || !is_numeric($id)) {
            echo "ID no válido para eliminar.";
            return;
        }

        if ($this->rutaDAO->delete($id)) {
            header("Location: index.php?c=Rutas&f=index");
            exit;
        } else {
            echo "Error al eliminar la ruta.";
        }
    }
}
?>
