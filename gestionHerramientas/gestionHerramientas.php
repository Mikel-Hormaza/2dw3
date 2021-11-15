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
    <section>
        <img src="Imagenes/imgGestionHerramientas.jpg" alt="Imagen herramienta">
        <button class="botonVolver"><a>Volver<span> a biblioteca</span></a></button>
        <div id=botones>
            <button>Crear</button>
        </div>
    </section>


    <section>
    <form id="formulario" method="post" action="leerBDGestionHerramientas.php">
            <button type="button" id="idBotonDesplegar" name="idBotonDesplegar" class="botonDesplegar">&#128270</button>
            <div id="idBloqueDesplegar" class="contenidoADesplegar">
                <button type="button" id="categoria" name="categoria">Categoria</button>
                <?php echo comprobarOpcionesDesplegablesAMostrar($_SESSION["permisoDeUsuario"]); ?>
            </div>
            <div id="idContenidoCategoria" class="contenidoCategoria">
                <?php cargarLasOpcionesDeCategoriaExistentesEnLaBD(); ?>
            </div>
            <input type="text" id="buscador" name="buscador" placeholder="Buscador de Herramienta...">
            <button id="idBotonBuscar"> Buscar </button>
        </form>
        <div>
            <!---<button id="idBotonDesplegar" class="botonDesplegar"></button>
            <div id="idBloqueDesplegar" class="contenidoADesplegar">
                <a id="categoria">Categoría</a>
                <a>Creados por mí</a>
                <a>Todos</a>
            </div>
            <input type="text" id="buscador" name="buscador" placeholder="Buscador de manual...">--->
        </div>


        <!---<div>
            <button id="idBotonCategoria" class="botonCategoria">Categoría &#9947</button>
            <div id="idContenidoCategoria" class="contenidoCategoria">
                <a>maquina-herramienta</a>
                <a>electronica</a>
                <a>herramienta taller</a>
            </div>
        </div>--->
    </section>
    <main id="listaHerramientas">

<?php
if (!empty($datosManuales)) {
    foreach ($datosManuales as $herramientas) {
?>
        <div>
        <button>
                <p>editar</p>
                <img src="Imagenes/edit.png" alt="editar">
            </button>
            <p>Código herramienta: <?php echo $herramientas["codHerramienta"] . " - " . $herramientas["nombreHerramienta"] ?></p>
            <?php echo '<img class="fotoDelaHerramienta" src="data:image/jpeg;base64,' . base64_encode($herramientas["fotoHerramienta"]) . '"/>' ?>

        </div>
<?php
    }
}
?>

   <!--- <main id="listaHerramientas">

    <//?php
        foreach ($datosHerramienta as $herramienta) {
           
        ?>

        <div>
            <button>
                <p>editar</p>
                <img src="Imagenes/edit.png" alt="editar">
            </button>
            <p>COD: <//?php echo $herramienta["codHerramienta"] . " - " . $herramienta["nombreHerramienta"]?></p>
            <p> <//?php echo $herramienta["categoria"]?></p>
           <img class="fotoDelManual" <//?php echo $imagen?>/>
        </div>
        <//?php
        }
        ?>--->
    </main>

    <form method="POST" id="botonesInicioFinal" action="leerBDGestionHerramientas.php">
        <span id="spanBotonesInicioFinal"><?PHP echo $_SESSION['codigoDelPrimerManualDeLaTabla'] . "," . $_SESSION['codigoDelPrimerManualDeLaTablaMostrado'] . "," . $_SESSION['codigoDelUltimoManualDeLaTablaMostrado'] . "," . $_SESSION['codigoDelUltimoManualDeLaTabla']; ?></span>
        <button id="primero" name="primero"><img src="Imagenes/primero.png" alt="primero"></button>
        <button id="anterior" name="anterior"><img src="Imagenes/anterior.png" alt="anterior"></button>
        <button id="siguiente" name="siguiente"><img src="Imagenes/siguiente.png" alt="siguiente"></button>
        <button id="ultimo" name="ultimo"><img src="Imagenes/último.png" alt="ultimo"></button>
    </form>
   <!--- <div id="botonesInicioFinal">
        <button><img src="Imagenes/primero.png" alt="triangulo"></button>
        <button><img src="Imagenes/anterior.png" alt="triangulo"></button>
        <button><img src="Imagenes/siguiente.png" alt="triangulo"></button>
        <button><img src="Imagenes/último.png" alt="triangulo"></button>
    </div>--->


</body>

</html>