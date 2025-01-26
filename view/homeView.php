<!-- Autor: Chavez Jimenez Andres-->
<?php require_once HEADER; ?>
<?php if ($tipoDeUsuario === null): ?>
    <style>
        main {
            display: grid;
            flex-direction: column;
            align-items: center;
        }

        #id_div_video {
            margin: 20px auto;
            width: 80%;
            text-align: center;
        }

        #id_iframe {
            width: 560px;
            height: 315px;
        }

        #id_objetivopag {
            background-color: #F5D547;
            color: #000000;
            display: grid;
            grid-template-rows: auto;
            grid-template-columns: 50% 50%;
            padding: 20px;
            margin-top: 20px;
        }

        #id_objetivopag div {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
        }

        .pasos_seguir {
            display: grid;
            justify-content: center;
            align-items: center;
            margin: 10px auto;
            grid-template-columns: repeat(5, 1fr);
            width: 90%;
        }

        .elemento {
            background-color: #f0ffff;
            border-radius: 10px;
            padding: 50px;
            width: 90%;
            box-shadow: 0px 0px 10px 0px #000000;
            font-size: 20px;
            text-align: center;
        }

        .elemento #div-click {
            cursor: pointer;
        }

        .elemento img {
            height: 50px;
            width: 50px;
        }

        .sec_frase {
            background-color: #F5D547;
            align-items: center;
        }

        .sec_frase p {
            display: grid;
            justify-content: center;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin: 20px;
            padding: 20px;
            color: #376e3c;
        }

        @media (max-width: 1068px) {

            #id_iframe {
                width: 100%;
                height: 315px;
            }

            .pasos_seguir {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
                justify-items: center;
                align-items: center;
            }

            .elemento:nth-child(5) {
                /*Hay un error que no permite mostrar una columna sola en el sgt mediaquery*/
                width: 50%;
                grid-column: span 2;
                justify-self: center;
            }

            .elemento {
                width: 90%;
                font-size: 18px;
            }

            .elemento img {
                height: 40px;
                width: 40px;
            }
        }

        @media (max-width: 575px) {
            #id_iframe {
                width: 100%;
                height: 215px;
            }

            .div_footer_header {
                flex-direction: column;
                gap: 10px;
                /* Ajusta el espacio entre elementos según sea necesario */
                text-align: center;
            }

            #id_objetivopag {
                display: grid;
                grid-template-columns: 100%;
            }

            .div_logo_footer {
                justify-content: center;
            }

            .div_derechos {
                flex-direction: column;
                text-align: center;
            }


            .pasos_seguir {
                display: grid;
                grid-template-columns: 1fr;
                justify-items: center;
                align-items: center;
                gap: 10px;
            }

            .elemento:nth-child(5) {
                /*Hay un error que no permite mostrar una columna sola en el sgt mediaquery*/
                width: 90%;
                grid-column: span 1;
                justify-self: center;
            }

            .elemento {
                width: 90%;
                font-size: 18px;
                grid-template-columns: 1fr;
            }

            .elemento img {
                height: 40px;
                width: 40px;
            }

            #id_div_video {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 20px;
                width: 80%;
            }
        }
    </style>
    <main>
        <div id="id_div_video">
            <iframe id="id_iframe" src="https://www.youtube.com/embed/tbTYxFbzLWA?si=0fYQBPTrCWgr2mKb"
                title="YouTube video player"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <div id="id_objetivopag">
            <div class="grid_objet_pag">
                <img style="height:100px; width:auto;"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Recycle001.svg/1200px-Recycle001.svg.png"
                    alt="">
            </div>
            <div class="grid_objet_pag">
                <p>El fin de esta página no es solo informarte, sino inspirarte. El reciclaje es más que un acto individual;
                    es un compromiso con nuestro planeta y con las generaciones futuras. Cada pequeño esfuerzo cuenta, cada
                    botella,
                    cada pedazo de papel que decides reciclar, crea un impacto positivo en el mundo que compartimos. Juntos,
                    podemos
                    construir un futuro más limpio, más verde y más seguro. ¡Sé parte del cambio, comienza hoy!</p>
            </div>
        </div>
        <div class="pasos_seguir">
            <div class="elemento">
                <section class="paso">
                    <div id="div-click">
                        <h3>Paso 1</h3>
                        <hr>
                        <p>Registrate en la página</p>
                        <img src="https://th.bing.com/th/id/R.8e2c571ff125b3531705198a15d3103c?rik=gzhbzBpXBa%2bxMA&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fuser-png-icon-big-image-png-2240.png&ehk=VeWsrun%2fvDy5QDv2Z6Xm8XnIMXyeaz2fhR3AgxlvxAc%3d&risl=&pid=ImgRaw&r=0"
                            alt="user">
                    </div>
                    <div id="div-contenido">
                        <hr><br>
                        <p>Dale al botón de registrar para ingresar tus datos y registrarte en la pagina</p>
                        <img src="https://pbs.twimg.com/media/GdLDg0OWMAAK5KJ?format=png&name=medium"
                            alt="Pagina de Registro" style="width: 100%; height:auto;">
                    </div>
                </section>
            </div>
            <div class="elemento">
                <section class="paso">
                    <div id="div-click">
                        <h3>Paso 2</h3>
                        <hr>
                        <p>Recicla los materiales</p>
                        <img src="https://pbs.twimg.com/media/Gb3vhIfXUAAczEB?format=png&name=small" alt="recycle">
                    </div>
                    <div id="div-contenido">
                        <hr><br>
                        <p>Clasifica los materiales reciclables en papel, plástico, vidrio, metal y residuos orgánicos.
                            Limpia y seca los materiales antes de depositarlos en los contenedores correspondientes.</p>
                        <img src="https://th.bing.com/th/id/R.d4fdb944e22325788efcf789f32dff1f?rik=3aSSxethKjBUaQ&pid=ImgRaw&r=0"
                            alt="clasificacion" style="height: auto; width:100%">
                    </div>
                </section>
            </div>
            <div class="elemento">
                <section class="paso">
                    <div id="div-click">
                        <h3>Paso 3</h3>
                        <hr>
                        <p>Registra lo reciclado</p>
                        <img src="https://clipground.com/images/registration-symbol-png-8.png" alt="reciclar">
                    </div>
                    <div id="div-contenido">
                        <hr><br>
                        <p>Registra los materiales reciclados en la pagina web</p>
                        <img src="https://pbs.twimg.com/media/GdLFET9XsAIgL5U?format=png&name=medium"
                            alt="registro de lo reciclado" style="width: 100%; height:auto;">
                    </div>
                </section>
            </div>
            <div class="elemento">
                <section class="paso">
                    <div id="div-click">
                        <h3>Paso 4</h3>
                        <hr>
                        <p>Visualiza los horarios</p>
                        <img src="https://smartasthma.com/wp-content/uploads/2022/06/deadline.png" alt="reciclar">
                    </div>
                    <div id="div-contenido">
                        <hr><br>
                        <p>
                            Visualiza los horarios de recolección de los materiales reciclados en la pagina web
                        </p>
                        <img src="https://pbs.twimg.com/media/GdLGJMbW4AAQ0OT?format=jpg&name=medium"
                            alt="visualizar horarios" style="width: 100%; height:auto;">
                    </div>
                </section>
            </div>
            <div class="elemento">
                <section class="paso">
                    <div id="div-click">
                        <h3>Paso 5</h3>
                        <hr>
                        <p>Espera al recolector</p>
                        <img src="https://cdn2.iconfinder.com/data/icons/occupation-11/50/RefuseCollector-1024.png"
                            alt="reciclar">
                    </div>
                    <div id="div-contenido">
                        <hr><br>
                        <p>Espera al recolector en el horario establecido para que recoja los materiales reciclados</p><br>
                        <img src="https://www.gruporoales.com/home/wp-content/uploads/2020/12/thumbnail_IMG_8975.jpg"
                            alt="recolector" style="width: 100%; height:auto">
                    </div>
                </section>
            </div>
        </div>
        <div class="sec_frase">
            <p>En Funny Recycle, cada pequeño esfuerzo cuenta.¡Recicla hoy para un mañana más brillante y divertido!</p>
            <p>Unete a Funny Recycle y sé parte del cambio positivo!</p>
        </div>
    </main>
