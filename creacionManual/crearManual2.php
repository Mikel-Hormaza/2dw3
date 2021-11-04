<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="crearManual.css">
</head>

<body id="bodyCrearManual2">
    <section>
        <div class="titulo" id="amarillo">
            <img src="Imagenes/crearManual.PNG" alt="Imagen crear">
            <p>Crear manual</p>
        </div>
        <button id="botonVolver"><a href="">Volver</button>
    </section>
    <div>
        <h3>¡Introduce los datos del manual!</h3>
        <form >
            <input id="idNombreManual" type="text" placeholder="Título de manual" maxlength="150" required="required">
            <textarea id="idDescripcionManual" placeholder="Descripción de la reparación" maxlength="350" required="required"></textarea>
            <label for="upload-photo">Insertar imagen<span> del manual</span></label>
            <input type="file" required="required" class="classInputFileIMG" />
            <textarea id="idHerramientasNecesarias" placeholder="Herramientas necesarias" maxlength="250"></textarea>
            <textarea id="idMedidasSeguridad" placeholder="Medidas de seguridad" maxlength="250"></textarea>
            <button type="button" id="idBotonCrearManual" class="gorde" value="crearManual">Crear manual</button>
        </form>
    </div>
    <section>
        <div class="titulo" id="verde">
            <img src="Imagenes/crearManual.PNG" alt="Imagen crear">
            <p>Pasos del manual</p>
        </div>
    </section>
    <div>
        <h3>Describe el primer paso de la reparación</h3>
        <form action="#">
            <input type="text" placeholder="Titulo">
            <textarea placeholder="Descripcion del paso"></textarea>
            <label for="upload-photo">Insertar imagen<span> del paso</span></label>
            <input type="file" class="classInputFileIMG" />
            <button class="gordepauso">Guardar paso</button>
        </form>
    </div>
</body>

</html>