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
<header>
        <div class="Headermain">
            <div>  
                <img src="../Fotos/Fix Point logo.PNG" alt="" class="logo" class="item1">
            </div>
            <nav class="item2">
                <ul>
                    <li><a href="#">INICIO</a></li>
                    <li><a href="#">BIBLIOTECA</a></li>
                    <li><a href="#">ALQUILER</a></li>
                    <li><a href="#">FIXPOINT</a></li>
                </ul>
            </nav>
            <input type="button" value="Iniciar sesion" class="sesion" class="item3">
        </div>
    </header>

    <form method="post" action="crearUsuario2.php">
        <br>
        <input type="submit" class="volver" value="VOLVER" >
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
    <footer class="footer-distributed">
        <div class="footer-I">
            <img src="../Fotos/Fix Point logo.PNG" alt="" class="logo">
            <p>FixPoint</p>
            <p>Manuales y alquileres de herramientas</p>
            <a href="#" class="contact">Cont&aacute;ctanos</a>
        </div>
        <div class="footer-C">
            <div class="Footermain">
                <img src="../Fotos/maps.png" alt="" class="maps">
                <p><span>Calle Gervasio Manrique de Lara</span> Soria, España</p>
            </div>
            <br>
            <div class="Footermain">
                <img src="../Fotos/Logo-telefono.png" alt="" class="telefono">
                <p>+34 975 23 94 43</p>
            </div>
            <br>
            <div class="Footermain">
                <img src="../Fotos/gmail.png" alt="" class="gmail">
                <p>fixpointt5@gmail.com</p>
            </div>
        </div>
        <div class="footer-D">
            <p class="footer-logos">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2975.868228083871!2d-2.484367449034827!3d41.766498779129286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd44d2e709876957%3A0x469c9525026cc4ad!2sCentro%20Integrado%20De%20Formaci%C3%B3n%20Profesional%20Pic%C3%B3%20Frentes!5e0!3m2!1ses!2ses!4v1634299318239!5m2!1ses!2ses" width="220" height="120" style="border:0;" frameborder=”0” allowfullscreen="" loading="lazy" aria-hidden="false" tabindex="0"></iframe>
            </p>
            <div class="footer-icons">
                <a href="#"><img src="../Fotos/facebook-f.png" alt="" class="facebook"></a>
                <a href="#"><img src="../Fotos/instagram-f.png" alt="" class="instagram"></a>
                <a href="#"><img src="../Fotos/twitter-f.png" alt="" class="instagram"></a>
            </div>
        </div>
    </footer>
</body>
</html>
