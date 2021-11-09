//import {validarNombreUsuario, validarContra1Usuario, validarContra2Usuario, validarEmailUsuario, compararContraseñas, validarUsuarioCompleto} from "./Usuario";

window.addEventListener("load", inicio);

function inicio() {
    document.getElementById("registrarse").addEventListener("click", comprobarSiSeIntroducenLosDatos);
}

function comprobacionesSubmit() {
    if (validarDatos() == true) {
        //alert ("validarDatos OK");
        document.getElementById("form").submit();
        if (validarUsuarioCompleto() == true) {
            //alert ("Nombre PERFECTO");
        } else {
            //alert ("Nombre SAD");
        }
    } else {
        alert ("Error de comprobaciones y submit");
    }
}

function validarDatos() {
    //alert ("validarDatos");

    if (comprobarSiSeIntroducenLosDatos(crearObjetoUsuario()).length > 1) {
        alert (comprobarSiSeIntroducenLosDatos(crearObjetoUsuario()));
        return false;
    } else {
        return true;
    }
}

function crearObjetoUsuario() {
    //alert ("crearObjetoUsuario");

    let d_nombreUsuario = document.getElementById("nombre").value;
    let d_contra1Usuario = document.getElementById("password").value;
    let d_contra2Usuario = document.getElementById("repeatPW").value;
    let d_emailUsuario = document.getElementById("correo").value;

    let usuario1 = new Usuario (d_nombreUsuario, d_contra1Usuario, d_contra2Usuario, d_emailUsuario);
    return usuario1;
}

function comprobarSiSeIntroducenLosDatos(usuario) {
    //alert ("comprobarSiSeIntroducenLosDatos");
    
    let error = false;
    mensajeError = "Por favor, introduce: \n";

    alert (usuario.nombre);
    alert (usuario.contra1);
    alert (usuario.contra2);
    alert (usuario.email);

    //alert (mensajeError);

    /*if (usuario.nombre.length == 0) {
        error = true;
        mensajeError += "Nombre \n";
    }
    if (usuario.email.length == 0) {
        error = true;
        mensajeError += "Email \n";
    }
    if (usuario.contra1.length == 0) {
        error = true;
        mensajeError += "Primera contraseña \n";
    }
    if (usuario.contra2.length == 0) {
        error = true;
        mensajeError += "Segunda contraseña \n";
    } 
    
    if (error == false) {
        mensajeError = "";
    }

    return mensajeError;*/
}

function validarNombreUsuario(usuario) {
    let f_nombreUsuario = document.getElementById("nombre").value;
    let regName = /^[A-Za-z]+$/;  //SOLO LETRAS//

    if (!regName.test(usuario.nombre)) {
        //alert ("Nombre no apropiado. Solo se admiten letras");
        return false;
    } else {
        //alert ("Nombre apropiado");
        return true;
    }
}
function validarContra1Usuario(usuario) {
    let f_contra1Usuario = document.getElementById("password").value;
    let regPassword1 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;  //8 CARACTERES. MINIMO 1 MAYUS, 1 MINUS Y 1 NUM//

    if (!regPassword1.test(usuario.contra1)) {
        //alert ("Primera contraseña no apropiada. Debe contener al menos 8 caracteres. Una mayuscula, una minuscula y un numero");
        return false;
    } else {
        //alert ("Primera contraseña apropiada");
        return true;
    }
}
function validarContra2Usuario(usuario) {
    let f_contra2Usuario = document.getElementById("repeatPW").value;
    let regPassword2 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;   //8 CARACTERES. MINIMO 1 MAYUS, 1 MINUS Y 1 NUM//

    if (!regPassword2.test(usuario.contra2)) {
        //alert ("Segunda contraseña no apropiada. Debe contener al menos 8 caracteres. Una mayuscula, una minuscula y un numero");
        return false;
    } else {
        //alert ("Segunda contraseña apropiada");
        return true;
    }
}
function validarEmailUsuario(usuario) {
    let f_emailUsuario = document.getElementById("correo").value;
    let regEmail = /^[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,4}/;  //CARACTERES@CARACTERES.DOMINIO//

    if (!regEmail.test(usuario.email)) {
        //alert ("Email no apropiado. Debe tener este formato: CARACTERES@CARACTERES.DOMINIO");
        return false;
    } else {
        //alert ("Email apropiado");
        return true;
    }
}
function compararContraseñas(usuario) {
    let f_contra1 = document.getElementById("password").value;
    let f_contra2 = document.getElementById("repeatPW").value;

    if (usuario.contra1 != usuario.contra2) {
        //alert ("Las contraseñas no coinciden");
        return false;
    } else {
        //alert ("Las contraseñas coinciden");
        return true;
    }
}

function validarUsuarioCompleto() {
    if (this.validarNombreUsuario()) {
        //alert ("Nombre apropiado");
        if (this.validarContra1Usuario()) {
            //alert ("Primera contraseña apropiada");
            if (this.validarContra2Usuario()) {
                //alert ("Segunda contraseña apropiada");
                if (this.validarEmailUsuario()) {
                    //alert ("Email apropiado");
                    if (this.compararContraseñas() && confirm ("Seguro que lo quieres enviar?")) {
                        alert ("Enviado con éxito");
                        return true;
                    } else {
                        alert ("Las contraseñas no coinciden");
                    }
                } else {
                    alert ("Email no apropiado. Debe tener el siguiente formato: CARACTERES@CARACTERES.DOMINIO");
                }
            } else {
                alert ("Segunda contraseña no apropiada. Debe incluir al menos 8 carcateres. Una mayuscula, una minuscula y un numero");
            }
        } else {
            alert ("Primera contraseña no apropiada. Debe incluir al menos 8 caracteres. Una mayuscula, una minuscula y un numero");
        }
    } else {
        alert ("Nombre no apropiado. Solo se admiten letras");
    }
}

/*function validarDatosIntroducidos() {
    alert ("validarDatosIntroducidos");

    if (validarUsuarioCompleto() == true) {
        alert ("validarUsuarioCompleto TRUE");
        return true;
    } else {
        alert ("validarUsuarioCompleto FALSE");
        return false;
    }
}*/
