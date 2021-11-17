<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../creacionManual/crearManual.css">
    <?php require_once '../buscarHerramienta/BDNombresHerramientas.php' ?>
    <script src="../buscarHerramienta/buscadorHerramientas.js"></script>
    <?php session_start(); ?>
</head>

<body id="bodyCrearManual1">
    <?php require_once '../Header/Header.php' ?>
    <section>
        <div class="titulo" id="amarillo">
            <img src="../creacionManual/Imagenes/crearManual.PNG" alt="Imagen crear">
            <p>Crear manual</p>
        </div>
        <button id="botonVolver"><a href="../gestionManuales/gestionManuales.php">Volver<span> a gestión de manuales</span></a></button>
    </section>
    <main>
        <span id="spanNombresHerramientas"></span>
        <h3>Para iniciar la creación del manual introduce el nombre de la máquina-herramienta reparada</h3>
        <div id="contenedorBuscarNomHerramienta">
            <form id="formulario" method="post" action="../buscarHerramienta/validarNombreHerramienta.php">
                <input id="idBusquedaNombreHerramienta" type="text" name="herramienta" placeholder="Nombre de la herramienta reparada" required="required">
            </form>
            <ul id="mostrarBloqueResultados">
            </ul>
        </div>
        <div id="registrarHerramientas">
            <img src="../creacionManual/Imagenes/duda.png" alt="Duda">
            <div>
                <p>¿No encuentras tu herramienta?</p>
                <button><a href="../Creacion de Herramientas/CreaciondeHerramietas.php">Registrar <span>herramienta</span></a></button>
            </div>
        </div>
        <button id="siguientePaso">Siguiente paso</button>
    </main>
    <?php require_once '../Footer/Footer.php' ?>
</body>

</html>