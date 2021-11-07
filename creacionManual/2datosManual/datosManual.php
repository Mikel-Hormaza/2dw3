<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="crearManual.css">
    <script src="2validarDatosManual.js"></script>
    <?php session_start(); ?>
</head>

<body id="bodyCrearManual2">
    <section>
        <div class="titulo" id="amarillo">
            <img src="Imagenes/crearManual.PNG" alt="Imagen crear">
            <p>Crear manual</p>
        </div>
        <button id="botonVolver">Volver</button>
    </section>
    <div>
        <h3>Introduce los datos del manual</h3>
        <form method="post" action="2formularioManual.php">
            <input id="idNombreManual" type="text" placeholder="Título de manual" maxlength="150" required="required">
            <textarea id="idDescripcionManual" placeholder="Descripción de la reparación" maxlength="350" required="required"></textarea>
            <button id="classInputButton1" class="classInputButton" onclick="document.getElementById('classInputFileIMG1').click();">Insertar imagen</button>
            <input id="classInputFileIMG1" class="classInputFileIMG" name="classInputFileIMG" type="file" />
            <textarea id="idHerramientasNecesarias" placeholder="Herramientas necesarias" maxlength="250"></textarea>
            <textarea id="idMedidasSeguridad" placeholder="Medidas de seguridad" maxlength="250"></textarea>
            <div class="botonesOpcionesFormulario">
                <button>siguiente</button>
            </div>
        </form>
        <span id="gestionarDatosFormularioManual"></span>
    </div>

</body>

</html>