<?php else: ?>
    <div>
        <div style="background-color: #ffffff; border-radius: 15px; padding: 20px; margin: 20px;">
            <h1 style="text-align: center; margin-top: 20px; color: #376e3c;">Bienvenido al sistema de gestión <br>Funny
                Recycle <br> Por favor seleccione el tipo de gestión que quiere hacer</h1>
        </div>
        <div style="text-align: center; margin-top: 20px;">
            <img src="assets/images/logoFunnyRecycle.png" alt="Funny Recycle Logo" style="height: 100px; width: auto;">
        </div>
    </div>
<?php endif; ?>
<?php require_once FOOTER; ?>
<script>
    const pasos_seguir = document.querySelectorAll('.paso #div-contenido');
    const div_click = document.querySelectorAll('.paso #div-click');
    pasos_seguir.forEach(paso => {
        paso.style.display = 'none';
    });

    for (let i = 0; i < pasos_seguir.length; i++) {
        pasos_seguir[i].addEventListener('click', () => {
            const cont = pasos_seguir[i].parentNode.children[0];
            if (pasos_seguir[i].style.display !== 'none') {
                pasos_seguir[i].style.display = 'none';
            } else {
                pasos_seguir[i].style.display = 'block';
            }
        });
    };
    for (let i = 0; i < div_click.length; i++) {
        div_click[i].addEventListener('click', () => {
            const cont = div_click[i].parentNode.children[1];
            if (cont.style.display !== 'none') {
                cont.style.display = 'none';
            } else {
                cont.style.display = 'block';
            }
        });
    }
</script>