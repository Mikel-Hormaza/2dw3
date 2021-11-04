<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="crearManual.css">
    <?php require_once 'llamarBDNombresHerramientas.php' ?>
    <script src="buscadorHerramientas.js"></script>
</head>

<body id="bodyCrearManual1">
    <section>
        <div class="titulo" id="amarillo">
            <img src="Imagenes/crearManual.PNG" alt="Imagen crear">
            <p>Crear manual</p>
        </div>
        <button id="botonVolver"><a href="../gestionManuales/gestionManuales.php">Volver<span> a gestión de manuales</span></a></button>
    </section>
    <main>
        <span id="spanNombresHerramientas"></span>
        <h3>Para iniciar la creación del manual introduce el nombre de la máquina-herramienta reparada</h3>
        <div id="contenedorBuscarNomHerramienta">
            <form id="formulario">
                <input id="idBusquedaNombreHerramienta" type="text" name="herramienta" placeholder="Nombre de la herramienta reparada">
            </form>
            <ul id="mostrarBloqueResultados">
            </ul>
        </div>
        <div id="registrarHerramientas">
            <img src="Imagenes/duda.png" alt="Duda">
            <div>
                <p>¿No encuentras tu herramienta?</p>
                <button><a href="">Registrar <span>herramienta</span></a></button>
            </div>
        </div>
        <button id="siguientePaso"><a href="">Siguiente paso</a></button>
    </main>

</body>

</html>