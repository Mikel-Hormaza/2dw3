<!DOCTYPE html>
<html>

<head>
        <title>Fix Point</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="../Fotos/Icono.ico">
        <link rel="stylesheet" type="text/css" href="Login.css">
        <?php require_once "../Inicio%20de%20sesion/LeerBDInicioSesion.php" ?>
</head>

<body>
        <?php require_once '../Header.php'?>
        <main class="iniciosesion">
                <div class="logo">
                        <img class="imagen" src="../Fotos/Fix Point logo.PNG"><br>
                        <label>Inicie sesion para acceder a contenido privado</label>
                </div><br><br>

                <fieldset class="borde">

                        <form class="inicio">
                                <input type="text" placeholder="Nombre de usuario"><br><br>
                                <input type="text" placeholder="Contraseña"><br><br>
                                <button class="botoninicio">Iniciar sesion</button><br><br>
                                <button class="crearusuatio">Crear nueva cuenta</button>
                        </form>
                </fieldset>

        </main>
        <?php require_once '../footer.php'?>
</body>

</html>