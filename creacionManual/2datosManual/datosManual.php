<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../crearManual.css">
    <script src="Manual.js"></script>
    <script src="validarDatosManual.js"></script>
    <?php session_start(); ?>
</head>

<body id="bodyCrearManual2">
    <section>
        <div class="titulo" id="amarillo">
            <img src="../Imagenes/crearManual.PNG" alt="Imagen crear">
            <p>Crear manual</p>
        </div>
        <button id="botonVolver">Volver</button>
    </section>
    <div>
        <h3>Introduce los datos del manual</h3>
        <form id="formulario" method="post" action="validarDatosManual.php" enctype="multipart/form-data">
            <input id="idNombreManual" type="text" name="nombreManual" placeholder="Título de manual" maxlength="150" required="required">
            <textarea id="idDescripcionManual" name="descripcionManual" placeholder="Descripción de la reparación" maxlength="350" required="required"></textarea>
            <textarea id="idHerramientasNecesarias" name="herramientasNecesarias" placeholder="Herramientas necesarias" maxlength="250"  required="required"></textarea>
            <textarea id="idMedidasSeguridad" name="medidasSeguridad" placeholder="Medidas de seguridad" maxlength="250"  required="required"></textarea>
            <button type ="button" id="classInputButton1" class="classInputButton" onclick="document.getElementById('classInputFileIMG1').click();">Insertar imagen</button>
            <input id="classInputFileIMG1" class="classInputFileIMG" name="classInputFileIMG" type="file" accept="image/png, .jpeg, .jpg" require="required"/>
            <div class="botonesOpcionesFormulario">
                <button type ="button">siguiente</button>
            </div>
        </form>
        <span id="gestionarDatosFormularioManual"></span>
    </div>

</body>

</html>