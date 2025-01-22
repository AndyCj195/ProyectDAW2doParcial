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

    public function register(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarioDTO = $this->populate();
            // Insertar el usuario con contraseña hasheada
            if ($this->model->insertUser($usuarioDTO, $usuarioDTO->getContrasena())) {
                echo "Usuario registrado con éxito.";
            } else {
                echo "Error al registrar el usuario.";
            }
        }
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