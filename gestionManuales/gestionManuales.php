<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión manuales</title>
    <link rel="stylesheet" href="gestionManuales.css">
    <script src="gestionManuales.js"></script>
    <?php require_once "leerBDGestionManuales.php" ?>
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

        <?php
/*         foreach ($datosManuales as $manual) {
        ?>
            <div>
                <button>
                    <p>editar</p>
                    <img src="Imagenes/edit.png" alt="editar">
                </button>
                <button>
                    <p>eliminar</p>
                    <img src="Imagenes/delete.png" alt="eliminar">
                </button>
                <p>COD: <?php echo $manual["codManual"] . " - " . $manual["nombreManual"] ?></p>
                <p>COD: <?php echo $manual["manual.codHerramienta"] . " - " . $manual["manual.codHerramienta"] ?></p>
                

            </div>
        <?php
        }
        ?> */

        <div>
            <button>
                <p>editar</p>
                <img src="Imagenes/edit.png" alt="editar">
            </button>
            <button>
                <p>eliminar</p>
                <img src="Imagenes/delete.png" alt="eliminar">
            </button>
            <p>COD: 1- Nombre de manual</p>
            <p>COD: 2- Nombre de herramienta</p>
            <img class="fotoDelManual" src="Imagenes/taladro.jpg" alt="Taladro">
        </div>
        <div>
            <button>
                <p>editar</p>
                <img src="Imagenes/edit.png" alt="editar">
            </button>
            <button>
                <p>eliminar</p>
                <img src="Imagenes/delete.png" alt="eliminar">
            </button>
            <p>COD: 1- Nombre de manual</p>
            <p>COD: 2- Nombre de herramienta</p>
            <img class="fotoDelManual" src="Imagenes/sierra.jpg" alt="Taladro">
        </div>
        <div>
            <button>
                <p>editar</p>
                <img src="Imagenes/edit.png" alt="editar">
            </button>
            <button>
                <p>eliminar</p>
                <img src="Imagenes/delete.png" alt="eliminar">
            </button>
            <p>COD: 1- Nombre de manual</p>
            <p>COD: 2- Nombre de herramienta</p>
            <img class="fotoDelManual" src="Imagenes/taladro.jpg" alt="Taladro">
        </div>
        <div>
            <button>
                <p>editar</p>
                <img src="Imagenes/edit.png" alt="editar">
            </button>
            <button>
                <p>eliminar</p>
                <img src="Imagenes/delete.png" alt="eliminar">
            </button>
            <p>COD: 1- Nombre de manual</p>
            <p>COD: 2- Nombre de herramienta</p>
            <img class="fotoDelManual" src="Imagenes/sierra.jpg" alt="Taladro">
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