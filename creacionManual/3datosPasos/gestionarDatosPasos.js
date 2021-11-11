window.addEventListener("load", inicio);

function inicio() {
    anadirEventoClickABotones();
}

function anadirEventoClickABotones() {
    document.getElementById("idBotoncrearPaso").addEventListener("click", comprobacionesYSubmit);
}

function comprobacionesYSubmit(){
    if (validarDatos()){
        document.getElementById("formulario").submit();
    }
}

function validarDatos() {
    /*comprueba el largo del mensaje de error para saber si se han rellenado todos los campos*/
    if (comprobarSiSeHanIntroducidoTodosLosDatos(crearObjetoPaso()).length > 1) {
        alert(comprobarSiSeHanIntroducidoTodosLosDatos(crearObjetoPaso()));
        return false;
    } else {
        if(crearObjetoPaso().validarFotoPaso()){
            return true;
        }else{
            alert("error en el formato imagen. la imagen debe ser: .jpg|\.jpeg|\.png");
            return false;
        }
    }
}

function crearObjetoPaso() {
    let v_tituloPaso = document.getElementById("idNombrePaso").value;
    let v_descripcionPaso = document.getElementById("idDescripcionPaso").value;
    let v_fotoPaso = document.getElementById("classInputFileIMG").value.replace(/^.*\\/, "");
    //la expresión regular elimina la "ruta fakepath" y devuelve el nombre del archivo más su extensión

    let paso1 = new Paso(v_tituloPaso,
        v_descripcionPaso,
        v_fotoPaso);
    return paso1;
}

function comprobarSiSeHanIntroducidoTodosLosDatos(paso) {
    let error = false;
    mensajeErrorFaltanDatos = "Por favor, introduzca: \n"; 
    if (paso.tituloPaso.length == 0) {
        error = true;
        mensajeErrorFaltanDatos += "el título \n";
    }
    if (paso.descripcionPaso.length == 0) {
        error = true;
        mensajeErrorFaltanDatos += "la descripción \n";
    }
    if (paso.fotoPaso.length == 0) {
        error = true;
        mensajeErrorFaltanDatos += "una imagen para el paso \n";
    }
    /*si todos los campos se han rellenado, eliminar el mensaje de error */
    if (error == false) {
        mensajeErrorFaltanDatos = "";
    }
    return mensajeErrorFaltanDatos;
}

