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
            <img src="Imagenes/<?php echo $datosManual[0]["fotoManual"] ?>" alt="">
                <div>
                    <h3>Código de manual: <?php echo $datosManual[0]["codManual"]; ?></h3>
                    <h3>Fecha creación: <?php echo $datosManual[0]["fechaCreacion"]; ?></h3>
                    <h3>Creador: <?php echo $datosManual[0]["nomUsuario"]; ?></h3>
                </div>
                <?php mostrarBotonMostrar($informacionManual,1);?>
            </div>
            <div id="equipoNecesario">
                <h4>Equipo necesario</h4>
                <div>
                <?php mostrarBotonMostrar($equipoNecesario,2);?>
                </div>
            </div>
            <div id="seguridad">
                <h4>Medidas de seguridad</h4>
                <div>
                <?php mostrarBotonMostrar($medidasDeSeguridad,3);?>
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