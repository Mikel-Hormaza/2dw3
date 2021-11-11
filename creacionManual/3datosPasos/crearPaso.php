<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../crearManual.css">
    <script src="Paso.js"></script>
    <script src="validarDatosPaso.js"></script>
    <?php require_once "leerBDPasosDelManual.php"; ?>
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
        <h3>Describe el primer paso de la reparación</h3>
        <form id="formulario" method="post" action="validarDatosPaso.php" enctype="multipart/form-data">
            <input type="text" name="nombrePaso" id="idNombrePaso" placeholder="Título del paso" maxlength="150" require="required">
            <textarea placeholder="Descripción del paso" name="descripcionPaso" id="idDescripcionPaso" maxlength="500" require="required"></textarea>
            <button type="button" id="classInputButton2" class="classInputButton" onclick="document.getElementById('classInputFileIMG').click();">Insertar imagen del paso</button>
            <input id="classInputFileIMG" class="classInputFileIMG" name="classInputFileIMG" type="file" accept="image/png, .jpeg, .jpg" require="required" />
            <div id="botonesOpcionesFormularioPaso" class="botonesOpcionesFormulario">
                <button type="button" id="idBotoncrearPaso">crear paso</button>
                <button type="button" id="idBotonEliminarPaso">eliminar</button>
            </div>
        </form>
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

</body>

</html>