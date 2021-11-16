<!DOCTYPE html>
<html>

<head>
    <title>Fix Point</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="../Fotos/Icono.ico">
    <link rel="stylesheet" type="text/css" href="CreacionHerramientas.css">
    <?php require_once "../Creacion de Herramientas/leerBDCreaciondeherramientas.php"?>
    <script src="../Creacion de Herramientas/CreaciondeHerramientas.js"></script>

<body>
    <?php require_once '../Header/Header.php'?>
    <button class="botonVolver" >Volver<span> a gestion de herramientas</span></button> 
        <div class="orden">
            <fieldset>
                <form action="" class="formula" id="formulario">
                    <input type="text" id="nombrHerramienta" name="izena" class="centrar" placeholder="Nombre" ><br>
                 
                    <select name="categoria"class="centrar" placeholder="Categoria">
                        <option value="categoria" class="Categoria">Categoria</option>

                    <?php 
                    $cont=-1;
                    foreach ($datosCategoria as $categoria) {
                        $cont++;
                    ?>
                        <option value="categoria" id="categoria"><?php echo $datosCategoria[$cont]["categoria"]?></option>
                        <?php
                    }
                    ?>
                    </select>
                   
                    <button type="button" id="classInputButton2" class="classInputButton" onclick="document.getElementById('classInputFileIMG').click();">Imagen</button>
                    <input id="classInputFileIMG" class="classInputFileIMG" name="classInputFileIMG" type="file" accept="image/png, .jpeg, .jpg" require="required" />
                    
                    <input type="submit" class="btn" id="crearHerramienta" value="Crear herramienta"></button>
                </form>
            </fieldset>
        </div>
    <?php require_once '../Footer/footer.php'?>
</body>

</html>