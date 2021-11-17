<!DOCTYPE html>
<html>
<head>
    <title>Fixpoint - Crear Usuario</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" type="image/png" href="Fotos/Icono.ico"> -->
    <link type="text/css" rel="stylesheet" href="crearUsuario.css">
    <script type="text/javascript" src="Usuario.js"></script>
    <script type="text/javascript" src="validarUsuario.js"></script>
    <?php session_start(); ?>
</head>
<body>
    <form method="post" class="form" id="form" action="validarUsuario.php">
            <br>
            <input type="submit" class="volver" onclick="window.location='../Inicio de sesion/Login.php';" id="volver" value="Volver a inicio de sesión">
        <fieldset class="fieldset">
            <h2 class="create">Crear usuario</h2>
            <br>
            <p id="mezua"></p>
            <br>
            <input type="text" name="nombre" class="nombre" id="nombre" placeholder="  Nombre" maxlength="30" pattern="[A-Za-z]{2,30}" title="Solo se admiten letras. Entre 2 y 30 caracteres" required>
            <br><br>
            <input type="email" name="correo" class="correo" id="correo" placeholder="  Correo eletrónico" pattern="^[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,4}" title="Tiene que coincidir con este formato: caracteres@caracteres.dominio" required>
            <br><br>
            <input type="password" name="contraseña" class="password" id="password" placeholder="  Nueva contraseña" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" title="Mínimo 8 caracteres, 1 mayúscula, 1 minúscula y 1 número" required>
            <br><br>
            <input type="password" name="contraseña2" class="repeatPW" id="repeatPW" placeholder="  Repita contraseña" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" title="Mínimo 8 caracteres, 1 mayúscula, 1 minúscula y 1 número" required>
            <br><br><br><br><br>
        
            <input type="submit" class="registrarse" id="registrarse" value="Registrarse">
        </fieldset>
        
    </form>
</body>
</html>

