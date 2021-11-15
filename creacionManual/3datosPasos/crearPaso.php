<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../crearManual.css">
    <script src="Paso.js"></script>
    <script src="gestionarDatosPasos.js"></script>
    <?php require_once "leerBDPasosDelManual.php"; 
    ?>
</head>

<body id="bodyCrearManual3">
    <section>
        <div class="titulo" id="verde">
            <img src="../Imagenes/crearManual.PNG" alt="Imagen crear">
            <p>Pasos del manual</p>
        </div>
        <button id="botonVolver">Volver</button>
    </section>
    <div>
        <h3>Describe el paso de la reparación</h3>
    <?php echo mostrarFormulario() ?>
    </div>

    <div id="idDivPasos">
        <?php
        /* si hay un código de manual, y ese manual tiene pasos, muestra los pasos*/
        if (!empty($_SESSION["codManualSeleccionado"])) {
            if (llamarBD()) {
                mostrarPasos($datosPasos);
            }
        }
        ?>
    </div>

    <form action="crearPaso.php" method="post" id="#formularioEnviarPaso">
        <button id="botonPasoSeleccionado" name="botonPasoSeleccionado" type="submit"></button>
    </form>

    <span id="codigoDelPasoSeleccionado"><?php echo $_SESSION["botonPasoSeleccionado"];?></span>
</body>

</html>