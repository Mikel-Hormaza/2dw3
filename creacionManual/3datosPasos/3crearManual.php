<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../crearManual.css">
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
        <form action="#" enctype="multipart/form-data">
            <input type="text" placeholder="Título del paso" maxlength="150" require="required">
            <textarea placeholder="Descripción del paso" maxlength="500" require="required"></textarea>
            <button id="classInputButton2" class="classInputButton" onclick="document.getElementById('classInputFileIMG2').click();" >Insertar imagen del paso</button>
            <input id="classInputFileIMG2" class="classInputFileIMG" name="classInputFileIMG" type="file" accept="image/png, .jpeg, .jpg" require="required"/>
            <div id="botonesOpcionesFormularioPaso" class="botonesOpcionesFormulario">
                <button type ="button">crear paso</button>
                <button type ="button">eliminar</button>
            </div>
        </form>
    </div>
</body>

</html>