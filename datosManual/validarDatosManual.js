<<<<<<< HEAD:datosManual/validarDatosManual.js
window.addEventListener("load", inicio);

function inicio() {
    anadirEventoClickABotones();
}

function anadirEventoClickABotones() {
    document.querySelector(".botonesOpcionesFormulario button").addEventListener("click", comprobacionesYSubmit);
}

function comprobacionesYSubmit(){
    if (validarDatos()){
        document.getElementById("formulario").submit();
    }
}

function validarDatos() {
    /*comprueba el largo del mensaje de error para saber si se han rellenado todos los campos*/
    if (comprobarSiSeHanIntroducidoTodosLosDatos(crearObjetoManual()).length > 1) {
        alert(comprobarSiSeHanIntroducidoTodosLosDatos(crearObjetoManual()));
        return false;
    } else {
        if(crearObjetoManual().validarFotoManual()){
            return true;
        }else{
            alert("error formato imagen. la imagen debe ser: .jpg|\.jpeg|\.png");
            return false;
        }
    }
}

function crearObjetoManual() {
    let v_tituloManual = document.getElementById("idNombreManual").value;
    let v_descripcionManual = document.getElementById("idDescripcionManual").value;
    let v_equipoNecesario = document.getElementById("idHerramientasNecesarias").value;
    let v_medidasDeSeguridad = document.getElementById("idMedidasSeguridad").value;
    let v_fotoManual = document.getElementById("classInputFileIMG1").value.replace(/^.*\\/, "");
    //la expresión regular elimina la "ruta fakepath" y devuelve el nombre del archivo más su extensión

    let manual1 = new Manual(v_tituloManual,
        v_descripcionManual,
        v_equipoNecesario,
        v_medidasDeSeguridad,
        v_fotoManual);
    return manual1;
}

function comprobarSiSeHanIntroducidoTodosLosDatos(manual) {
    let error = false;
    mensajeErrorFaltanDatos = "Por favor, introduzca: \n"; 
    if (manual.tituloManual.length == 0) {
        error = true;
        mensajeErrorFaltanDatos += "el título \n";
    }
    if (manual.descripcionManual.length == 0) {
        error = true;
        mensajeErrorFaltanDatos += "la descripción \n";
    }
    if (manual.equipoNecesario.length == 0) {
        error = true;
        mensajeErrorFaltanDatos += "el equipo o herramientas necesarias \n";
    }
    if (manual.medidasDeSeguridad.length == 0) {
        error = true;
        mensajeErrorFaltanDatos += "medidas de seguridad necesarias \n";
    }
    if (manual.fotoManual.length == 0) {
        error = true;
        mensajeErrorFaltanDatos += "una imagen para el manual \n";
    }
    /*si todos los campos se han rellenado, eliminar el mensaje de error */
    if (error == false) {
        mensajeErrorFaltanDatos = "";
    }
    return mensajeErrorFaltanDatos;
}

=======
window.addEventListener("load", inicio);

function inicio() {
    anadirEventoClickABotones();
}

function anadirEventoClickABotones() {
    document.querySelector(".botonesOpcionesFormulario button").addEventListener("click", comprobacionesYSubmit);
}

function comprobacionesYSubmit(){
    if (validarDatos()){
        document.getElementById("formulario").submit();
    }else{
        alert("ERROR en comprobacionesYSubmit");
    }
}

function validarDatos() {
    /*comprueba el largo del mensaje de error para saber si se han rellenado todos los campos*/
    if (comprobarSiSeHanIntroducidoTodosLosDatos(crearObjetoManual()).length > 1) {
        alert(comprobarSiSeHanIntroducidoTodosLosDatos(crearObjetoManual()));
        return false;
    } else {
        if(crearObjetoManual().validarFotoManual()){
            return true;
        }else{
            alert("error formato imagen. la imagen debe ser: .jpg|\.jpeg|\.png");
            return false;
        }
    }
}

function crearObjetoManual() {
    let v_tituloManual = document.getElementById("idNombreManual").value;
    let v_descripcionManual = document.getElementById("idDescripcionManual").value;
    let v_equipoNecesario = document.getElementById("idHerramientasNecesarias").value;
    let v_medidasDeSeguridad = document.getElementById("idMedidasSeguridad").value;
    let v_fotoManual = document.getElementById("classInputFileIMG1").value.replace(/^.*\\/, "");
    //la expresión regular elimina la "ruta fakepath" y devuelve el nombre del archivo más su extensión

    let manual1 = new Manual(v_tituloManual,
        v_descripcionManual,
        v_equipoNecesario,
        v_medidasDeSeguridad,
        v_fotoManual);
    return manual1;
}

function comprobarSiSeHanIntroducidoTodosLosDatos(manual) {
    let error = false;
    mensajeErrorFaltanDatos = "Por favor, introduzca: \n"; 
    if (manual.tituloManual.length == 0) {
        error = true;
        mensajeErrorFaltanDatos += "el título \n";
    }
    if (manual.descripcionManual.length == 0) {
        error = true;
        mensajeErrorFaltanDatos += "la descripción \n";
    }
    if (manual.equipoNecesario.length == 0) {
        error = true;
        mensajeErrorFaltanDatos += "el equipo o herramientas necesarias \n";
    }
    if (manual.medidasDeSeguridad.length == 0) {
        error = true;
        mensajeErrorFaltanDatos += "medidas de seguridad necesarias \n";
    }
    if (manual.fotoManual.length == 0) {
        error = true;
        mensajeErrorFaltanDatos += "una imagen para el manual \n";
    }
    /*si todos los campos se han rellenado, eliminar el mensaje de error */
    if (error == false) {
        mensajeErrorFaltanDatos = "";
    }
    return mensajeErrorFaltanDatos;
}

>>>>>>> 752454b7ff63fbca6c072fda8cc9a86b634fa77b:creacionManual/2datosManual/validarDatosManual.js
