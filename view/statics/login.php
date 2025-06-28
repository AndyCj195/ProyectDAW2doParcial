<!--Author: Andres Chavez Jimenez-->   
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="assets/css/styleForm.css" rel="stylesheet">
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
                        <input type="email" name="correo" id="correo">
                            <div class="error-message" id="error-correo"></div>
                        </div>
                    </div>
                    <div class="seccion" style="display: block;">
                        <div class="div-contrasena">
                        <label for="contrasena">Contraseña:</label><br>
                        <input type="password" name="contrasena" id="contrasena">
                            <div class="error-message" id="error-contrasena"></div>
                        </div>
                    </div>
                    <div class="seccion" style="display: block;">
                        <div class="div-botones">
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
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
    <!-- Agrega en tu archivo login.html antes del cierre del body -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script>
    const key = CryptoJS.enc.Utf8.parse("13112003101020021311200310102002");

    document.getElementById('form-login').addEventListener('submit', function (e) {
        const correoInput = document.getElementById('correo');
        const contrasenaInput = document.getElementById('contrasena');

        const ivCorreo = CryptoJS.lib.WordArray.random(16);
        const ivPass = CryptoJS.lib.WordArray.random(16);

        const correoEncrypted = CryptoJS.AES.encrypt(correoInput.value, key, {
            iv: ivCorreo,
            mode: CryptoJS.mode.CBC,
            padding: CryptoJS.pad.Pkcs7
        });

        const contrasenaEncrypted = CryptoJS.AES.encrypt(contrasenaInput.value, key, {
            iv: ivPass,
            mode: CryptoJS.mode.CBC,
            padding: CryptoJS.pad.Pkcs7
        });

        // Codifica: IV + mensaje
        const correoFinal = CryptoJS.enc.Base64.stringify(ivCorreo.concat(correoEncrypted.ciphertext));
        const passFinal = CryptoJS.enc.Base64.stringify(ivPass.concat(contrasenaEncrypted.ciphertext));

        // Reemplaza valores reales
        correoInput.value = correoFinal;
        contrasenaInput.value = passFinal;
    });
</script>

</body>
</html>