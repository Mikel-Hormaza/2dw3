<!DOCTYPE html>
<html>
<head>
    <title>Fixpoint - Crear Usuario 2</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Fotos/Icono.ico">
    <link type="text/css" rel="stylesheet" href="crearUsuario.css">
</head>
<body>
    <form method="post" class="form">
            <br>
            <input type="submit" class="volver" value="Volver a inicio de sesión">
        <fieldset class="fieldset">
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
            <input type="submit" class="registrarse" onclick="validarUsuario()" value="Registrarse">
        </fieldset>
    </form>

    <script>
        
        /*window.addEventListener("load", hasiera);

        function hasiera() {
            //alert ("Kaixo");
            document.getElementsByClassName("registrarse").addEventListener("click", validarNombre());
        }*/

        /*function recogerDatos() {
            let izena = document.getElementsByClassName("nombre")[0].value;
            let emaila = document.getElementsByClassName("correo")[0].value;
            let pasahitza1 = document.getElementsByClassName("password")[0].value;
            let pasahitza2 = document.getElementsByClassName("repeatPW")[0].value;
            let lehenPasahitza = document.getElementsByClassName("password")[0].value;
            let  bigarrenPasahitza = document.getElementsByClassName("repeatPW")[0].value;

            function validarNombre() {
                let regName = /^[A-Za-z]+$/;

                if (!regName.test(izena)) {
                    alert ("Izen desegokia. Hizkiak soilik onartzen dira");
                    return false;
                } else {
                    //alert ("Izen egokia");
                    return true;
                }
            }
            function validarEmail() {
                let RegEmaila = /^[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,4}/;

                if (!RegEmaila.test(emaila)) {
                    alert ("Emaila desegokia");
                    return false;
                } else {
                    //alert ("Emaila egokia");
                    return true;
                }
            }
            function validarContra() {
                let regPasahitza1 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

                if (!regPasahitza1.test(pasahitza1)) {
                    alert ("Lehen pasahitza desegokia");
                    return false;
                } else {
                    //alert ("Lehen pasahitza egokia");
                    return true;
                }
            }
            function validarContra2() {
                let regpasahitza2 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

                if (!regpasahitza2.test(pasahitza2)) {
                    alert ("Bigarren pasahitza desegokia");
                    return false;
                } else {
                    //alert ("Bigarren pasahitza egokia");
                    return true;
                }
            }
            function compararContraseñas() {
                if (pasahitza1 != pasahitza2) {
                    alert ("Pasahitzak ez datoz bat");
                    return false;
                } else {
                    //alert ("Pasahitzak bat datoz");
                    return true;
                }
            }

            if (validarNombre() && validarEmail() && validarContra() && validarContra2()) {
                alert ("Datu denak egokiak");
                if (compararContraseñas()) {
                    alert ("Dena PERFECT");
                    return true;
                } else {
                    //alert ("Pasahitzak ez datoz bat");
                }
            } else {
                alert ("Daturen bat desegokia");
            }

        }*/

        function validarNombre() {
            let izena = document.getElementsByClassName("nombre")[0].value;
            let regName = /^[A-Za-z]+$/;  /*SOLO LETRAS*/

            //alert (izena);

            if (!regName.test(izena)) {
                //alert ("Izen desegokia. Hizkiak soilik onartzen dira");
                return false;
            } else {
                //alert ("Izen egokia");
                return true;
            }
        }
        function validarEmail() {
            let emaila = document.getElementsByClassName("correo")[0].value;
            let regEmaila = /^[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,4}/;  /*CARACTERES@CARACTERES.DOMINIO*/

            if (!regEmaila.test(emaila)) {
                //alert ("Emaila desegokia. Formatu honetakoa izan behar da: karaktereak@karaktereak.domeinua");
                return false;
            } else {
                //alert ("Email egokia");
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

        function validarUsuario() {
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
</body>
</html>
