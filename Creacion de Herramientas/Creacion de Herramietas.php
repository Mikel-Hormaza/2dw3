<!DOCTYPE html>
<html>

<head>
    <title>Fix Point</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="../Fotos/Icono.ico">
    <link rel="stylesheet" type="text/css" href="CH.css">


<body>
    <?php require_once '../Header/Header.php'?>
    <button id="botonVolver"><a href="">Volver<span> a gestión de manuales</span></a></button>
        <div class="orden">
            <form action="" class="formula">
                <input type="text" name="izena" class="centrar" placeholder="Nombre"><br>
                <input type="text" name="categoria" class="centrar" placeholder="Categoria"><br>
                <label for="Imagen" class="label-img">Imagen:</label>
                <input type="file" class="br" name="picture">
            </form>
            <br>
            <button class="btn">Crear herramienta</button>
        </div>
    <?php require_once '../Footer/footer.php'?>
</body>

</html>