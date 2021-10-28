<html>
    <head>
        <title>Fix Point - Inicio2</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="Fotos/Icono.ico">
        <link type="text/css" rel="stylesheet" href="inicio2.css">

        <!--<script> 
            /* Te lleva a la página de iniciar sesion cuando clicas el botón */
            function iniciaSesion() {
               window.location.replace("Login.php"); /* "/2dw3/Crear usuario/Login.php" */
            }

            /*te lleva a la página de contacto cuando clicas*/
            function contacto() {
                window.location.replace("Contacto.php");
            }
        </script>-->

    </head>
    <body>
    <?php require_once '../Header.php';?>
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
        <?php require_once '../footer.php';?>
    </body>
</html>
