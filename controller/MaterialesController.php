<?php
require_once 'model/dto/Materiales.php';
require_once 'model/dao/MaterialesDAO.php';

class GestionMaterialesController
{
    private $model;

    public function __construct(){
        $this->model = new MaterialesDAO();
    }

    // Muestra todos los materiales
    public function index(){
        $resultados = $this->model->selectAll("");
        $titulo = "Listar materiales";
        require_once VMATERIALES . 'list.php';
    }

    // Busca materiales
    public function search(){
        $parametro = htmlentities($_POST['b'] ?? "");
        $resultados = $this->model->selectAll($parametro);
        $titulo = "Buscar materiales";
        require_once VMATERIALES . 'list.php';
    }

    // Elimina un material
    public function delete(){
        $id = htmlentities($_REQUEST['id'] ?? "");
        $exito = $this->model->logicalDelete($id);
        $this->redirectWithMessage($exito, "Material eliminado exitosamente", "No se pudo realizar la eliminación", "index.php?c=gestionmateriales&f=index");
    }

    // Muestra la vista para crear un nuevo material
    public function view_new(){
        $titulo = "Nuevo material";
        require_once VMATERIALES . 'nuevo.php';
    }

    // Crea un nuevo material
    public function new(){
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            $_SESSION["mensaje"] = "Método no permitido";
            $_SESSION["color"] = "danger";
            header("Location: index.php?c=gestionmateriales&f=index");
        }
        if (empty($_POST["descripcion"]) || empty($_POST["cantidad"])) {
            $_SESSION["mensaje"] = "Datos incompletos";
            $_SESSION["color"] = "danger";
            header("Location: index.php?c=gestionmateriales&f=index");
        }

        $material = $this->populate();
        $exito = $this->model->insert($material);
        $this->redirectWithMessage($exito, "Material insertado exitosamente", "No se pudo realizar la inserción", "index.php?c=gestionmateriales&f=index");
    }

    // Muestra la vista para editar un material
    public function view_edit(){
        $id = htmlentities($_GET["id"]);
        $material = $this->model->selectOne($id);
        if ($material == null) {
            $_SESSION["mensaje"] = "No se pudo encontrar el material a editar";
            $_SESSION["color"] = "danger";
            header("Location: index.php?c=gestionmateriales&f=index");
        }
        $titulo = "Editar material";
        require_once VMATERIALES . 'edit.php';
    }

    // Edita un material
    public function edit(){
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            $_SESSION["mensaje"] = "Método no permitido";
            $_SESSION["color"] = "danger";
            header("Location: index.php?c=gestionmateriales&f=index");
        }
        if (empty($_POST["descripcion"]) || empty($_POST["cantidad"])) {
            $_SESSION["mensaje"] = "Datos incompletos";
            $_SESSION["color"] = "danger";
            header("Location: index.php?c=gestionmateriales&f=index");
        }

        $material = $this->populate();
        $exito = $this->model->update($material);
        $this->redirectWithMessage($exito, "Material actualizado exitosamente", "No se pudo realizar la actualización", "index.php?c=gestionmateriales&f=index");
    }

    // Redirige con mensaje
    public function redirectWithMessage($exito, $exitoMsg, $errMsg, $redirectUrl){
        if (!isset($_SESSION)) session_start();
        $_SESSION['mensaje'] = ($exito) ? $exitoMsg : $errMsg;
        $_SESSION['color'] = ($exito) ? 'primary' : 'danger';
        header("Location: $redirectUrl");
    }

    // Popula un objeto Material
    public function populate() {
        $material = new Materiales();
        $material->setId(htmlentities($_POST['id'] ?? null)); 
        $material->setTipoDeMateriales(htmlentities($_POST['tipoDeMateriales']));
        $material->setCantidadTotalKg(htmlentities($_POST['cantidadTotalKg']));
        $material->setEstadoDelMaterial(htmlentities($_POST['estadoDelMaterial']));
        $material->setComunidadZonaAsociada(htmlentities($_POST['comunidadZonaAsociada']));
        $material->setEmpresaAsignada(htmlentities($_POST['empresaAsignada']));
        return $material;
    }
    
}
?>
