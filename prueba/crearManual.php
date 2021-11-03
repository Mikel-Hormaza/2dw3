<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="crearManual.css">
    <?php require_once 'llamarBDNombresHerramientas.php' ?>
    <script src="buscadorHerramientas.js"></script>
</head>

<body>
    <section>
        <div id="textoAmarillo">
            <img src="Imagenes/crearManual.PNG" alt="Imagen crear">
            <p>Crear manual</p>
        </div>
        <button id="botonVolver"><a href="../gestionManuales/gestionManuales.php">Volver<span> a gestión de manuales</span></a></button>
    </section>
    <main>
        <span id="spanNombresHerramientas">Introduce el nombre de la máquina-herramienta</span>
        <div id="contenedorBuscarNomHerramienta">
            <form id="formulario">
                <input id="idBusquedaNombreHerramienta" type="text" name="herramienta" placeholder="Nombre de la herramienta reparada">
            </form>
            <ul id="mostrarBloqueResultados">
            </ul>
        </div>
        <button id="siguentePaso"><a href="">Siguiente paso</a></button>
    </main>

</body>

</html>