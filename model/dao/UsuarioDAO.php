<!--Author: Andres Chavez Jimenez-->
<?php
require_once 'config/Conexion.php';
class UsuarioDAO
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::getConnection();
    }

    public function login($correo, $contrasena)
    {
        try {
            $query = "SELECT * FROM usuario WHERE correo = :correo";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
                return $usuario; // Usuario y contraseña correctos
            }
            return false; // Usuario no encontrado o contraseña incorrecta
        } catch (PDOException $ex) {
            echo 'Error al loguear usuario: ' . $ex->getMessage();
            return false;
        }
    }



    public function selectAll($estado)
    {
        try {
            $query = "SELECT * FROM usuario WHERE Estado = :estado";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $usuarios = [];
            foreach ($resultados as $resultado) {
                $usuario = new Usuario();
                $usuario->setId($resultado['id_Usuario']);
                $usuario->setNombres($resultado['nombres']);
                $usuario->setCorreo($resultado['correo']);
                // Desencriptar los datos antes de asignarlos
                $usuario->setCedula($this->decryptData($resultado['cedula']));
                $usuario->setTelefono($this->decryptData($resultado['telefono']));
                $usuario->setDireccion($this->decryptData($resultado['direccion']));
                $usuario->setTipoDeUsuario($resultado['tipoDeUsuario']);
                $usuario->setEstado($resultado['Estado']);
                $usuarios[] = $usuario;
            }
            return $usuarios;
        } catch (PDOException $ex) {
            echo 'Error al listar usuarios: ' . $ex->getMessage();
            return [];
        }
    }
    

    public function selectById($id)
    {
        try {
            $query = "SELECT * FROM usuario WHERE id_Usuario = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            return $resultado;
        } catch (PDOException $ex) {
            echo 'Error al buscar usuario por id: ' . $ex->getMessage();
            return null;
        }
    }
    public function insertUser($usuario, $contrasena)
    {
        try {
            $query = "INSERT INTO Usuario (nombres, correo, cedula, telefono, direccion, tipoDeUsuario, estado, contrasena) 
                    VALUES (:nombres, :correo, :cedula, :telefono, :direccion, :tipoDeUsuario, :estado, :contrasena)";
            $stmt = $this->conexion->prepare($query);

            // Asignar variables intermedias
            $nombres = $usuario->getNombres();
            $correo = $usuario->getCorreo();

            $cedula = $this->encryptData($usuario->getCedula());
            $telefono = $this->encryptData($usuario->getTelefono());
            $direccion = $this->encryptData($usuario->getDireccion());
            $tipoDeUsuario = $usuario->getTipoDeUsuario();
            $estado = $usuario->getEstado();
            $hashedPassword = password_hash($contrasena, PASSWORD_BCRYPT);

            $stmt->bindParam(':nombres', $nombres, PDO::PARAM_STR);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->bindParam(':cedula', $cedula, PDO::PARAM_STR);
            $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
            $stmt->bindParam(':tipoDeUsuario', $tipoDeUsuario, PDO::PARAM_STR);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
            $stmt->bindParam(':contrasena', $hashedPassword, PDO::PARAM_STR);

            $res = $stmt->execute();


            return $res;
        } catch (PDOException $ex) {
            echo 'Error al insertar usuario: ' . $ex->getMessage();
            return false;
        }
    }



    public function updateUser($usuario)
    {
        try {
            $sql = "UPDATE usuario 
                    SET nombres = :nombres, correo = :correo, cedula = :cedula, 
                        telefono = :telefono, direccion = :direccion, tipoDeUsuario = :tipoDeUsuario 
                    WHERE id_Usuario = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(":id", $usuario->getId(), PDO::PARAM_INT);
            $stmt->bindParam(":nombres", $usuario->getNombres(), PDO::PARAM_STR);
            $stmt->bindParam(":correo", $usuario->getCorreo(), PDO::PARAM_STR);
            $stmt->bindParam(":cedula", $usuario->getCedula(), PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $usuario->getTelefono(), PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $usuario->getDireccion(), PDO::PARAM_STR);
            $stmt->bindParam(":tipoDeUsuario", $usuario->getTipoDeUsuario(), PDO::PARAM_STR);

            $res = $stmt->execute();
            return $res;
        } catch (PDOException $ex) {
            error_log("Error en update de UsuarioDAO: " . $ex->getMessage());
            return false;
        }
    }

    // Eliminar un usuario por su ID (borrado físico)
    public function deleteUser($id)
    {
        try {
            $query = "DELETE FROM usuario WHERE id_Usuario = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $res = $stmt->execute();
            return $res;
        } catch (PDOException $ex) {
            echo 'Error al eliminar usuario: ' . $ex->getMessage();
            return false;
        }
    }

    //Borrado Lógico de un usuario
    public function UpdateEstado($id, $estado)
    {
        try {
            $query = "UPDATE usuario SET estado = :estado WHERE id_Usuario = :id";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
            $res = $stmt->execute();
            return $res;
        } catch (PDOException $ex) {
            echo 'Error al actualizar el estado del usuario: ' . $ex->getMessage();
            return false;
        }
    }

    // Método para verificar si el correo ya está registrado
    function selectByCorreo($correo)
    {
        try {
            $query = "SELECT COUNT(*) FROM usuario WHERE correo = :correo";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $ex) {
            echo 'Error al verificar si el correo existe: ' . $ex->getMessage();
            return false;
        }
    }

    //metodo para encriptar 
    function encryptData($data)
    {
        $ivlen = openssl_cipher_iv_length(METHOD);
        $iv = openssl_random_pseudo_bytes($ivlen);

        $encrypted = openssl_encrypt($data, METHOD, KEY, OPENSSL_RAW_DATA, $iv);

        return base64_encode($iv . $encrypted);
    }

    //metodo para desencriptar
    function decryptData($data)
    {
        $data = base64_decode($data);

        $ivlen = openssl_cipher_iv_length(METHOD);
        if (strlen($data) < $ivlen) {
            return false; // Datos inválidos
        }
        $iv = substr($data, 0, $ivlen);
        $descrypt = substr($data, $ivlen);

        return openssl_decrypt($descrypt, METHOD, KEY, OPENSSL_RAW_DATA, $iv);
    }



}

?>