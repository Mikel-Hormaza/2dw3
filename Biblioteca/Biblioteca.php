<!DOCTYPE html>
<html>

<head>
    <title>Fix Point</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="../Fotos/Icono.ico">
    <link rel="stylesheet" type="text/css" href="biblioteca.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
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
        <section class="contenedos">
            <div class="div">
                <img src="../Biblioteca/Fotos/clavadora.png" alt="" class="fotos">
                <label for="">Clavadora</label>
            </div>
            <div class="div">
                <img src="../Biblioteca/Fotos/Atorillador(black+decker).png" alt="" class="fotos">
                <label for="">Atornillador</label>
            </div>
            <div class="div">
                <img src="../Biblioteca/Fotos/multilijadora.png" alt="" class="fotos">
                <label for="">Multilijadora</label>
            </div>
            <div class="div">
                <img src="../Biblioteca/Fotos/Amoladora.png" alt="" class="fotos">
                <label for="">Amoladora</label>
            </div>
            <div class="div">
                <img src="../Biblioteca/Fotos/Sierra Calar.png" alt="" class="fotos">
                <label for="">Sierra</label>
            </div>
            <div class="div">
                <img src="../Biblioteca/Fotos/Taladro.png" alt="" class="fotos">
                <label for="">Taladro</label>
            </div>
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