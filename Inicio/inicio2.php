<html>
    <head>
        <title>Fix Point - Inicio2</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="Fotos/Icono.ico">
        <link type="text/css" rel="stylesheet" href="Inicio2.css">

        <script> 
            /* Te lleva a la página de iniciar sesion cuando clicas el botón */
            function iniciaSesion() {
               window.location.replace("Login.php"); /* "/2dw3/Crear usuario/Login.php" */
            }

            /*te lleva a la página de contacto cuando clicas*/
            function contacto() {
                window.location.replace("Contacto.php");
            }
        </script>

    </head>
    <body>
    <header>
        <div class="Headermain">
            <div>  
                <img src="../Fotos/Fix Point logo.PNG" alt="" class="logo" class="item1" onclick="">
            </div>
            <nav class="item2">
                <ul>
                    <li><a href="Inicio.php">INICIO</a></li>
                    <li><a href="#">BIBLIOTECA</a></li>
                    <li><a href="#">ALQUILER</a></li>
                    <li><a href="#">FIXPOINT</a></li>
                </ul>
            </nav>
            <input type="button" value="Iniciar sesion" class="sesion" class="item3" onclick="iniciaSesion()">
        </div>
    </header>
        <div class="quienesSomos">
            <div class="quienes"><h2>¿QUIÉNES SOMOS?</h2></div>
            <div class="somos"><h3>FixPoint es una organización de Soria llevada a cabo en el centro educativo Pico Frentes. 
                        Nos encargamos de recoger herramientas rotas o las que no funcionen bien para 
                        repararlas y poder volver a utilizarlas. De esta manera, ponemos a disposición pública 
                        las herramientas reparadas.</h3><h3>Invitamos a todo el que quiera a que se acerce a nuestro 
                        centro y ayudarnos a llevar adelante nuestro proyecto.</h3>
            </div>
        </div>
        <div class="container">
            <div class="div1">
                <img class="imagen1" src="/2dw3/Inicio/Fotos/profesionalidad1.jpg">
                <div class="carac1"><h3>PROFESIONALIDAD</h3></div>
            </div>
            <div class="div2">
                <img class="imagen2" src="/2dw3/Inicio/Fotos/sostenibilidad.jpg">
                <div class="carac2"><h3>SOSTENIBILIDAD</h3></div>
            </div>
            <div class="div3">
                <img class="imagen3" src="/2dw3/Inicio/Fotos/reparar.jpg">
                <div class="carac3"><h3>RESPONSABILIDAD</h3></div>
            </div>
            <div class="div4">
                <img class="imagen4" src="/2dw3/Inicio/Fotos/solidaridad2.png">
                <div class="carac4"><h3>SOLIDARIDAD</h3></div>
            </div>

        </div>
        <footer class="footer-distributed">
        <div class="footer-I">
            <img src="../Fotos/Fix Point logo.PNG" alt="" class="logo">
            <p>FixPoint</p>
            <p>Manuales y alquileres de herramientas</p>
            <a href="#" class="contact" onclick="contacto()">Cont&aacute;ctanos</a>
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
