<!DOCTYPE html>
<html>
<head>
    <title>Fixpoint - Crear Usuario 2</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Fotos/Icono.ico">
    <link type="text/css" rel="stylesheet" href="crearUsuario2.css">

    <!--<script>
        function volver() {
            window.location.replace(); 
        }
    </script>-->

</head>
<body>
<?php require_once '../Header.php';?>
    <form method="post" action="crearUsuarioBD.php">
        <br>
        <input type="submit" class="volver" value="VOLVER"> <!-- onclick="volver()" -->
        <h2 class="create">Crear usuario</h2>
        <br>
        <input type="text" name="nombre" class="nombre" placeholder="  Nombre" pattern="[A-Za-z]{3,}" title="Solo se admiten letras, mínimo 3" required>
        <br><br>
        <input type="text" name="correo" class="correo" placeholder="  Correo eletrónico" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Tiene que coincidir con este formato: caracteres@caracteres.dominio" required>
        <br><br>
        <input type="password" name="contraseña" class="password" placeholder="  Nueva contraseña" title="Tiene que tener al menos 8 caracteres, un número, una minúscula y una mayúscula" required>  <!--Al menos 1 número, mayus y minus-->
        <br><br>
        <input type="password" name="contraseña2" class="repeatPW" placeholder="  Repita la contraseña"  title="Tiene que tener al menos 8 caracteres, un número, una minúscula y una mayúscula" required>
        <br><br><br><br><br>
        <input type="submit" class="registrarse" value="Registrarse">
    </form>
    <?php require_once '../footer.php';?>
</body>
</html>
