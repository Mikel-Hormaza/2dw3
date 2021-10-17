<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="gestionManuales.css">
    <script src="gestionManuales.js"></script>
</head>

<body>
    <section>
        <img src="fotos/gestionManuales/imgGestionManuales.png" alt="Imagen manual">
        <button class="botonVolver">Volver<span> a biblioteca</span></button>
        <div id=botones>
            <button>Crear</button>
            <button>Editar</button>
            <button>Eliminar</button>
        </div>
    </section>


    <section>
        <div>
            <button id="idBotonDesplegar" class="botonDesplegar"></button>
            <div id="idBloqueDesplegar" class="contenidoADesplegar">
                <a href="gestionManuales.php">Todos</a>
                <a href="gestionManuales.php">Ninguno</a>
                <a href="gestionManuales.php">Categoría</a>
                <a href="gestionManuales.php">Creados por mí</a>
            </div>
        </div>
        <input type="text" id="buscador" name="buscador" placeholder="Buscador de manual...">

        <!--   <div>
            <button>Categoría</button>
            <div>
                <!--AQUI UNA POR CATEOGRIA
    <a href=#####></a>
            </div>
        </div> -->
    </section>

    <main id=listaManuales>
        <div>
            <p>Nombre de herramienta</p>
            <p>Categoría de herramienta</p>
            <img src="Fotos/gestionManuales/taladro.jpg" alt="Taladro">
        </div>
        <div>
            <p>Nombre de herramienta</p>
            <p>Categoría de herramienta</p>
            <img src="Fotos/gestionManuales/Fixtec-Fcs23501-Professional-2030W-Electric-Saw-Circular-Saw-for-Sale.jpg" alt="Taladro">
        </div>
        <div>
            <p>Nombre de herramienta</p>
            <p>Categoría de herramienta</p>
            <img src="Fotos/gestionManuales/taladro.jpg" alt="Taladro">
        </div>
        <div>
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