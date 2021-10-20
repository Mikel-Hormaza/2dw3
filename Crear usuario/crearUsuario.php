<!DOCTYPE html>
<html>
<head>
    <title>Fixpoint - Crear Usuario</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Fotos/Icono.ico">
    <link type="text/css" rel="stylesheet" href="crearUsuario.css">
</head>
<body>
    <!--<header>
        <div class="divheader">
            <img src="Fotos/Fix Point logo.PNG" alt="" class="logo">
            <nav>
                <ul>
                    <li><a href="#">SUPLICIO</a></li>
                    <li><a href="#">BIBLIOTECA</a></li>
                    <li><a href="#">ALQUILER</a></li>
                    <li><a href="#">FIXPOINT</a></li>
                </ul>
            </nav>
            <input type="button" value="Iniciar sesion" class="sesion">
        </div>
            
    </header>-->
    <form method="post">
        <br>
        <input type="submit" class="volver" value="VOLVER AL INICIO DE SESIÓN" >
        <h2 class="create">Crear usuario</h2>
        <br>
        <input type="text" class="nombre" placeholder="  Nombre" pattern="[A-Za-z]{3,}" title="Solo se admiten letras, mínimo 3" required>
        <br><br>
        <input type="text" class="correo" placeholder="  Correo eletrónico" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Tiene que coincidir con este formato: caracteres@caracteres.dominio" required>
        <br><br>
        <input type="password" class="password" placeholder="  Nueva contraseña" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Tiene que tener al menos 8 caracteres, un número, una minúscula y una mayúscula" required> <!-- Al menos 1 número, mayus y minus-->
        <br><br>
        <input type="password" class="repeatPW" placeholder="  Repita la contraseña" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Tiene que tener al menos 8 caracteres, un número, una minúscula y una mayúscula" required>
        <br><br><br><br><br>
        <input type="submit" class="registrarse" value="Registrarse">
    </form>
</body>
</html>
