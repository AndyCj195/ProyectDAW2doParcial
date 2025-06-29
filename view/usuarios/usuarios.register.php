<!-- Autor: Chavez Jimenez Andres -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleForm.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="assets/js/encrypts.js" defer></script>
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
                <input type="hidden" name="nombreEncrypted" id="nombreEncrypted">
                <input type="hidden" name="correoEncrypted" id="correoEncrypted">
                <input type="hidden" name="cedulaEncrypted" id="cedulaEncrypted">
                <input type="hidden" name="telefonoEncrypted" id="telefonoEncrypted">
                <input type="hidden" name="direccionEncrypted" id="direccionEncrypted">
                <input type="hidden" name="contrasenaEncrypted" id="contrasenaEncrypted">
                <input type="hidden" name="contrasenaConfirmEncrypted" id="contrasenaConfirmEncrypted">

                <div class="form-row">
                    <div class="seccion" style="display: block;">

                        <label for="nombres">Nombres</label><br>
                        <input type="text" id="input-nombres">
                    </div>

                    <div class="seccion" style="display: block;">
                        <label for="correo">Correo</label><br>
                        <input type="email" id="input-correo">
                    </div>

                    <div class="seccion">
                        <div>
                            <label for="cedula">Cédula</label><br>
                            <input type="text" id="input-cedula">
                        </div>
                        <div>
                            <label for="telefono">Teléfono</label><br>
                            <input type="text" id="input-telefono">
                        </div>
                    </div>
                    <div class="seccion" style="display: block;">
                        <label for="direccion">Dirección</label><br>
                        <input type="text" id="input-direccion">
                    </div>

                    <div class="seccion" style="display: block;">
                        <label for="tipoDeUsuario">Tipo de Usuario</label><br>
                        <select name="tipoDeUsuario" id="input-tipoDeUsuario">
                            <option value="">Seleccione un tipo de usuario...</option>
                            <option value="Usuario">Usuario</option>
                            <option value="Empresa">Empresa</option>
                        </select>
                    </div>

                    <div class="seccion">
                        <div>
                            <label for="contrasena">Contraseña</label><br>
                            <input type="password" id="contrasena">
                        </div>
                        <div>
                            <label for="idContrasena2">Confirmar Contraseña</label><br>
                            <input type="password" id="idContrasena2">
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

    <!-- Asociar encriptación al envío del formulario -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("form-register");
            form.addEventListener("submit", encryptDatosRegister);
        });
    </script>
</body>

</html>