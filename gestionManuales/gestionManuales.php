<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión manuales</title>
    <link rel="stylesheet" href="gestionManuales.css">
    <script src="gestionManuales.js"></script>
    <?php require_once "leerBDGestionManuales.php"?>
</head>

<body>
    <section>
        <img src="Imagenes/imgGestionManuales.png" alt="Imagen manual">
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
                <a>electrónica</a>
                <a>herramienta taller</a>
            </div>
        </div>
    </section>

    <main id="listaManuales">
        <div>
            <button>editar</button>
            <button>eliminar</button>
            <p>COD: 1- Nombre de manual</p>
            <p>COD: 2- Nombre de herramienta</p>
            <img src="Imagenes/taladro.jpg" alt="Taladro">
        </div>
        <div>
            <button>editar</button>
            <button>eliminar</button>
            <p>COD: 1- Nombre de manual</p>
            <p>COD: 2- Nombre de herramienta</p>
            <img src="Imagenes/sierra.jpg" alt="Taladro">
        </div>
        <div>
            <button>editar</button>
            <button>eliminar</button>
            <p>COD: 1- Nombre de manual</p>
            <p>COD: 2- Nombre de herramienta</p>
            <img src="Imagenes/taladro.jpg" alt="Taladro">
        </div>
        <div>
            <button>editar</button>
            <button>eliminar</button>
            <p>COD: 1- Nombre de manual</p>
            <p>COD: 2- Nombre de herramienta</p>
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