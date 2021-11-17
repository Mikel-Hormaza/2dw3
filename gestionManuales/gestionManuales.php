<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de manuales </title>
    <link rel="stylesheet" href="gestionManuales.css">
    <script src="gestionManuales.js"></script>
    <?php require_once "BDGestionManuales.php" ?>
</head>

<body>
    <?php require_once '../Header/Header.php' ?>
    <section>
        <img src="Imagenes/imgGestionManuales.png" alt="Imagen manual">
        <button class="botonVolver"><a href="../Biblioteca/Biblioteca.php">volver</a></button>
        <div id=botones>
            <button><a href="../buscarHerramienta/buscadorHerramientas.php">crear</a></button>
        </div>
    </section>

    <section>
        <form id="formulario" method="post" action="BDGestionManuales.php">
            <button type="button" id="idBotonDesplegar" name="idBotonDesplegar" class="botonDesplegar">&#128270</button>
            <div id="idBloqueDesplegar" class="contenidoADesplegar">
                <button type="button" id="categoria" name="categoria">Categoria</button>
                <?php echo comprobarOpcionesDesplegablesAMostrar($_SESSION["permisoDeUsuario"]); ?>
            </div>
            <div id="idContenidoCategoria" class="contenidoCategoria">
                <?php cargarLasOpcionesDeCategoriaExistentesEnLaBD(); ?>
            </div>
        </form>

        <div>

        </div>
    </section>

    <main id="listaManuales">

        <?php
        if (!empty($datosManuales)) {
            $contador = 0;
            foreach ($datosManuales as $manual) {
                $contador++;
        ?>
                <div class="manual<?php echo $contador; ?>" id="manual<?php echo $manual["codManual"]; ?>">
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
                    <?php echo '<img class="fotoDelManual" src="data:image/jpeg;base64,' . base64_encode($manual["fotoManual"]) . '"/>' ?>

                </div>
        <?php
            }
        }
        ?>

    </main>

    <form method="POST" id="botonesInicioFinal" action="BDGestionManuales.php">
        <span id="spanBotonesInicioFinal"><?PHP echo $_SESSION['codigoDelPrimerManualDeLaTabla'] . "," . $_SESSION['codigoDelPrimerManualDeLaTablaMostrado'] . "," . $_SESSION['codigoDelUltimoManualDeLaTablaMostrado'] . "," . $_SESSION['codigoDelUltimoManualDeLaTabla']; ?></span>
        <button id="primero" name="primero"><img src="Imagenes/primero.png" alt="primero"></button>
        <button id="anterior" name="anterior"><img src="Imagenes/anterior.png" alt="anterior"></button>
        <button id="siguiente" name="siguiente"><img src="Imagenes/siguiente.png" alt="siguiente"></button>
        <button id="ultimo" name="ultimo"><img src="Imagenes/último.png" alt="ultimo"></button>
    </form>

    <?php require_once '../Footer/footer.php' ?>
</body>

</html>