window.addEventListener("load", hasiera);

function hasiera() {
    document.getElementById("registrarse").addEventListener("click", objetoUsuario);
}

function objetoUsuario() {
    let Nombre = document.getElementsByClassName("nombre")[0].value;
    let Email = document.getElementsByClassName("correo")[0].value;
    let Contraseña1 = document.getElementsByClassName("password")[0].value;
    let Contraseña2 = document.getElementsByClassName("repeatPW")[0].value;


    var usuario1 = {
        nombre: Nombre,
        email: Email,
        contraseña1: Contraseña1,
        contraseña2: Contraseña2,

        validarNombre: function() {
            let regName = /^[A-Za-z]+$/;  //SOLO LETRAS//*/

            if (!regName.test(usuario1.nombre)) {
                //alert ("Nombre no apropiado");
                return alert ("Nombre no apropiado");
            } else {
                //alert ("Nombre apropiado");
                return alert ("Nombre apropiado");
            }
        },
        validarContra: function() {
            let regPassword1 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;  //8 CARACTERES. MINIMO 1 MAYUS, 1 MINUS Y 1 NUM//
    
            if (!regPassword1.test(usuario1.contraseña1)) {
                //alert ("Primera contraseña no apropiada");
                return alert ("Primera contraseña no apropiada");
            } else {
                //alert ("Primera contraseña apropiada");
                return alert ("Primera contraseña apropiada");
            }
        },
        validarContra2: function() {
            let regPassword2 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;   //8 CARACTERES. MINIMO 1 MAYUS, 1 MINUS Y 1 NUM//
    
            if (!regPassword2.test(usuario1.contraseña2)) {
                //alert ("Segunda contraseña no apropiada");
                return alert ("Segunda contraseña no apropiada");
            } else {
                //alert ("Segunda contraseña apropiada");
                return alert ("Segunda contraseña apropiada");
            }
        },
        validarEmail: function() {
            let regEmail = /^[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,4}/;  //CARACTERES@CARACTERES.DOMINIO//
    
            if (!regEmail.test(usuario1.email)) {
                //alert ("Email no apropiado");
                alert ("Email no apropiado");
            } else {
                //alert ("Email apropiado");
                alert ("Email apropiado");
            }
        },
        compararContraseñas: function() {
            if (usuario1.contraseña1 != usuario1.contraseña2) {
                //alert ("Las contraseñas no coinciden");
                return alert ("Las contraseñas no coinciden");
            } else {
                //alert ("Las contraseñas coinciden");
                return alert ("Las contraseñas coinciden");
            }
        },
        validarUsuario: function() {
            if (validarNombre()) {
                alert ("Nombre apropiado");
                if (validarContra()) {
                    alert ("Primera contraseña apropiada");
                    if (validarContra2()) {
                        alert ("Segunda contraseña apropiada");
                        if (validarEmail()) {
                            alert ("Email apropiado");
                            if (compararContraseñas() && confirm ("Seguro que lo quieres enviar?")) {
                                return alert ("Todo OK");
                            } else {
                                return alert ("Las contraseñas no coinciden");
                            }
                        } else {
                            return alert ("Email no apropiado. Debe tener este formato: CARACTERES@CARACTERES.DOMINIO");
                        }
                    } else {
                        return alert ("Segunda contraseña no apropiada. Debe tener al menos 8 caracteres. Una mayuscula, una minuscula y un numero");
                    }
                } else {
                    return alert ("Primera contraseña no apropiada. Debe tener al menos 8 caracteres. Una mayuscula, una minuscula y un numero");
                }
            } else {
                return alert ("Nombre no apropiado. Solo se admiten letras")
            }
        }
    };


    /*function Usuario (nom, contr1, contr2, ema, perm) {
        this.nombre = nom;
        this.contraseña1 = contr1;
        this.contraseña2 = contr2;
        this.email = ema;
        this.permiso = "usuario";
    }
    var usuario1 = new Usuario (Nombre, Contraseña1, Contraseña2, Email);*/


    alert (usuario1.validarEmail());

    /*var arrayUsuarios = [];
    arrayUsuarios[0] = {nombre: Nombre, contraseña: Contraseña, email: Email, permiso: "usuario"};*/


    //alert ("Nombre: " + arrayUsuarios[0].nombre + "    Contraseña: " + arrayUsuarios[0].contraseña + "    Email: "  + arrayUsuarios[0].email + "    Permiso: " + arrayUsuarios[0].permiso);

}
