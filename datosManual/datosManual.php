<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../creacionManual/crearManual.css">
    <?php require_once '../datosManual/BDleerDatosManual.php' ?>
    <script src="../datosManual/Manual.js"></script>
    <script src="../datosManual/validarDatosManual.js"></script>
</head>

<body id="bodyCrearManual2">
<?php require_once '../Header/Header.php' ?>
    <section>
        <span id="tipoDeInteraccion"><?php if(isset($_POST["editarOEliminar"])){
            if($_POST["editarOEliminar"]=="editar"){
                echo $_POST["editarOEliminar"];
            }
        } ?></span>
        <div class="titulo" id="amarillo">
            <img src="../creacionManual/Imagenes/crearManual.PNG" alt="Imagen crear">
            <p>Crear manual</p>
        </div>
    </section>
    <div>
        <h3>Introduce los datos del manual</h3>
        <?php echo mostrarFormulario(); ?>
        <span id="gestionarDatosFormularioManual"></span>
    </div>
    <?php require_once '../Footer/footer.php' ?>
</body>

</html>