//import {validarNombreUsuario, validarContra1Usuario, validarContra2Usuario, validarEmailUsuario, compararContraseñas, validarUsuarioCompleto} from "./Usuario";

window.addEventListener("load", inicio);

function inicio() {
    document.getElementById("registrarse").addEventListener("click", comprobacionesSubmit);
}

function comprobacionesSubmit() {
    if (validarDatos() == true) {
        alert ("validarDatos OK");
        document.getElementById("form").submit();
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
    //alert (mensajeError);

    if (usuario.nombre.length == 0) {
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

    return mensajeError;
}

/*function validarDatosIntroducidos() {
    //alert ("validarDatosIntroducidos");

    if (usuario.validarUsuarioCompleto() == true) {
        return true;
    } else {
        return false;
    }
}*/
