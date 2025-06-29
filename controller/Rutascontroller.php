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
        $titulo = "Listado de Rutas de Recolección";
        try {
            $rutas = $this->rutaDAO->readAll();
            require_once VRUTAS . 'Verlista.php'; // Vista que lista todas las rutas
        } catch (Exception $e) {
            $_SESSION['error'] = "Error al cargar las rutas: " . $e->getMessage();
            header("Location: index.php");
        }
    }

    public function view_create() {
        $titulo = "Crear Ruta de Recolección";
        require_once VRUTAS . 'CrearLista.php'; // Vista del formulario para crear rutas
    }


    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $rutaDTO = $this->populate();
                if ($this->rutaDAO->create($rutaDTO)) {
                    $_SESSION['exito'] = "Ruta creada con éxito.";
                    header("Location: index.php?c=Rutas&f=index");
                } else {
                    $_SESSION['error'] = "Error al crear la ruta.";
                    header("Location: index.php?c=Rutas&f=view_create");
                }
            } catch (Exception $e) {
                $_SESSION['error'] = "Error al procesar la solicitud: " . $e->getMessage();
                header("Location: index.php?c=Rutas&f=view_create");
            }
        }
    }
    
    


    public function view_edit() {
        $id = htmlentities($_GET['id'] ?? null);
        if (!$id) {
            $_SESSION['error'] = "ID no válido.";
            header("Location: index.php?c=Rutas&f=index");
        }

        $ruta = $this->rutaDAO->readById($id);
        if (!$ruta) {
            $_SESSION['error'] = "Ruta no encontrada.";
            header("Location: index.php?c=Rutas&f=index");
        }

        $titulo = "Editar Ruta de Recolección";
        require_once VRUTAS . 'EditarLista.php'; // Vista del formulario para editar rutas
    }
    
    


    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $rutaDTO = $this->populate();
                if ($this->rutaDAO->update($rutaDTO)) {
                    $_SESSION['exito'] = "Ruta actualizada con éxito.";
                    header("Location: index.php?c=Rutas&f=index");
                } else {
                    $_SESSION['error'] = "Error al actualizar la ruta.";
                    header("Location: index.php?c=Rutas&f=view_edit&id=" . $rutaDTO->getId());
                }
            } catch (Exception $e) {
                $_SESSION['error'] = "Error al procesar la solicitud: " . $e->getMessage();
                header("Location: index.php?c=Rutas&f=view_edit&id=" . htmlentities($_POST['id_RutasRecoleccion']));
            }
        }
    }

    public function delete() {
        $id = htmlentities($_GET['id'] ?? null);
        if (!$id) {
            $_SESSION['error'] = "ID no válido.";
            header("Location: index.php?c=Rutas&f=index");
        }

        try {
            if ($this->rutaDAO->delete($id)) {
                $_SESSION['exito'] = "Ruta eliminada con éxito.";
                header("Location: index.php?c=Rutas&f=index");
            } else {
                $_SESSION['error'] = "Error al eliminar la ruta.";
                header("Location: index.php?c=Rutas&f=index");
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Error al procesar la solicitud: " . $e->getMessage();
            header("Location: index.php?c=Rutas&f=index");
        }
    }

    private function populate() {
        $id = filter_var($_POST['id_RutasRecoleccion'] ?? null, FILTER_VALIDATE_INT);
        $fecha = $_POST['FechaDeRecoleccion'] ?? null;
        $hora = $_POST['HoraDeRecoleccion'] ?? null;
        $materiales = $_POST['materialesARecoger'] ?? null;
        $empresa = $_POST['EmpresaEncargada'] ?? null;
        $sector = $_POST['SectorCubierto'] ?? null;
        $vehiculo = $_POST['VehiculoAsignado'] ?? null;

        if (!$fecha || !$hora || !$materiales || !$empresa || !$sector || !$vehiculo) {
            throw new Exception("Todos los campos son obligatorios.");
        }

        return new RutasRecoleccionDTO($id, $fecha, $hora, $materiales, $empresa, $sector, $vehiculo);
    }
}
?>
