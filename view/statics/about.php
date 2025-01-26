<!-- Autor: Ortuño Sanchez Juliet --> 
<?php require_once HEADER; ?>
<style>
    .contenedor_principal {
        position: relative;
        max-width: 600px;
        margin: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        border: 10px;
    }

    .contenedor_principal img {
        width: 100%;
        height: auto;
        display: block;
    }

    .contenedor_principal::before {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0) 100%);
    }

    .logo_banner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .quienes_somos {
        text-align: center;
        width: 100%;
        height: 22vh;
    }

    .proposito {
        text-align: center;
        width: 100%;
        height: 22vh;
        background-color: rgb(165, 233, 98);
    }

    #bloque_texto h1 {
        font-size: 30px;
        margin: 30px;
        text-transform: uppercase;
        text-align: center;
        display: inline-flex;

    }

    #bloque_texto p {
        font-size: 15px;
        line-height: 1.6;
        text-align: center;
        justify-content: center;
        display: flex;
    }

    #pilares .contenedor-cajas {
        padding: 30px;
        margin: auto;
        display: flex;
        gap: 50px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .titulo_pilares {

        font-family: 'Times New Roman', Times, serif;
        font-size: 30px;
        text-transform: uppercase;
        text-align: center;
        padding: 15px;
    }

    .caja {
        width: 250px;
        padding: 20px;
        background-color: #fff098;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease;
    }

    .caja img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .caja h3 {
        font-size: 18px;
        color: #333;
        margin: 10px 0 5px;
    }

    .caja:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /*---------- Ejes de accion -----------*/
    .contenedor_accion {
        text-align: center;
        padding: 20px;
    }

    .titulo_accion {
        background-color: #6FBF73;
        font-family: 'Times New Roman', Times, serif;
        font-size: 30px;
        text-transform: uppercase;
        text-align: center;
        color: rgb(0, 0, 0);
        padding: 15px;
        border-radius: 5px 5px 0 0;
    }

    .sections {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        background-color: rgb(255, 255, 255);
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .eje {
        margin: 20px;
        text-align: center;
        display: block;
        min-width: 250px;
        max-width: 400px;
        border-radius: 10px;
        box-sizing: border-box;
        background-color: rgb(209, 245, 245);
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        cursor: pointer;

    }

    .eje h2 {
        font-family: 'Times New Roman', Times, serif;
        background-color: #00AEB2;
        color: #000;
        padding: 15px;
        border-radius: 10px;
        text-align: center;
        font-weight: bold;
        font-size: 1.2rem;
        margin: 0;
        text-transform: uppercase;
    }

    .eje ul {
        padding: 0;
        border-radius: 10px;
        text-align: center;
        font-size: 1.2rem;
        margin: 15px 30px;
        font-family: 'Arial', sans-serif;
        display: none;
        /* Inicialmente oculto */
        padding-left: 20px;
        list-style-type: disc;
    }

    .eje.expandido ul {
        display: block;
        /* Mostrar el contenido cuando está expandido */
    }

    .eje ul li {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        text-align: left;
        margin: 5px 0;
        padding: 2px;
    }

    /*---------------Botón del Formulario----------------*/
    #boton {
        text-align: center;
        margin: 15px;
        padding: 15px;
    }

    .boton_formulario {
        font-family: 'Times New Roman', Times, serif;
        font-weight: bold;
        padding: 15px 30px;
        font-size: 20px;
        color: #000000;
        background-color: #96ff0dbe;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
    }

    .boton_formulario:hover {
        background-color: #e1fa00;
        transform: scale(1.05);
    }
</style>
<main>
    <div id="Principal">
        <div class="contenedor_principal">
            <img src="https://www.leonardo-gr.com/wp-content/uploads/2022/05/xresiduo.jpg.pagespeed.ic.LQsvv3emo7.webp"
                alt="imagen1">
            <div class="logo_banner">
                <img src="https://pbs.twimg.com/media/Gbv_sy6XwAsYKgB?format=png&name=small" alt="imagen2">
            </div>
        </div>
    </div>
    <div id="bloque_texto">
        <section class="quienes_somos">
            <h1> Quienes Somos</h1>
            <p>Funny Recycle es una plataforma de coordinación para el reciclaje domiciliario que busca facilitar y
                promover
                el proceso de reciclaje desde el hogar. Nuestra misión es hacer del reciclaje un hábito accesible y
                divertido,
                conectando a los hogares con puntos de recolección y proveedores de servicios de reciclaje para cada uno
                de los domicilicos.
            </p>
        </section>
        <section class="proposito">
            <h1>Proposito</h1>
            <p> Reducir el impacto ambiental y crear conciencia en las comunidades sobre la importancia del reciclaje y
                asi promoviendo una
                cultura de sostenibilidad a través de una plataforma facil de usar.
            </p>
        </section>
    </div>
    <div id="pilares">
        <h1 class="titulo_pilares">Valores</h1>
        <div class="contenedor-cajas">
            <div class="caja">
                <h3>Sostenibilidad</h3><br>
                <img src="https://guiafinem.com/wp-content/uploads/2018/02/Sostenibilidad-y-valor-e1519038086486.png"
                    alt="Imagen 1">
            </div>
            <div class="caja">
                <h3>Educación Ambiental</h3><br>
                <img src="https://img.haikudeck.com/mg/69F5D49B-7408-4B60-B3CC-D871572F2A7C.jpg" alt="Imagen 2">
            </div>
            <div class="caja">
                <h3>Innovación</h3><br>
                <img src="https://laserenaonline.cl/wp-content/uploads/2021/05/reciclaje-19052021.jpg" alt="Imagen 3">
            </div>
        </div>
    </div>
    <div id="accion">
        <div class="contenedor_accion">
            <h1 class="titulo_accion"> Ejes de Acción </h1>
            <div class="sections">
                <div class="eje">
                    <h2>Cultura y educación</h2>
                    <ul>
                        <li>Programas de educación</li>
                        <li>Apoyo a programas de disposición responsable</li>
                        <li>Comunidad digital</li>
                    </ul>
                </div>
                <div class="eje">
                    <h2>Manejo de residuos</h2>
                    <ul>
                        <li>Programas de separación, recolección, procesamiento y disposición final</li>
                        <li>Gestión integral para empresas</li>
                        <li>Sistematización y caracterización de materiales</li>
                    </ul>
                </div>
                <div class="eje">
                    <h2>Innovación</h2>
                    <ul>
                        <li>Estándares de sostenibilidad ambiental y social para proveedores</li>
                        <li>Uso de empaques, recipientes y embalajes con materiales alternativos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const boton_formulario = document.getElementById('boton_formulario');
        function cambioColor() {
            const letras = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letras[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Evento para cambiar el color de fondo al hacer clic en el botón

        if (boton_formulario) {
            boton_formulario.addEventListener('click', () => {
                document.body.style.backgroundColor = cambioColor();
            });
        }

        // ejes de accion comportamiento interactivo
        const ejes = document.querySelectorAll('.eje');  // Selecciona todos los ejes
        ejes.forEach(eje => {
            eje.addEventListener('click', () => {
                // Verifica si el eje ya está expandido
                if (eje.classList.contains('expandido')) {
                    // Si está expandido, lo colapsa
                    eje.classList.remove('expandido');
                } else {
                    // Si no está expandido, lo expande
                    eje.classList.add('expandido');
                }
            });
        });
    });           
</script>
<?php require_once FOOTER; ?>