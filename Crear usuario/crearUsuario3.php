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

    <form method="post">
        <br>
        <input type="submit" class="volver" value="VOLVER A INICIO DE SESIÓN">
        <h2 class="create">Crear usuario</h2>
        <br>
        <p id="mezua"></p>
        <br>
        <input type="text" name="nombre" class="nombre" placeholder="  Nombre" maxlength="30" pattern="[A-Za-z]{2,30}" title="Solo se admiten letras. Entre 2 y 30 caracteres" required>
        <br><br>
        <input type="email" name="correo" class="correo" placeholder="  Correo eletrónico" pattern="^[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,4}" title="Tiene que coincidir con este formato: caracteres@caracteres.dominio" required>
        <br><br>
        <input type="password" name="contraseña" class="password" placeholder="  Nueva contraseña" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" title="Mínimo 8 caracteres, 1 mayúscula, 1 minúscula y 1 número" required>
        <br><br>
        <input type="password" name="contraseña2" class="repeatPW" placeholder="  Repita la contraseña" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" title="Mínimo 8 caracteres, 1 mayúscula, 1 minúscula y 1 número" required>
        <br><br><br><br><br>
        
        <input type="submit" class="registrarse" value="Registrarse">
    </form>

    <script>
        window.addEventListener("load", hasiera);

        function hasiera() {
            alert ("hasiera");
            document.getElementsByClassName("registrarse").addEventListener("click", validarNombre);
        }

        function validarNombre() {
            alert ("validar nombre");
            /*let izena = document.getElementsByClassName("nombre")[0].value;
            let regName = /^[A-Za-z]+$/;  //SOLO LETRAS//

            if (!regName.test(izena)) {
                alert ("Izen desegokia. Hizkiak soilik onartzen dira");
                return false;
            } else {
                alert ("Izen egokia");
                return true;
            }*/
        }

        function validarEmail() {
            let emaila = document.getElementsByClassName("correo")[0].value;
            let regEmaila = /^[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,4}/;  /*CARACTERES@CARACTERES.DOMINIO*/

            if (!regEmaila.test(emaila)) {
                alert ("Emaila desegokia. Formatu honetakoa izan behar da: karaktereak@karaktereak.domeinua");
                return false;
            } else {
                alert ("Email egokia");
                return true;
            }
        }

        function validarContra() {
            let pasahitza1 = document.getElementsByClassName("password")[0].value;
            let regPasahitza1 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;  /*8 CARACTERES. MINIMO 1 MAYUS, 1 MINUS Y 1 NUM*/

            if (!regPasahitza1.test(pasahitza1)) {
                //alert ("Pasahitza desegokia. 8 karaktere izan behar ditu. Gutxienez letra larri bat, letra xehe bat eta zenbaki bat");
                return false;
            } else {
                //alert ("Lehen pasahitza egokia");
                return true;
            }
        }

        function validarContra2() {
            let pasahitza2 = document.getElementsByClassName("repeatPW")[0].value;
            let regPasahitza2 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;   /*8 CARACTERES. MINIMO 1 MAYUS, 1 MINUS Y 1 NUM*/

            if (!regPasahitza2.test(pasahitza2)) {
                //alert ("Bigarren pasahitza desegokia. 8 karaktere izan behar ditu. Gutxienez letra larri bat, letra xehe bat eta zenbaki bat");
                return false;
            } else {
                //alert ("Bigarren pasahitza egokia");
                return true;
            }
        }

        function compararContraseñas() {
            let lehenPasahitza = document.getElementsByClassName("password")[0].value;
            let  bigarrenPasahitza = document.getElementsByClassName("repeatPW")[0].value;

            //alert(lehenPasahitza + " " + bigarrenPasahitza);

            if (lehenPasahitza != bigarrenPasahitza) {
                //alert ("Pasahitzak gaizki");
                return false;
            } else {
                //alert ("Pasahitzak bat datoz");
                return true;
            }
        }

        function validarTodo() {
          //----------------------------------------------- OPCIÓN (de 1 en 1)--------------------------------------------------//
            if (validarNombre()) {
                //alert ("Izen egokia");
                if (validarEmail()) {
                    //alert ("Emaila egokia");
                    if (validarContra()) {
                        //alert ("PW 1 egokia");
                        if (validarContra2()) {
                            if (compararContraseñas() && confirm ("Bidali nahi duzu?")) {
                                alert ("Dena OK");

                                let Izena = document.getElementsByClassName("nombre")[0].value;
                                let Email = document.getElementsByClassName("correo")[0].value;
                                let PW = document.getElementsByClassName("password")[0].value;

                                var usuario1 = {
                                    nombre: Izena,
                                    gmail: Email,
                                    contra: PW
                                };

                                /*alert (usuario1.nombre);
                                alert (usuario1.gmail);
                                alert (usuario1.contra);*/

                                var usuario2 = {
                                    nombre: "Lara",
                                    gmail: "lara@gmail.com",
                                    contra: "lara1LARA"
                                };

                                // ARRAY USUARIOS (no terminado) //
                                var usuarios = [usuario1, usuario2];

                            } else {
                                alert ("Pasahitzak ez datoz bat");
                            }
                        } else {
                            alert ("Bigarren pasahitza desegokia");
                        }
                    } else {
                        alert ("Lehen pasahitza desegokia");
                    }
                } else {
                    alert ("Emaila desegokia");
                }
            } else {
                alert ("Izen desegokia");
            }
        }
    </script>

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
