<!DOCTYPE html>
<html>
    <head>
        <title>Fix Point</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="../Fotos/Icono.ico">
        <link rel="stylesheet" type="text/css" href="Contacto.css">     
    </head>
    <body>
        <?php require_once '../Header/Header.php'?>
        <div class="titulo" id="amarillo">
            <img src="../Contacto/Fotos/capa-1080x675.png" alt="" class="imagenFondo">
            <p>¡Escríbenos!</p>
        </div>
        <form action="" method="">
            <fieldset>
                <input type="text" name="izena" placeholder="Maria del mar"><br>
                <input type="text" name="abizena" placeholder="G&oacute;mez L&oacute;pez"><br>
                <input type="text" name="gmail" placeholder="mariagomez@gmail.com"><br>
                <input type="text" name="telefonoa" placeholder="654654654"><br>
                <textarea name="" class="tarea" cols="60" rows="10" placeholder="Escribe &aacute;qui tu mensaje"></textarea>
            </fieldset>
        </form>
        <?php require_once '../Footer/footer.php'?>
    </body>
</html>