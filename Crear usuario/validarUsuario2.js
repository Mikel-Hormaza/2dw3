window.addEventListener("load", hasiera);

function hasiera() {
    document.getElementById("registrarse").addEventListener("click", validarNombre);
}

function validarNombre() {
    let izena = document.getElementsByClassName("nombre")[0].value;
    let regName = /^[A-Za-z]+$/;  //SOLO LETRAS//

    if (!regName.test(izena)) {
        //alert ("Izen desegokia. Hizkiak soilik onartzen dira");
        return false;
    } else {
        //alert ("Izen egokia");
        return true;
    }
}

function validarEmail() {
    let emaila  = document.getElementsByClassName("correo")[0].value;
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
        //alert ("Lehen pasahitza desegokia. 8 karaktere izan behar ditu. Gutxienez letra larri bat, letra xehe bat eta zenbaki bat");
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
    let bigarrenPasahitza = document.getElementsByClassName("repeatPW")[0].value;

    if (lehenPasahitza != bigarrenPasahitza) {
        //alert ("Pasahitzak gaizki");
        return false;
    } else {
        //alert ("Pasahitzak bat datoz");
        return true;
    }
}

function validarUsuario() {
    if (validarNombre()) {
        //alert ("Nombre apropiado");
        if (validarEmail()) {
            //alert ("Email apropiado");
            if (validarContra()) {
                //alert ("Primera contraseña apropiada");
                if (validarContra2()) {
                    //alert ("Segunda contraseña apropiada");
                    if (compararContraseñas() && confirm ("Lo quieres enviar?")) {
                        alert ("Todo OK");

                        let Nombre = document.getElementsByClassName("nombre")[0].value;
                        let Email = document.getElementsByClassName("correo")[0].value;
                        let Contraseña = document.getElementsByClassName("password")[0].value;

                        var usuario1 = {
                            nombre: Nombre,
                            email: Email,
                            contraseña: Contraseña
                        };

                        alert ("NOMBRE:  " + usuario1.nombre + "  EMAIL:  " + usuario1.email + "  CONTRASEÑA:  " + usuario1.contraseña);

                    } else {
                        alert ("Las contraseñas no coinciden");
                    }
                } else {
                    alert ("Segunda contraseña no apropiada. Debe tener 8 caracteres. Al menos una mayúscula, una minúscula y un número");
                }
            } else {
                alert ("Primera contraseña no apropiada. Debe tener 8 caracteres. Al menos una mayúscula, una minúscula y un número");
            }
        } else {
            alert ("Email no apropiado. Debe tener el siguiente formato: CARACTERES@CARACTERES.DOMINIO");
        }
    } else {
        alert ("Nombre no apropiado. Solo debe incluir letras");
    }
}
