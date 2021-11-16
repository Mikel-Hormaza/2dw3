window.addEventListener("load", inicio);

function inicio() {
    anadirEventoClickABotones();
}

function anadirEventoClickABotones() {
    document.querySelector(".botonesOpcionesFormulario button").addEventListener("click", comprobacionesYSubmit);
}

function comprobacionesYSubmit(){
   //if (validarDatos()){
        document.getElementById("formulario").submit();
  // }
}

function validarDatos() {
    /*comprueba el largo del mensaje de error para saber si se han rellenado todos los campos
    Si no hay errores, comprueba si se ha introduido imagen. 
    Si ésta devuelve true realiza las comprobaciones contra la BD antes de la insert*/
    if (comprobarSiSeHanIntroducidoTodosLosDatosEscritos(crearObjetoManual()).length > 1) {
        alert(comprobarSiSeHanIntroducidoTodosLosDatosEscritos(crearObjetoManual()));
        return false;
    } else {
        comprobarFoto();
    }
}

function comprobarFoto(){

    

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

function comprobarSiSeHanIntroducidoTodosLosDatosEscritos(manual) {
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
    /*si todos los campos se han rellenado, eliminar el mensaje de error */
    if (error == false) {
        mensajeErrorFaltanDatos = "";
    }
    return mensajeErrorFaltanDatos;
}

function comprobarSiSeHaIntroducidoUnaImagen(manual){
    if (manual.fotoManual.length == 0) {
        return "Por favor, introduzca una imagen para el manual \n";
    }else{
        return"";
    }
}
