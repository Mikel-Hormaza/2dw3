<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestion Herramientas</title>
    <link rel="stylesheet" href="gestionHerramientas.css">
    <script src="gestionHerramientas.js"></script>
    <?php require_once "../gestionHerramientas/leerBDGestionHerramientas.php" ?>
</head>

<body>
<<<<<<< HEAD
=======
<?php require_once "../Header/Header.php" ?>
>>>>>>> Mikel
    <section>
        <img src="Imagenes/imgGestionHerramientas.jpg" alt="Imagen herramienta">
        <button class="botonVolver"><a>Volver<span> a biblioteca</span></a></button>
        <div id=botones>
            <button>Crear</button>
        </div>
    </section>


<<<<<<< HEAD
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
                <a>electronica</a>
                <a>herramienta taller</a>
            </div>
        </div>
    </section>
=======
    
>>>>>>> Mikel

    <main id="listaHerramientas">

    <?php
<<<<<<< HEAD
        foreach ($datosHerramienta as $herramienta) {
=======
        foreach ($sqlherramienta as $herramienta) {
>>>>>>> Mikel
           
        ?>

        <div>
            <button>
                <p>editar</p>
                <img src="Imagenes/edit.png" alt="editar">
            </button>
<<<<<<< HEAD
            <p>COD: <?php echo $herramienta["codHerramienta"] . " - " . $herramienta["nombreHerramienta"]?></p>
            <p> <?php echo $herramienta["categoria"]?></p>
           <img class="fotoDelManual" <?php echo $imagen?>/>
=======
            <p> <?php echo $herramienta["categoria"]?></p>
            <p>COD: <?php echo $herramienta["codHerramienta"] . " - " . $herramienta["nombreHerramienta"]?></p>
            <?php echo '<img class="fotoDelManual" src="data:image/jpeg;base64,' . base64_encode($herramienta["fotoHerramienta"]) . '"/>'?>

>>>>>>> Mikel
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

<<<<<<< HEAD

=======
    <?php require_once "../Footer/footer.php" ?>
>>>>>>> Mikel
</body>

</html>