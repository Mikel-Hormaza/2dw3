<<<<<<< HEAD
<!DOCTYPE html>
<html lang="es">
<head>  
    <meta charset="UTF-8">
    <link rel="stylesheet" href="visualizarManual.css">
    <script src="visualizarManual.js"></script>
    <title>Visualizar manual</title>
    <?php require_once "leerBDVisualizarManual.php" ?>
</head>

<body>
    <?php require_once '../Header/Header.php' ?>
    <section>
        <div id="amarilloMadre">
            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($datosManual[0]["fotoManual"]) . '"/>' ?>
            <h2 id="tituloManual"><?php echo $datosManual[0]["nombreManual"]; ?></h2>
        </div>
        <button id="botonVolver"><a href="../Biblioteca/Biblioteca.php">Volver<span> a gestión de manuales</span></a></button>
    </section>
    <div>
        <button id="generarPDF">generar pdf</button>
    </div>

    <article>
        <div id="informacionInicial">
            <div id="infoManual">
                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($datosManual[0]["fotoManual"]) . '"/>' ?>
                <div>
                    <h3>Código de manual: <?php echo $datosManual[0]["codManual"]; ?></h3>
                    <h3>Fecha creación: <?php echo $datosManual[0]["fechaCreacion"]; ?></h3>
                    <h3>Creador: <?php echo $datosManual[0]["nomUsuario"]; ?></h3>
                </div>
                <div id="divInfoDetallesManual">
                    <?php mostrarBotonMostrar($informacionManual, 1); ?>
                </div>
            </div>
            <div id="equipoNecesario">
                <div id="divInfoEquipoNecesario">
                    <h4>Equipo necesario</h4>
                    <?php mostrarBotonMostrar($equipoNecesario, 2); ?>
                </div>
            </div>
            <div id="seguridad">
                <div id="divInfoMedidasSeguridad">
                    <h4>Medidas de seguridad</h4>
                    <?php mostrarBotonMostrar($medidasDeSeguridad, 3); ?>
                </div>
            </div>
        </div>


        <?php
        $numPaso = 0;
        foreach ($datosPasos as $paso) {
        ?>
            <div class="paso">
                <div>
                    <?php $numPaso++; ?>
                    <h3 class="pasoTitulo">Paso <?php echo $numPaso ?></h3>
                    <p><?php echo $paso["tituloPaso"] ?></p>
                </div>
                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($paso["fotoPaso"]) . '"/>' ?>
                <p><?php echo $paso["descripcionPaso"] ?></p>
                <hr>
            </div>
        <?php
        }
        ?>
    </article>
    <?php require_once '../Footer/footer.php' ?>
</body>

=======
<!DOCTYPE html>
<html lang="es">

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
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($datosManual[0]["fotoManual"]).'"/>' ?>
            <h2><?php echo $datosManual[0]["nombreManual"]; ?></h2>
        </div>
        <button id="botonVolver"><a href="../gestionManuales/gestionManuales.php">Volver<span> a gestión de manuales</span></a></button>

    </section>

    <article>
        <div id="informacionInicial">
            <div id="infoManual">
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($datosManual[0]["fotoManual"]).'"/>' ?>
                <div>
                    <h3>Código de manual: <?php echo $datosManual[0]["codManual"]; ?></h3>
                    <h3>Fecha creación: <?php echo $datosManual[0]["fechaCreacion"]; ?></h3>
                    <h3>Creador: <?php echo $datosManual[0]["nomUsuario"]; ?></h3>
                </div>
                <div id="divInfoDetallesManual">
                    <?php mostrarBotonMostrar($informacionManual, 1); ?>
                </div>
            </div>
            <div id="equipoNecesario">
                <div id="divInfoEquipoNecesario">
                    <h4>Equipo necesario</h4>
                    <?php mostrarBotonMostrar($equipoNecesario, 2); ?>
                </div>
            </div>
            <div id="seguridad">
                <div id="divInfoMedidasSeguridad">
                    <h4>Medidas de seguridad</h4>
                    <?php mostrarBotonMostrar($medidasDeSeguridad, 3); ?>
                </div>
            </div>
        </div>


        <?php
        $numPaso = 0;
        foreach ($datosPasos as $paso) {
        ?>
            <div class="paso">
                <div>
                    <?php $numPaso++; ?>
                    <h3 class="pasoTitulo">Paso <?php echo $numPaso ?></h3>
                    <p><?php echo $paso["tituloPaso"] ?></p>
                </div>
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($paso["fotoPaso"]).'"/>' ?>
                <p><?php echo $paso["descripcionPaso"] ?></p>
                <hr>
            </div>
        <?php
        }
        ?>
    </article>
</body>

>>>>>>> 752454b7ff63fbca6c072fda8cc9a86b634fa77b
</html>