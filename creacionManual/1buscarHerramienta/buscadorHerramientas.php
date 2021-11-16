<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../crearManual.css">
    <?php require_once 'BDNombresHerramientas.php' ?>

    <script src="buscadorHerramientas.js"></script>
    <?php session_start(); ?>
</head>

<body id="bodyCrearManual1">
    <section>
        <div class="titulo" id="amarillo">
            <img src="../Imagenes/crearManual.PNG" alt="Imagen crear">
            <p>Crear manual</p>
        </div>
        <button id="botonVolver"><a href="">Volver<span> a gestión de manuales</span></a></button>
    </section>
    <main>
        <span id="spanNombresHerramientas"></span>
        <h3>Para iniciar la creación del manual introduce el nombre de la máquina-herramienta reparada</h3>
        <div id="contenedorBuscarNomHerramienta">
            <form id="formulario" method="post" action="validarNombreHerramienta.php">
                <input id="idBusquedaNombreHerramienta" type="text" name="herramienta" placeholder="Nombre de la herramienta reparada" required="required">
            </form>
            <ul id="mostrarBloqueResultados">
            </ul>
        </div>
        <div id="registrarHerramientas">
            <img src="../Imagenes/duda.png" alt="Duda">
            <div>
                <p>¿No encuentras tu herramienta?</p>
                <button>Registrar <span>herramienta</span></button>
            </div>
        </div>
        <button id="siguientePaso">Siguiente paso</button>
    </main>

</body>

</html>