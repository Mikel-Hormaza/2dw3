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
        <img src="fotos/gestioHerramientas/imgGestionHerramientas.jpg" alt="Imagen manual">
        <button class="botonVolver">Volver<span> a biblioteca</span></button>
        <div id=botones>
            <button>Crear</button>
        </div>
    </section>


    <section>
        <div>
            <button id="idBotonDesplegar" class="botonDesplegar"></button>
            <div id="idBloqueDesplegar" class="contenidoADesplegar">
                <a id="categoria">Categoría</a>
                <a>Creados por mí</a>
            </div>
            <input type="text" id="buscador" name="buscador" placeholder="Buscador de manual...">
        </div>


        <div>
            <button id="idBotonCategoria" class="botonCategoria">Categoría &#9947</button>
            <div id="idContenidoCategoria" class="contenidoCategoria">
                <a>maquina-herramienta</a>
                <a>electronica</a>
                <a>herramienta taller</a>
            </div>
        </div>
    </section>

    <main id="listaManuales">
        <div>
            <button>editar</button>
            <p>Nombre de herramienta</p>
            <p>Categoría de herramienta</p>
            <img src="Fotos/gestioHerramientas/taladro.jpg" alt="Taladro">
        </div>
        <div>
            <button>editar</button>
            <p>Nombre de herramienta</p>
            <p>Categoría de herramienta</p>
            <img src="Fotos/gestioHerramientas/sierra.jpg" alt="Taladro">
        </div>
        <div>
            <button>editar</button>
            <p>Nombre de herramienta</p>
            <p>Categoría de herramienta</p>
            <img src="Fotos/gestioHerramientas/taladro.jpg" alt="Taladro">
        </div>
        <div>
            <button>editar</button>
            <p>Nombre de herramienta</p>
            <p>Categoría de herramienta</p>
            <img src="Fotos/gestioHerramientas/sierra.jpg" alt="Taladro">
        </div>
    </main>

    <div id="botonesInicioFinal">
        <button><img src="Fotos/gestioHerramientas/triangulos.jpg" alt="triangulo"></button>
        <button><img src="Fotos/gestioHerramientas/triangulos.jpg" alt="triangulo"></button>
        <button><img src="Fotos/gestioHerramientas/triangulos.jpg" alt="triangulo"></button>
        <button><img src="Fotos/gestioHerramientas/triangulos.jpg" alt="triangulo"></button>
    </div>


</body>

</html>