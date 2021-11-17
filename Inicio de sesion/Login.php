<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html lang="es">

<head>
        <title>Fix Point</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="../Fotos/Icono.ico">
        <link rel="stylesheet" type="text/css" href="Login.css">
        <?php require_once "../Inicio de sesion/LeerBDInicioSesion.php" ?>
        <script src="../Inicio de sesion/Login.js"></script>
</head>

<body>
        <main class="iniciosesion">
                <div class="logo">
                        <!--El onclick se utiliza para que al clicar el logo te envie a la pantalla de inicio--->
                        <img class="imagen" src="../Fotos/Fix Point logo.PNG" onclick="window.location='../Inicio de sesion/Login.php';"><br>
                        <label>Inicie sesion para acceder a contenido privado</label>
                </div><br><br>

                <fieldset class="borde">

                        <form id="formulario" class="inicio" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" action="LeerBDInicioSesion.php">
<<<<<<< HEAD
                                <input type="text" name="NombredeUsuario" id="NombredeUsuario" placeholder="Nombre de usuario"><br><br>
                                <input type="text" name ="Contrasena" id="Contrasena" placeholder="Contraseña"><br>
                                <!--Si hay un error el mensage aparecera en el span recogido  desde el php ddonde esta el textode error--->
                                <span><?php echo $error; ?></span>
                                <span><?php echo $errorpass; ?></span>
=======
                                <input type="text" name="NombredeUsuario" id="NombredeUsuario" placeholder="Nombre"><br><br>
                                <input type="text" name="Contrasena" id="Contrasena" placeholder="Contraseña"><br>
                                <!--Si hay un error el mensage aparecera en el span recogido  desde el php ddonde esta el textode error--->
<<<<<<< HEAD
>>>>>>> Mikel
                                <span><?php echo $errorinicio; ?></span><br>
                                <input type="button" id="Iniciosesion" class="botoninicio" name="InicioSesion" value="Inicio de sesion"><br><br> 
=======

                                <input type="button" id="Iniciosesion" class="botoninicio" name="InicioSesion" value="Inicio de sesion"><br><br>
>>>>>>> Mikel
                                <button class="crearusuario">Crear nueva cuenta</button>
                        </form>
                </fieldset>

        </main>
<<<<<<< HEAD
<<<<<<< HEAD
        <?php require_once '../footer.php' ?>
=======
      <?php require_once '../Footer/footer.php' ?>
>>>>>>> Mikel
       
=======
        </ /?php require_once '../Footer/footer.php' ?>

>>>>>>> Mikel
</body>

</html>