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


function encryptDatosRegister(e) {
    e.preventDefault();

    const form = document.getElementById('form-register');
    document.getElementById('nombreEncrypted').value = encryptAES(document.getElementById('input-nombres').value);
    document.getElementById('correoEncrypted').value = encryptAES(document.getElementById('input-correo').value);
    document.getElementById('cedulaEncrypted').value = encryptAES(document.getElementById('input-cedula').value);
    document.getElementById('telefonoEncrypted').value = encryptAES(document.getElementById('input-telefono').value);
    document.getElementById('direccionEncrypted').value = encryptAES(document.getElementById('input-direccion').value);
    document.getElementById('contrasenaEncrypted').value = encryptAES(document.getElementById('contrasena').value);
    document.getElementById('contrasenaConfirmEncrypted').value = encryptAES(document.getElementById('idContrasena2').value);

    form.submit();
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
