<!--Author: Andres Chavez Jimenez-->   
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="assets/css/styleForm.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="assets/js/encrypts.js"></script>

    <title>Inicio de Sesión</title>
</head>
<body>
    <?php require 'controller/UsuarioController.php'; ?>
    <div id="main-div">
        <div class="logo-header">
            <a href="index.php">
                <img class="img-logo" src="https://pbs.twimg.com/media/GbtRafJW4BEozsZ?format=png&name=small" alt="logo">
            </a>
        </div>
        <div id="formulario" class="form-Login">
            <div class="titulo">
                <h1 style="color: #2e7d32;">Iniciar Sesión</h1>
            </div>
            <form action="index.php?c=Usuario&f=login" method="POST" name="form-login" id="form-login">
                <div class="form-row">
                    <div class="seccion" style="display: block;">
                        <div id="div-correo">
                        <label for="correo">Correo:</label><br>
                        <input type="email" id="correoInput" placeholder="Ingrese su correo electrónico">
                        <input type="hidden" name="correo" id="correoEncrypted">
                            <div class="error-message" id="error-correo"></div>
                        </div>
                    </div>
                    <div class="seccion" style="display: block;">
                        <div class="div-contrasena">
                        <label for="contrasena">Contraseña:</label><br>
                        <input type="password" id="contrasenaInput" placeholder="Ingrese su contraseña">
                        <input type="hidden" name="contrasena" id="contrasenaEncrypted">
                            <div class="error-message" id="error-contrasena"></div>
                        </div>
                    </div>
                    <div class="seccion" style="display: block;">
                        <div class="div-botones">
                            <button type="submit" class="btn btn-primary" onclick="encryptDatosLogin()">Iniciar Sesión</button>
                        </div>
                    </div>
                    <div class="seccion" style="display: block;">
                        <div class="div-registro">
                            <p>¿No tienes cuenta?</p>
                            <a href="index.php?c=Usuario&f=index">Registrarse</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>