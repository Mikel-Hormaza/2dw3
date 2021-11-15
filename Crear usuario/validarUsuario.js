window.addEventListener("load", inicio);
 
function inicio() {
    document.getElementById("registrarse").addEventListener("click", comprobacionesSubmit);
}
 
function comprobacionesSubmit() {
    if (validarDatos() == true) {
        // alert ("PREPARADO PARA INSERT");
        document.getElementById("form").submit();
    } else {
        alert ("Error de comprobaciones y submit");
    }
}

function validarDatos() {
    // alert ("validarDatos");

    if (comprobarSiSeIntroducenLosDatos(crearObjetoUsuario()).length > 1) {
        alert (comprobarSiSeIntroducenLosDatos(crearObjetoUsuario()));
        return false;
    } else {
        // alert ("DatosOK");
        if (todasLasValidaciones(crearObjetoUsuario()) == true) {
            return true;
        }
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

function todasLasValidaciones(usuario){
    //alert ("usuario: "+usuario);
    OK = true;

    // alert ("HELDUTA");

    if(!usuario.validarNombreUsuario()){
        alert ("Nombre no apropiado. Solo se admiten letras");
        OK= false;
    }
    if (!usuario.validarContra1Usuario()) {
        alert ("Primera contraseña no apropiada. Debe contener al menos 8 caracteres. Una mayuscula, una minuscula y un numero");
        OK = false;
    }
    if (!usuario.validarContra2Usuario()) {
        alert ("Segunda contraseña no apropiada. Debe contener al menos 8 caracteres. Una mayuscula, una minuscula y un numero");
        OK = false;
    }
    if (!usuario.validarEmailUsuario()) {
        alert ("Email no apropiado. Debe tener este formato: CARACTERES@CARACTERES.DOMINIO");
        OK = false;
    }
    if (!usuario.compararContraseñas()) {
        alert ("Las contraseñas no coinciden");
        OK = false;
    }
    return OK;
}
 
function validarNombreUsuario() {
    if(crearObjetoUsuario().validarNombreUsuario()){
        //alert ("Nombre apropiado");
    }else{
        //alert ("Nombre inapropiado");
    }
}
function validarContra1Usuario() {
    if (crearObjetoUsuario().validarContra1Usuario()) {
        // alert ("Contra1 apropiado");
    } else {
        // alert ("Contra2 inapropiado");
    }
}
function validarContra2Usuario() {
    if (crearObjetoUsuario().validarContra2Usuario()) {
        // alert ("Contra2 apropiado");
    } else {
        // alert ("Contra2 inapropiado");
    }
}
function validarEmailUsuario() {
    if (crearObjetoUsuario().validarEmailUsuario()) {
        // alert ("Email apropiado");
    } else {
        // alert ("Email inapropiado");
    }
}
function compararContraseñas() {
    if (crearObjetoUsuario().compararContraseñas()) {
        // alert ("Contras Iguales");
    } else {
        // alert ("Contras distintas");
    }
}
