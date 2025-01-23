<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Inicio de Sesión</title>
</head>
<body>
    <?php require 'controller/UsuarioController.php'; ?>
    <div id="div-main">
        <div>
        <img class="div_logo_header" src="https://pbs.twimg.com/media/GbtRafJW4BEozsZ?format=png&name=small" alt="logo">
        </div>
        <div id="formulario" class="form-Login">
            <div class="titulo" style="color: #2e7d32;">
                <h1>Iniciar Sesión</h1>
            </div>
            <form action="index.php?c=Usuario&f=login" method="POST" name="form-login" id="form-login">
                <div class="form-row">
                    <div class="seccion" style="display: block;">
                        <div id="div-correo">
                        <label for="correo">Correo:</label>
                        <input type="email" name="correo" id="correo">
                            <div class="error-message" id="error-correo"></div>
                        </div>
                    </div>
                    <div class="seccion" style="display: block;">
                        <div class="div-contrasena">
                        <label for="contrasena">Contraseña:</label>
                        <input type="password" name="contrasena" id="contrasena">
                            <div class="error-message" id="error-contrasena"></div>
                        </div>
                    </div>
                    <div class="seccion">
                        <div class="div-botones">
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                            <button type="reset" class="btn btn-secondary">Limpiar</button>
                        </div>
                    </div>
                    <div class="seccion">
                        <div class="div-registro">
                            <p>¿No tienes cuenta?</p>
                            <a href="index.php?c=Usuario&f=index">Registrarse</a>
                        </div>

                    </div>


        </div>
    </div>
</body>
</html>