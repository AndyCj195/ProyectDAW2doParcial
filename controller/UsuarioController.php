<?php

require_once 'model/dto/Usuario.php';
require_once 'model/dao/UsuarioDAO.php';
class UsuarioController
{
    private $model;

    public function __construct()
    {
        $this->model = new UsuarioDAO();
    }

    public function index()
    {
        $titulo = "Nuevo Usuario";
        require_once VUSUARIO . 'register.php';
    }

    public function view_edit()
    {
        $id = htmlentities($_GET['id']);
        $usuario = $this->model->selectById($id);
        if ($usuario == null) {
            $_SESSION['error'] = "Usuario no encontrado";
            header('Location: index.php?c=Usuario&f=listUser');
        }

        $titulo = "Editar Usuario";
        require_once VUSUARIO . 'edit.php';
    }

    public function view_dump()
    {
        $usuarios = $this->model->selectAll('Inactivo');
        $titulo = "Listado de Usuarios Inactivos";
        require_once VUSUARIO . 'basurero.php';
    }

    public function login()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Desencriptar datos que vienen del cliente
            $correoEncrypted = $_POST['correo'] ?? null;
            $contrasenaEncrypted = $_POST['contrasena'] ?? null;

            $correo = $this->decryptClientData($correoEncrypted);
            $contrasena = $this->decryptClientData($contrasenaEncrypted);

            if (empty($correo) || empty($contrasena)) {
                echo "Correo o contraseña no pueden estar vacíos.";
                return;
            }

            try {
                // Verifica si el usuario existe
                $usuario = $this->model->login($correo, $contrasena);

                if ($usuario) {
                    $_SESSION['usuarioId'] = $usuario['id'];
                    $_SESSION['nombreUsuario'] = $usuario['nombres'];
                    $_SESSION['tipoDeUsuario'] = $usuario['tipoDeUsuario'];

                    echo "Inicio de sesión exitoso. Bienvenido, " . $_SESSION['nombreUsuario'];
                    header("Location: index.php");
                    exit;
                } else {
                    echo "Correo o contraseña incorrectos.";
                }
            } catch (Exception $ex) {
                echo "Error en el login: " . $ex->getMessage();
            }
        }
    }


    public function logout()
    {
        session_start();
        // Elimina las variables de sesión
        session_unset();
        // Destruye la sesión
        session_destroy();
        // Redirige al inicio
        header("Location: index.php");
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Desencriptar datos antes de poblar
            $correo = $this->decryptClientData($_POST['correoEncrypted'] ?? '');
            $nombres = $this->decryptClientData($_POST['nombreEncrypted'] ?? '');
            $cedula = $this->decryptClientData($_POST['cedulaEncrypted'] ?? '');
            $telefono = $this->decryptClientData($_POST['telefonoEncrypted'] ?? '');
            $direccion = $this->decryptClientData($_POST['direccionEncrypted'] ?? '');
            $contrasena = $this->decryptClientData($_POST['contrasenaEncrypted'] ?? '');
            $contrasenaConfirm = $this->decryptClientData($_POST['contrasenaConfirmEncrypted'] ?? '');

            if ($contrasena !== $contrasenaConfirm) {
                echo "Las contraseñas no coinciden.";
                return;
            }

            // Sobrescribir $_POST para que populate funcione
            $_POST['nombres'] = $nombres;
            $_POST['correo'] = $correo;
            $_POST['cedula'] = $cedula;
            $_POST['telefono'] = $telefono;
            $_POST['direccion'] = $direccion;
            $_POST['contrasena'] = $contrasena;

            $usuarioDTO = $this->populate();

            if ($usuarioDTO === null) {
                return;
            }

            if ($this->model->insertUser($usuarioDTO, $usuarioDTO->getContrasena())) {
                echo "Usuario registrado con éxito.";
                header('Location: index.php?c=index&f=index&p=login');
            } else {
                echo "Error al registrar el usuario.";
            }
        }
    }

    public function delete()
    {
        $id = htmlentities($_REQUEST['id'] ?? "");
        if ($this->model->deleteUser($id)) {
            echo "Usuario Dado de baja.";
            header('Location: index.php?c=Usuario&f=listUser');
        } else {
            echo "Error al eliminar el usuario.";
        }
    }

    public function logicalDeleteUser()
    {
        $id = htmlentities($_REQUEST['id'] ?? "");
        $estado = "Inactivo";
        if ($this->model->UpdateEstado($id, $estado)) {
            echo "Usuario Dado de baja.";
            header('Location: index.php?c=Usuario&f=view_dump');
        } else {
            echo "Error al eliminar el usuario.";
        }
    }

    public function restoreUser()
    {
        $id = htmlentities($_REQUEST['id'] ?? "");
        $estado = "Activo";
        if ($this->model->UpdateEstado($id, $estado)) {
            echo "Usuario Restaurado.";
            header('Location: index.php?c=Usuario&f=view_dump');
        } else {
            echo "Error al restaurar el usuario.";
        }
    }
    public function listUser()
    {
        $usuarios = $this->model->selectAll("Activo");
        $titulo = "Listado de Usuarios";
        require_once VUSUARIO . 'list.php';
    }



    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $_SESSION['error'] = "Acceso no permitido";
            header('Location: index.php?c=Usuario&f=listUser');
        }
        $user = $this->populate();
        $exito = $this->model->updateUser($user);
        if ($exito) {
            $_SESSION['exito'] = "Usuario actualizado con éxito";
            header('Location: index.php?c=Usuario&f=listUser');
        }
    }



    public function populate(){
        $user = new Usuario();
        $user->setId($_POST['id'] ?? null);
        $user->setNombres($_POST['nombres']);
        $user->setCorreo($_POST['correo']);
        $user->setCedula($_POST['cedula']);
        $user->setTelefono($_POST['telefono']);
        $user->setDireccion($_POST['direccion']);
        $user->setTipoDeUsuario($_POST['tipoDeUsuario'] ?? 'Usuario');
        $user->setEstado("Activo");

        if (!empty($_POST['contrasena'])) {
            $user->setContrasena($_POST['contrasena']);
        } else {
            echo "Contraseña no puede ser vacía.";
            return null;
        }

        return $user;
    }

    private function decryptClientData($data) {
        $data = base64_decode($data);
        $ivlen = openssl_cipher_iv_length(METHOD);
        $iv = substr($data, 0, $ivlen);
        $encrypted = substr($data, $ivlen);
        return openssl_decrypt($encrypted, METHOD, KEY, OPENSSL_RAW_DATA, $iv);
    }
}
?>