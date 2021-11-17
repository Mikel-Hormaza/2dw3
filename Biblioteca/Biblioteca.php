<!DOCTYPE html>
<html>

<head>
    <title>Fix Point</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="../Fotos/Icono.ico">
    <link rel="stylesheet" type="text/css" href="biblioteca.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="../Biblioteca/Biblioteca.js"></script>
    <?php require_once '../Biblioteca/leerBDBiblioteca.php'?>
</head>

<body>
    <?php require_once '../Header/Header.php'?>
        <div class="box">
            <div class="contenedor">
                <span><i class="icon-buscar"></i></span>
                <input type="search" id="buscar" placeholder="Buscar..." />     
            </div>
            <button class="btn">Gestion de herramienta</button>
            <button class="btn">Gestion de manuales</button>

        </div>
        <section class="contenedos" id="Manuales">
            <?php foreach($sqlBiblioteca as $manuales){?>
            <div class="div" id="Manual" onClick="window.location.href='../visualizarManual/visualizarManual.php'">
            <?php echo '<img class="fotos" src="data:image/jpeg;base64,' . base64_encode($manuales["fotoManual"]) . '"/>' ?>
            <p><?php echo $manuales["nombreManual"]?></p>
            </div>
            <?php 
            }
            ?>
        </section>
        <div id="botonesInicioFinal">
            <button class="btnCambio"><img src="../Biblioteca/Fotos/primero.png" alt="triangulo"></button>
            <button class="btnCambio"><img src="../Biblioteca/Fotos/anterior.png" alt="triangulo"></button>
            <button class="btnCambio"><img src="../Biblioteca/Fotos/siguiente.png" alt="triangulo"></button>
            <button class="btnCambio"><img src="../Biblioteca/Fotos/último.png" alt="triangulo"></button>
        </div>
    <?php require_once '../Footer/footer.php'?>
</body>

</html>