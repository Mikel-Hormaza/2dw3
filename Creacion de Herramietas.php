<!DOCTYPE html>
<html>

<head>
    <title>Fix Point</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="Fotos/Icono.ico">
    <link rel="stylesheet" type="text/css" href="CH.css">
</head>

<body>
    <?php require_once 'Header.php'?>
        <div class="orden">
            <form action="">
                <input type="text" name="izena" class="centrar" placeholder="Nombre"><br>
                <input type="text" name="categoria" class="centrar" placeholder="Categoria"><br>
                <label for="Imagen" >Imagen:</label>
                <input type="file" class="br">
            </form>
            <br>
            <button class="btn">Crear herramienta</button>
        </div>
    <?php require_once 'footer.php'?>
</body>

</html>