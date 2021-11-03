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
            <p> <span id="crearManual">Crear manual:</span> Introduce el nombre de la máquina-herramienta reparada</p>
        </div>
        <button id="botonVolver"><a href="../gestionManuales/gestionManuales.php">Volver<span> a gestión de manuales</span></a></button>
    </section>
    <main id="contenedor">
        <span id="spanNombresHerramientas"> </span>
        <form id="formulario">
            <input id="idBusquedaNombreHerramienta" type="text" name="herramienta" placeholder="Nombre de la herramienta reparada">
        </form>
        <ul id="mostrarBloqueResultados">

        </ul>
    </main>
</body>

</html>