<!DOCTYPE html>
<html>

<head>
    <title>Fix Point</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="../Fotos/Icono.ico">
    <link rel="stylesheet" type="text/css" href="CreacionHerramientas.css">


<body>
    <?php require_once '../Header/Header.php'?>
    <button class="botonVolver">Volver<span> a gestion de herramientas</span></button>
        <div class="orden">
            <fieldset>
                <form action="" class="formula">
                    <input type="text" name="izena" class="centrar" placeholder="Nombre"><br>
                    <select name="categoria"class="centrar" placeholder="Categoria">
                        <option value="C" class="Categoria">Categoria</option>
                        <option value="MH">maquina-herramienta</option>
                        <option value="E">electronica</option>
                        <option value="HT">herramienta taller</option>
                    </select>
                    <label for="Imagen" class="label-img">Imagen</label>
                    <input type="file" class="br" name="picture">
                </form>
            </fieldset>
            <br>
            <button class="btn">Crear herramienta</button>
        </div>
    <?php require_once '../Footer/footer.php'?>
</body>

</html>