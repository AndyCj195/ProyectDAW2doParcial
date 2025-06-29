const key = CryptoJS.enc.Utf8.parse("13112003101020021311200310102002");


//Script para encriptar los datos del formulario de inicio de sesión
// Utiliza CryptoJS para encriptar el correo y la contraseña antes de enviarlos al

function encryptDatosLogin() {
    const form = document.getElementById("form-login");
    const correoInput = document.getElementById("correoInput");
    const contrasenaInput = document.getElementById("contrasenaInput");

    const correoHidden = document.getElementById("correoEncrypted");
    const contrasenaHidden = document.getElementById("contrasenaEncrypted");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const correoEncrypted = encryptAES(correoInput.value);
        const contrasenaEncrypted = encryptAES(contrasenaInput.value);

        correoHidden.value = correoEncrypted;
        contrasenaHidden.value = contrasenaEncrypted;

        form.submit();
    });
}


function encryptDatosRegister(){
    const form = document.getElementById('form-register');
    const nombreInput = document.getElementById('input-nombres');
    const correoInput = document.getElementById('input-correo');
    const cedulaInput = document.getElementById('input-cedula');
    const telefonoInput = document.getElementById('input-telefono');
    const contrasenaInput = document.getElementById('contrasena');
    const contrasenaConfirmInput = document.getElementById('idContrasena2');

    // Campos ocultos para almacenar los datos encriptados
    const nombreHidden = document.getElementById('nombreEncrypted');
    const correoHidden = document.getElementById('correoEncrypted');
    const cedulaHidden = document.getElementById('cedulaEncrypted');
    const telefonoHidden = document.getElementById('telefonoEncrypted');
    const contrasenaHidden = document.getElementById('contrasenaEncrypted');
    const contrasenaConfirmHidden = document.getElementById('contrasenaConfirmEncrypted');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const nombreEncrypted = encryptAES(nombreInput.value);
        const correoEncrypted = encryptAES(correoInput.value);
        const cedulaEncrypted = encryptAES(cedulaInput.value);
        const telefonoEncrypted = encryptAES(telefonoInput.value);
        const contrasenaEncrypted = encryptAES(contrasenaInput.value);
        const contrasenaConfirmEncrypted = encryptAES(contrasenaConfirmInput.value);

        // Asignar los valores encriptados a los campos ocultos
        nombreHidden.value = nombreEncrypted;
        correoHidden.value = correoEncrypted;
        cedulaHidden.value = cedulaEncrypted;
        telefonoHidden.value = telefonoEncrypted;
        contrasenaHidden.value = contrasenaEncrypted;
        contrasenaConfirmHidden.value = contrasenaConfirmEncrypted;

        form.submit();
    });
}



// Función para encriptar datos usando AES
function encryptAES(plainText) {
    const key = CryptoJS.enc.Utf8.parse("13112003101020021311200310102002"); // clave de 32 caracteres (256 bits)
    const iv = CryptoJS.lib.WordArray.random(16); // 16 bytes = 128 bits

    const encrypted = CryptoJS.AES.encrypt(plainText, key, {
        iv: iv,
        mode: CryptoJS.mode.CBC,
        padding: CryptoJS.pad.Pkcs7
    });

    const encryptedData = iv.concat(encrypted.ciphertext);
    return CryptoJS.enc.Base64.stringify(encryptedData);
}
