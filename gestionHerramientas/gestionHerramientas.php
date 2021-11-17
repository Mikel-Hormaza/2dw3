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
    <?php require_once "../Header/Header.php" ?>
    <section>
        <img src="Imagenes/imgGestionHerramientas.jpg" alt="Imagen herramienta">
        <button class="botonVolver"><a>Volver<span> a biblioteca</span></a></button>
        <div id=botones>
            <button>Crear</button>
        </div>
    </section>




    <main id="listaHerramientas">

        <?php
        foreach ($sqlherramienta as $herramienta) {

        ?>

            <div>
                <button>
                    <p>editar</p>
                    <img src="Imagenes/edit.png" alt="editar">
                </button>
                <p> <?php echo $herramienta["categoria"] ?></p>
                <p>COD: <?php echo $herramienta["codHerramienta"] . " - " . $herramienta["nombreHerramienta"] ?></p>
                <?php echo '<img class="fotoDelManual" src="data:image/jpeg;base64,' . base64_encode($herramienta["fotoHerramienta"]) . '"/>' ?>

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