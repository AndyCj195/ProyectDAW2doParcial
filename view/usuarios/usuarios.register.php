<!-- Autor: Chavez Jimenez Andres -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleForm.css">
    <title>Registro de Usuario</title>
</head>

<body>
    <div id="main-div">
        <div class="logo-header">
            <a href="index.php">
                <img class="img-logo" src="https://pbs.twimg.com/media/GbtRafJW4BEozsZ?format=png&name=small"
                    alt="logo">
            </a>
        </div>
        <div id="formulario" class="form-register">
            <div class="titulo">
                <h1 style="color: #2e7d32;">Registro de Usuario</h1>
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
                    <div class="seccion" style="display: block;">
                        <div class="div-direccion">
                            <label for="direccion">Direccion</label><br>
                            <input type="text" name="direccion" id="input-direccion">
                            <div class="error-message" id="error-direccion"></div>
                        </div>
                    </div>
                    <div class="seccion" style="display: block;">
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
                            <input type="password" id="idContrasena2" name="contrasena_confirm">
                            <div class="error-message" id="error-contrasena2"></div>
                        </div>
                    </div>
                    <div class="seccion" style="display: block;">
                        <div class="div-botones">
                            <button type="submit" id="btn-registrar">Registrar</button>
                            <button type="button"
                                onclick="window.location.href='index.php?c=index&f=index&p=login'">Cancelar</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script>
document.getElementById('form-register').addEventListener('submit', function(e) {
    const key = CryptoJS.enc.Utf8.parse("13112003101020021311200310102002");

    const encryptField = (id) => {
        const input = document.getElementById(id);
        const iv = CryptoJS.lib.WordArray.random(16);
        const encrypted = CryptoJS.AES.encrypt(input.value, key, {
            iv: iv,
            mode: CryptoJS.mode.CBC,
            padding: CryptoJS.pad.Pkcs7
        });
        input.value = CryptoJS.enc.Base64.stringify(iv.concat(encrypted.ciphertext));
    };

    encryptField("input-correo");
    encryptField("input-cedula");
    encryptField("contrasena");
    encryptField("idContrasena2");
});
</script>

</body>

</html>