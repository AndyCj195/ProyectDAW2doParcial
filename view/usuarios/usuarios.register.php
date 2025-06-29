<!-- Autor: Chavez Jimenez Andres -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleForm.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="assets/js/encrypts.js"></script>
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
                            <input type="text" id="input-nombres">
                            <input type="hidden" name="nombreEncrypted" id="nombreEncrypted">
                            <div class="error-message" id="error-nombre"></div>
                        </div>
                    </div>
                    <div class="seccion" style="display: block;">
                        <div class="div-correo">
                            <label for="correo">Correo</label><br>
                            <input type="email" id="input-correo">
                            <input type="hidden" name="correoEncrypted" id="correoEncrypted">
                            <div class="error-message" id="error-correo"></div>
                        </div>
                    </div>
                    <div class="seccion">
                        <div class="div-CI">
                            <label for="cedula">Cedula</label><br>
                            <input type="text" id="input-cedula">
                            <input type="hidden" name="cedulaEncrypted" id="cedulaEncrypted">
                            <div class="error-message" id="error-cedula"></div>
                        </div>
                        <div class="div-telefono">
                            <label for="telefono">Telefono</label><br>
                            <input type="text" id="input-telefono">
                            <input type="hidden" name="telefonoEncrypted" id="telefonoEncrypted">
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
                            <input type="password" id="contrasena">
                            <input type="hidden" name="contrasena" id="contrasenaEncrypted">
                            <div class="error-message" id="error-contrasena"></div>
                        </div>
                        <div class="div-contra2">
                            <label for="idContrasena2">Confirmar Contraseña:</label><br>
                            <input type="password" id="idContrasena2">
                            <input type="hidden" name="contrasena_confirm" id="contrasenaConfirmEncrypted">
                            <div class="error-message" id="error-contrasena2"></div>
                        </div>
                    </div>
                    <div class="seccion" style="display: block;">
                        <div class="div-botones">
                            <button type="submit" id="btn-registrar" onclick="encryptDatosRegister()">Registrar</button>
                            <button type="button"
                                onclick="window.location.href='index.php?c=index&f=index&p=login'">Cancelar</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</body>

</html>