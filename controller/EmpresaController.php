<?php
require_once 'model/dao/EmpresaDao.php';
require_once 'model/dto/Empresa.php';

class EmpresaController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new EmpresaDao();
    }

    public function index()
    {
        $titulo = "Lista de Empresas";
        $empresas = $this->modelo->obtenerTodas(); 
        require_once VEMPRESA . 'listar.php'; 
    }

    public function view_edit()
    {
        $id = htmlentities($_GET['id']);
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!empty($id)) {
                if ($this->modelo->obtenerPorId($id)) {
                    $titulo = "Editar Empresa";
                    require_once VEMPRESA . 'editar.php'; 
                } else {
                    echo 'Empresa no encontrada';
                }
            } else {
                echo 'ID de empresa no especificado';
            }
        }
    }

    public function edit(){
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            echo "Método no permitido";
            header('Location: index.php?c=Empresa&f=index');
        }
        $empresa = $this->populate();
        $exito = $this->modelo->editar($empresa);
        if($exito){
            header('Location: index.php?c=Empresa&f=index');
        }else{
            echo "Error al editar la empresa";
        }
    }

    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $empresa = $this->populate(); 
            if ($this->modelo->crear($empresa)) {
                header('Location: index.php?c=Empresa&f=index'); 
            } else {
                echo 'Error al crear empresa';
            }
        }
        $titulo = "Nueva Empresa";
        require_once VEMPRESA . 'crear.php'; 
    }





    public function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['id'])) {
                if ($this->modelo->eliminar($_GET['id'])) {
                    header('Location: index.php?c=Empresa&f=index'); 
                } else {
                    echo 'Error al eliminar empresa';
                }
            } else {
                echo 'ID de empresa no especificado';
            }
        }
    }

    private function populate()
    {
        $empresa = new Empresa();
        $materiales = isset($_POST['materiales']) ? implode(", ", $_POST['materiales']) : null;
        $empresa->setTipoDeMaterialSolicitado($materiales);
        $empresa->setZonaComunidadConsultada(isset($_POST['zona']) ? $_POST['zona'] : null);
        $empresa->setEstadoDeLaSolicitud(isset($_POST['estado']) ? $_POST['estado'] : null);
        $empresa->setFechaEstimadaDeRecoleccion(isset($_POST['fecha_recoleccion']) ? $_POST['fecha_recoleccion'] : null);
        $empresa->setCantidadRequerida(isset($_POST['cantidad']) ? $_POST['cantidad'] : null);

        return $empresa;
    }
}
?>