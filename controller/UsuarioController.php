<?php

require_once 'model/dto/Usuario.php';
require_once 'model/dao/UsuarioDAO.php';

class UsuarioController{
    private $model;

    public function __construct(){
        $this->model = new UsuarioDAO();
    }

    public function index(){
        $titulo = "Nuevo Usuario";
        require_once VUSUARIO.'register.php';
    }


    public function login() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $correo = $_POST['correo'] ?? null;
        $contrasena = $_POST['contrasena'] ?? null;

        if (empty($correo) || empty($contrasena)) {
            echo "Correo o contraseña no pueden estar vacíos.";
            return;
        }

        try {
            // Verifica si el usuario existe
            $usuario = $this->model->login($correo, $contrasena);

            if ($usuario) {
                // Configura la sesión con los datos del usuario
                $_SESSION['usuarioId'] = $usuario['id'];
                $_SESSION['nombreUsuario'] = $usuario['nombres'];
                $_SESSION['tipoDeUsuario'] = $usuario['tipoDeUsuario'];
                
                echo "Inicio de sesión exitoso. Bienvenido, " . $_SESSION['nombreUsuario'];
                header("Location: index.php"); // Redirige al inicio
                exit;
            } else {
                echo "Correo o contraseña incorrectos.";
            }
        } catch (Exception $ex) {
            echo "Error en el login: " . $ex->getMessage();
        }
        }
    }

    public function logout() {
        session_start();
        // Elimina las variables de sesión
        session_unset();
        // Destruye la sesión
        session_destroy();
        // Redirige al inicio
        header("Location: index.php");
    }

    public function register(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarioDTO = $this->populate();
            // Insertar el usuario con contraseña hasheada
            if ($this->model->insertUser($usuarioDTO, $usuarioDTO->getContrasena())) {
                echo "Usuario registrado con éxito.";
                header('Location: index.php?c=index&f=index&p=login');
            } else {
                echo "Error al registrar el usuario.";
            }
        }
    }

    public function listUser(){
        $usuarios = $this->model->selectAll("Activo");
        $titulo = "Listado de Usuarios";
        require_once VUSUARIO.'list.php';
    }

    public function view_edit(){
        $id = htmlentities($_GET['id']);
        $usuario = $this->model->selectById($id);
        if($usuario == null){
            $_SESSION['error'] = "Usuario no encontrado";
            header('Location: index.php?c=Usuario&f=listUser');
        }

        $titulo = "Editar Usuario";
        require_once VUSUARIO.'edit.php';
    }

    public function view_dump(){
        $usuarios = $this->model->selectByStatus('Inactivo');
        $titulo = "Listado de Usuarios Inactivos";
        require_once VUSUARIO.'dump.php';
    }

    public function populate(){
        $user = new Usuario();
        $user->setNombres($_POST['nombres']);
        $user->setCorreo($_POST['correo']);
        $user->setCedula($_POST['cedula']);
        $user->setTelefono($_POST['telefono']);
        $user->setDireccion($_POST['direccion']);
        $user->setTipoDeUsuario($_POST['tipoDeUsuario']?? 'Usuario');
        $user->setEstado("Activo");
        
        if(isset($_POST['contrasena'])&& !empty($_POST['contrasena'])){
            $user->setContrasena($_POST['contrasena']);
        }else{
            echo "Contraseña no puede ser vacía";
        }

        return $user;

    }
}
?>