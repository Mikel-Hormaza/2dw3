<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="gestionHerramientas.css">
    <script src="gestionHerramientas.js"></script>
</head>

<body>
    <section>
        <img src="fotos/gestionManuales/herramientas.jpg" alt="Imagen manual">
        <button class="botonVolver">Volver<span> a biblioteca</span></button>
        <div id=botones>
            <button>Crear</button>
        </div>
    </section>


    <section>
        <div>
            <button id="idBotonDesplegar" class="botonDesplegar"></button>
            <div id="idBloqueDesplegar" class="contenidoADesplegar">
                <a>Todos</a>
                <a>Ninguno</a>
                <a id="categoria">Categoría</a>
                <a>Creados por mí</a>
            </div>
            <input type="text" id="buscador" name="buscador" placeholder="Buscador de manual...">
        </div>


        <div>
            <button id="idBotonCategoria" class="botonCategoria">Categoría &#9947</button>
            <div id="idContenidoCategoria" class="contenidoCategoria">
                <a href="gestionManuales.php">maquina-herramienta</a>
                <a href="gestionManuales.php">electronica</a>
                <a href="gestionManuales.php">herramienta taller</a>
            </div>
        </div>
    </section>

    <main id="listaManuales">
        <div>
            <button>editar</button>
            <p>Nombre de herramienta</p>
            <p>Categoría de herramienta</p>
            <img src="Fotos/gestionManuales/taladro.jpg" alt="Taladro">
        </div>
        <div>
            <button>editar</button>
            <p>Nombre de herramienta</p>
            <p>Categoría de herramienta</p>
            <img src="Fotos/gestionManuales/Fixtec-Fcs23501-Professional-2030W-Electric-Saw-Circular-Saw-for-Sale.jpg" alt="Taladro">
        </div>
        <div>
            <button>editar</button>
            <p>Nombre de herramienta</p>
            <p>Categoría de herramienta</p>
            <img src="Fotos/gestionManuales/taladro.jpg" alt="Taladro">
        </div>
        <div>
            <button>editar</button>
            <p>Nombre de herramienta</p>
            <p>Categoría de herramienta</p>
            <img src="Fotos/gestionManuales/Fixtec-Fcs23501-Professional-2030W-Electric-Saw-Circular-Saw-for-Sale.jpg" alt="Taladro">
        </div>
    </main>

    <div id="botonesInicioFinal">
        <button></button>
        <button></button>
        <button></button>
        <button></button>
    </div>


</body>

</html>