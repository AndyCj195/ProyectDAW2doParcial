<?php
/*require_once 'UsuarioDAO.php';
require_once 'UsuarioDTO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombres = $_POST['nombres'];
    $correo = $_POST['correo'];
    $cedula = $_POST['cedula'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $tipoDeUsuario = $_POST['tipoDeUsuario'];
    $contraseña = $_POST['contraseña'];

    $usuarioDAO = new UsuarioDAO();
    $usuarioDTO = new Usuario ($nombres, $correo, $cedula, $telefono, $direccion, $tipoDeUsuario, "Activo");

    // Insertar el usuario con contraseña hasheada
    if ($usuario->insert($usuarioDTO, $contraseña)) {
        echo "Usuario registrado con éxito.";
    } else {
        echo "Error al registrar el usuario.";
    }
}*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <main>
    <div id="div-main">
        <div>
            <img src="assets/img/logo.png" alt="Logo" style="width: 200px;">
        </div>
        <div id="formulario">
            <div class="titulo" style="color: #2e7d32;">
                <h1>Registro de Usuario</h1>
            </div>
                <form action="index.php?c=Usuario&f=register" method="POST" name="form-register" id="form-register">
                    <div class="form-row">
                        <div class="seccion" style="display: block;">
                            <div id="div-nombre">
                                <label for="nombres">Nombres</label><br>
                                <input type="text" name="nombres" id="input-nombres">
                                <div class="error-message" id="error-nombre"></div>
                            </div>
                        </div>
                        <div class="seccion" style="display: block;">
                            <div class="div-correo">
                                <label for="correo">Correo</label><br>
                                <input type="email" name="correo" id="input-correo">
                                <div class="error-message" id="error-correo"></div>
                            </div>
                        </div>
                        <div class="seccion">
                            <div class="div-CI">
                                <label for="cedula">Cedula</label><br>
                                <input type="text" name="cedula" id="input-cedula">
                                <div class="error-message" id="error-cedula"></div>
                            </div>
                            <div class="div-telefono">
                                <label for="telefono">Telefono</label><br>
                                <input type="text" name="telefono" id="input-telefono">
                                <div class="error-message" id="error-telefono"></div>
                            </div>
                        </div>
                        <div class="seccion">
                            <div class="div-direccion">
                                <label for="direccion">Direccion</label><br>
                                <input type="text" name="direccion" id="input-direccion">
                                <div class="error-message" id="error-direccion"></div>
                            </div>
                        </div>
                        <div class="seccion">
                            <div class="div-tipoDeUsuario">
                                <label for="tipoDeUsuario">Tipo de Usuario</label><br>
                                <select name="tipoDeUsuario" id="input-tipoDeUsuario">
                                    <option value="">Seleccione un tipo de usuario...</option>
                                    <option value="Usuario">Usuario</option>
                                    <option value="Empresa">Empresa</option>
                                </select>
                                <div class="error-message" id="error-tipoUsuario"></div>
                            </div>
                        </div>
                        <div class="seccion">
                            <div class="div-contrasena">
                                <label for="contrasena">Contraseña:</label><br>
                                <input type="password" id="contrasena" name="contrasena">
                                <div class="error-message" id="error-contrasena"></div>
                            </div>
                            <div class="div-contra2">
                                <label for="idContrasena2">Confirmar Contraseña:</label><br>
                                <input type="password" id="idContrasena2" name="contrasena">
                                <div class="error-message" id="error-contrasena2"></div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" id="btn-registrar">Registrar</button>
                            <button type="button" onclick="window.location.href='index.php?c=index&f=index&p=login'">Cancelar</button>
                        </div>
                    </div>
                </form>

        </div>            
    </div>  
    </main>
</body>
</html>