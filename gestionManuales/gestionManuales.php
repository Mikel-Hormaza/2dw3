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
                <a>Todos</a>
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
        foreach ($datosManuales as $manual) {
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
                <p>Código manual: <?php echo $manual["codManual"] . " - " . $manual["nombreManual"] ?></p>
                <p>Código herramienta: <?php echo $manual["codHerramienta"] . " - " . $manual["nombreHerramienta"] ?></p>
                <?php echo '<img class="fotoDelManual" src="data:image/jpeg;base64,'.base64_encode($manual["fotoManual"]).'"/>' ?>

            </div>
        <?php
        }
        ?>

    </main>

    <div id="botonesInicioFinal">
        <button><img src="Imagenes/primero.png" alt="triangulo"></button>
        <button><img src="Imagenes/anterior.png" alt="triangulo"></button>
        <button><img src="Imagenes/siguiente.png" alt="triangulo"></button>
        <button><img src="Imagenes/último.png" alt="triangulo"></button>
    </div>


</body>

</html>