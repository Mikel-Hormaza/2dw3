<!DOCTYPE html>
<html lang="es">

<head>
        <title>Fix Point</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="../Fotos/Icono.ico">
        <link rel="stylesheet" type="text/css" href="Login.css">
        <?php require_once "../Inicio de sesion/LeerBDInicioSesion.php" ?>
</head>

<body>
        <main class="iniciosesion">
                <div class="logo">
                        <img class="imagen" src="../Fotos/Fix Point logo.PNG" onclick="window.location='../Inicio de sesion/Login.php';"><br>
                        <label>Inicie sesion para acceder a contenido privado</label>
                </div><br><br>

                <fieldset class="borde">

                        <form class="inicio" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" action="LeerBDInicioSesion.php">
                                <input type="text" name="NombredeUsuario" placeholder="Nombre de usuario"><br><br>
                                <input type="text" name="Contraseña" placeholder="Contraseña"><br><br>
                                <span><?php echo $error; ?></span>
                                <span><?php echo $errorinicio; ?></span><br>
                                <input type="submit" class="botoninicio" name="InicioSesion" value="Inicio de sesion"><br><br>
                                <button class="crearusuatio">Crear nueva cuenta</button>
                        </form>
                </fieldset>

        </main>
        <?php require_once '../footer.php' ?>
</body>

</html>