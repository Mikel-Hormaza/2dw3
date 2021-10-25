<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestion Herramientas</title>
    <link rel="stylesheet" href="gestionHerramientas.css">
    <script src="gestionHerramientas.js"></script>
</head>

<body>
    <section>
        <img src="Imagenes/imgGestionHerramientas.jpg" alt="Imagen manual">
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

    <main id="listaHerramientas">
        <div>
            <button>
                <p>editar</p>
                <img src="Imagenes/edit.png" alt="editar">
            </button>
            <p>Nombre de herramienta</p>
            <p>Categoría de herramienta</p>
            <img src="Imagenes/taladro.jpg" alt="Taladro">
        </div>
        <div>
            <button>
                <p>editar</p>
                <img src="Imagenes/edit.png" alt="editar">
            </button>
            <p>Nombre de herramienta</p>
            <p>Categoría de herramienta</p>
            <img src="Imagenes/sierra.jpg" alt="Taladro">
        </div>
        <div>
            <button>
                <p>editar</p>
                <img src="Imagenes/edit.png" alt="editar">
            </button>
            <p>Nombre de herramienta</p>
            <p>Categoría de herramienta</p>
            <img src="Imagenes/taladro.jpg" alt="Taladro">
        </div>
        <div>
            <button>
                <p>editar</p>
                <img src="Imagenes/edit.png" alt="editar">
            </button>
            <p>Nombre de herramienta</p>
            <p>Categoría de herramienta</p>
            <img src="Imagenes/sierra.jpg" alt="Taladro">
        </div>
    </main>

    <div id="botonesInicioFinal">
        <button><img src="Imagenes/primero.png" alt="triangulo"></button>
        <button><img src="Imagenes/anterior.png" alt="triangulo"></button>
        <button><img src="Imagenes/siguiente.png" alt="triangulo"></button>
        <button><img src="Imagenes/último.png" alt="triangulo"></button>
    </div>


</body>

</html>