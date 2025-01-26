<!-- Autor: Chavez Jimenez Andres -->
<?php require_once HEADER; ?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
        color: #333;
    }

    .container {
        display: grid;
        grid-template-columns: 1fr 1fr; /* Dos columnas iguales */
        grid-template-rows: auto auto; /* Dos filas automáticas */
        gap: 20px; /* Espaciado entre elementos */
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .seccion-contacto, 
    .seccion-form {
        padding: 20px;
    }

    .seccion-contacto {
        grid-column: span 1; /* Ocupa una columna */
    }

    .seccion-form {
        grid-column: span 1; /* Ocupa una columna */
    }

    .seccion-social {
        grid-column: span 2; /* Ocupa las dos columnas */
        text-align: center; /* Centra el contenido horizontalmente */
        padding: 20px;
    }

    h1 {
        color: #2c6e49;
        text-align: center;
        margin-bottom: 10px;
        font-size: 1.8rem;
    }

    h2 {
        text-align: center;
        margin: 10px 0;
        font-size: 1.2rem;
        color: #555;
    }

    p {
        margin: 10px 0;
        line-height: 1.6;
    }

    .contact-info p {
        margin: 5px 0;
    }

    .contact-info a {
        color: #2c6e49;
        text-decoration: none;
        font-weight: bold;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    input,
    textarea,
    button {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
    }

    button {
        background-color: #2c6e49;
        color: #fff;
        border: none;
        cursor: pointer;
        font-size: 1rem;
        padding: 12px;
    }

    button:hover {
        background-color: #1f4c36;
    }

    .social-icons a {
        margin: 0 10px;
    }

    .social-icons img {
        width: 50px;
        height: 50px;
    }
</style>
<main>
    <div class="container">
        <!-- Primera sección: Contacto -->
        <div id="seccion" class="seccion-contacto">
            <h1>CONTACTA CON NOSOTROS</h1>
            <h2>Queremos escucharte</h2>
            <p>Si quieres información sobre cualquiera de nuestros productos o estás interesado en su distribución, rellena
                nuestro formulario y nos pondremos en contacto contigo lo antes posible.</p>
            <div class="contact-info">
                <p><strong>Información de contacto adicional</strong></p>
                <p>Para consultas generales, escribe a: FunnyRecycleSuport@gmail.com</p>
                <p>Llámanos al: (+593) 991 254 322</p>
                <p>Horario: 8:00-17:30</p>
            </div>
        </div>
        <!-- Segunda sección: Formulario -->
        <div id="seccion" class="seccion-form">
            <div class="form-container">
                <form action="#" method="POST">
                    <input type="text" name="name" placeholder="Nombre" required>
                    <input type="email" name="email" placeholder="Dirección de correo electrónico" required>
                    <input type="text" name="phone" placeholder="Teléfono" required>
                    <textarea name="message" rows="5" placeholder="Mensaje" required></textarea>
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
        <!-- Tercera sección: Redes sociales -->
        <div id="seccion" class="seccion-social">
            <div class="social-icons">
                <a href="#" target="_blank" aria-label="Twitter">
                    <img src="assets/images/iconXTwitter.png" alt="Twitter">
                </a>
                <a href="#" target="_blank" aria-label="Facebook">
                    <img src="assets/images/iconFacebook.png" alt="Facebook">
                </a>
                <a href="#" target="_blank" aria-label="Instagram">
                    <img src="assets/images/iconInstagram.png" alt="Instagram">
                </a>
            </div>
        </div>
    </div>
</main>

<?php require_once FOOTER; ?>