<!-- Autor: Chavez Jimenez Andres -->
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

        if (empty($id)) {
            $_SESSION['error'] = "ID de usuario no proporcionado";
            header('Location: index.php?c=Usuario&f=listUser');
            exit();
        }

        if ($usuario == null) {
            $_SESSION['error'] = "Usuario no encontrado";
            header('Location: index.php?c=Usuario&f=listUser');
            exit();
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
            $correoEncrypted = $_POST['correo'] ?? null;
            $contrasenaEncrypted = $_POST['contrasena'] ?? null;

            // Validación básica
            if (empty($correoEncrypted) || empty($contrasenaEncrypted)) {
                echo "<script>alert('Correo o contraseña no pueden estar vacíos.');</script>";
            }

            // Desencriptar los datos (usa la misma lógica que en register)
            $correo = $this->decryptClientData($correoEncrypted);
            $contrasena = $this->decryptClientData($contrasenaEncrypted);

            if (!$correo || !$contrasena) {
                echo "Error al desencriptar los datos del formulario.";
                return;
            }

            try {
                $usuario = $this->model->login($correo, $contrasena);

                if ($usuario) {
                    $_SESSION['usuarioId'] = $usuario['id_Usuario']; // Usa el nombre real de tu campo
                    $_SESSION['nombreUsuario'] = $usuario['nombres'];
                    $_SESSION['tipoDeUsuario'] = $usuario['tipoDeUsuario'];

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
            $correoEncrypted = $_POST['correoEncrypted'] ?? '';
            $cedulaEncrypted = $_POST['cedulaEncrypted'] ?? '';
            $telefonoEncrypted = $_POST['telefonoEncrypted'] ?? '';
            $direccionEncrypted = $_POST['direccionEncrypted'] ?? '';
            $contrasenaEncrypted = $_POST['contrasenaEncrypted'] ?? '';
            $contrasenaConfirmEncrypted = $_POST['contrasenaConfirmEncrypted'] ?? '';

            $correo = $this->decryptClientData($correoEncrypted);
            $cedula = $this->decryptClientData($cedulaEncrypted);
            $telefono = $this->decryptClientData($telefonoEncrypted);
            $direccion = $this->decryptClientData($direccionEncrypted);
            $contrasena = $this->decryptClientData($contrasenaEncrypted);
            $contrasenaConfirm = $this->decryptClientData($contrasenaConfirmEncrypted);

            if ($contrasena !== $contrasenaConfirm) {
                $_SESSION['register_error'] = "Las contraseñas no coinciden.";
                header("Location: index.php?c=Usuario&f=index");
                exit();
            }

            // Ahora actualizamos POST para que populate() funcione bien
            $_POST['correo'] = $correo;
            $_POST['cedula'] = $cedula;
            $_POST['telefono'] = $telefono;
            $_POST['direccion'] = $direccion;
            $_POST['contrasena'] = $contrasena;

            $usuarioDTO = $this->populate();

            if ($this->model->insertUser($usuarioDTO, $usuarioDTO->getContrasena())) {
                $_SESSION['success_message'] = "Usuario registrado con éxito.";
                header('Location: index.php?c=index&f=index&p=login');
            } else {
                $_SESSION['register_error'] = "Error al registrar el usuario.";
                header("Location: index.php?c=Usuario&f=index");
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



    public function populate()
    {
        $user = new Usuario();
        $user->setId($_POST['id']);
        $user->setNombres($_POST['nombres']);
        $user->setCorreo($_POST['correo']);
        $user->setCedula($_POST['cedula']);
        $user->setTelefono($_POST['telefono']);
        $user->setDireccion($_POST['direccion']);
        $user->setTipoDeUsuario($_POST['tipoDeUsuario'] ?? 'Usuario');
        $user->setEstado("Activo");

        if (isset($_POST['contrasena']) && !empty($_POST['contrasena'])) {
            $user->setContrasena($_POST['contrasena']);
        } else {
            echo "Contraseña no puede ser vacía";
        }

        return $user;

    }

    private function decryptClientData($data)
    {
        $data = base64_decode($data);
        $ivlen = openssl_cipher_iv_length(METHOD);
        $iv = substr($data, 0, $ivlen);
        $ciphertext = substr($data, $ivlen);

        return openssl_decrypt($ciphertext, METHOD, KEY, OPENSSL_RAW_DATA, $iv);
    }

    private function mapToUsuario($data)
    {
        $user = new Usuario();
        $user->setId($data['id_Usuario']);
        $user->setNombres($data['nombres']);
        $user->setCorreo($data['correo']);
        $user->setCedula($data['cedula'] ?? '');
        $user->setTelefono($data['telefono']);
        $user->setDireccion($data['direccion']);
        $user->setTipoDeUsuario($data['tipoDeUsuario']);
        $user->setEstado($data['Estado']);
        return $user;
    }

}
?>