<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="visualizarManual.css">
    <script src="visualizarManual.js"></script>
    <title>Visualizar manual</title>
    <?php require_once "leerBDVisualizarManual.php" ?>
</head>

<body>
    <section>
        <div id="amarilloMadre">
            <img src="Imagenes/paso1.jpg" alt="Imagen paso">
            <h2><?php echo $datosManual[0]["nombreManual"]; ?></h2>
        </div>
        <button id="botonVolver">Volver<span> a biblioteca</span></button>

    </section>

    <article>
        <div id="informacionInicial">
            <div id="infoManual">
            <img src="Imagenes/<?php echo $paso["fotoManual"] ?>" alt="">
                <div>
                    <h3>Código de manual: <?php echo $datosManual[0]["codManual"]; ?></h3>
                    <h3>Fecha creación: <?php echo $datosManual[0]["fechaCreacion"]; ?></h3>
                    <h3>Creador: <?php echo $datosManual[0]["nomUsuario"]; ?></h3>
                </div>
                <p>
                    Hemos desmontado el mini iPhone y los dos iPhones medianos, pero hemos guardado el más grande para el final: el iPhone 12 Pro Max. <span id="puntos">...</span><span id="mas"> Si viste nuestro livestream la semana pasada, pudiste ver lo que lleva, pero queríamos más (¡y nuestros mensajes directos nos dicen que tú también!)! Es hora de darle a este teléfono de gran cuerpo el tratamiento completo de desmontaje.
                        Hablando de dar: para poner fin a esta épica ola de desmontajes, regalamos a tres afortunados un Minnow Driver Kit! Aunque tendrás que trabajar para ello. Para poner a prueba la cámara del iPhone 12 Pro Max, la usamos para tomar en secreto dos fotos en este desmontaje con la Aplicación de cámara Halide. "Usa este formulario para adivinar correctamente qué dos pasos de abajo contienen una foto tomada en el iPhone, y entrarás para ganar.</span> <br><button id="botonLeerMas">Mostrar</button></p>
            </div>
            <div id="equipoNecesario">
                <h4>Equipo necesario</h4>
                <div>
                    <p>
                        Llave Allen. Lo ideal es contar con un kit que incorpore diferentes medidas.<span id="puntosEquipo">...</span><span id="masEquipo"> Muchos muebles en kit las traen incorporadas para el montaje.

                            Linterna. Para acceder a espacios recónditos que necesitan reparación. Mejor tenerla a mano por si hay algún apagón en casa…

                            Cúter. Esencial para hacer cortes limpios sin peligro… Precio: 4 euros.</span> <br><button id="botonLeerMasEquipo">Mostrar</button>
                    </p>
                </div>
            </div>
            <div id="seguridad">
                <h4>Medidas de seguridad</h4>
                <div>
                    <p>
                        Asegúrate de seguir el canal de iFixit YouTube,. nuestro Instagram, y nuestro <span id="puntosSeguridad">...</span><span id="masSeguridad"> Twitter, y suscríbete a nuestro boletín de noticiaspara que seas el primero en saber cuando la nueva tecnología de consumo llega a la mesa de desmontaje.
                        </span> <br><button id="botonLeerMasSeguridad">Mostrar</button></p>
                </div>
            </div>
        </div>


        <?php
        foreach ($datosPasos as $paso) {
        ?>
            <div class="paso">
                <div>
                    <?php $numPaso = 1; ?>
                    <h3 class="pasoTitulo">Paso<?php echo $numPaso ?></h3>
                    <p><?php echo $paso["tituloPaso"] ?></p>
                </div>
                <img src="Imagenes/<?php echo $paso["fotoPaso"] ?>" alt="">
                <p><?php echo $paso["descripcionPaso"] ?></p>
                <hr>
            </div>
        <?php
        }
        ?>
    </article>
</body>

</html>