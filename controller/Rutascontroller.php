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
            require_once 'view/RutasRecoleccion/RutasR.Verlista.php'; // Vista que lista todas las rutas
        } catch (Exception $e) {
            echo "Error al cargar las rutas: " . $e->getMessage();
        } //require_once VRUTAS."Verlista.php";
    }


    public function createForm() {
        require_once 'view/RutasRecoleccion/create.php'; // Vista del formulario para crear rutas
    }

 
    public function create() {
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


    public function editForm($id) {
        $ruta = $this->rutaDAO->readById($id);
        if ($ruta) {
            require_once 'view/RutasRecoleccion/edit.php'; // Vista del formulario para editar rutas
        } else {
            echo "Ruta no encontrada.";
        }
    }


    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $fecha = $_POST['FechaDeRecoleccion'];
            $hora = $_POST['HoraDeRecoleccion'];
            $materiales = $_POST['materialesARecoger'];
            $empresa = $_POST['EmpresaEncargada'];
            $sector = $_POST['SectorCubierto'];
            $vehiculo = $_POST['VehiculoAsignado'];

            $rutaDTO = new RutasRecoleccionDTO($id, $fecha, $hora, $materiales, $empresa, $sector, $vehiculo);

            if ($this->rutaDAO->update($rutaDTO)) {
                header("Location: index.php?c=Rutas&f=index");
                exit;
            } else {
                echo "Error al actualizar la ruta.";
            }
        }
    }

 
    public function delete($id) {
        if ($this->rutaDAO->delete($id)) {
            header("Location: index.php?c=Rutas&f=index");
            exit;
        } else {
            echo "Error al eliminar la ruta.";
        }
    }
}
?>
