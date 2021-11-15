<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../crearManual.css">
    <?php 
    require_once "BDleerDatosManual.php"; 
    ?>
    <script src="Manual.js"></script>
    <script src="validarDatosManual.js"></script>
</head>

<body id="bodyCrearManual2">
    <section>
        <div class="titulo" id="amarillo">
            <img src="../Imagenes/crearManual.PNG" alt="Imagen crear">
            <p>Crear manual</p>
        </div>
        <button id="botonVolver">Volver</button>
    </section>
    <div>
        <h3>Introduce los datos del manual</h3>
        <?php echo mostrarFormulario(); ?>
        <span id="gestionarDatosFormularioManual"></span>
    </div>

</body>

</html>