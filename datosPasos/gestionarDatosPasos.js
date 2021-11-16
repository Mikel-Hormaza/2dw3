window.addEventListener("load", inicio);

hayUnElementoSeleccionado = false;
mensajeErrorFaltanDatos = "";

function inicio() {
    anadirEventoClickABotones();
    comprobarNumeroDePasos();
}

function anadirEventoClickABotones() {
    document.getElementById("idBotoncrearPaso").addEventListener("click", comprobacionesYSubmit);
    document.getElementById("botonEliminarPaso").addEventListener("click", eliminar);
}

/* comprobar el número de pasos del manual para saber si tiene pasos
si los tiene, añadir el evento click a cada paso */
function comprobarNumeroDePasos() {
    let countPasos = document.getElementById("idDivPasos").childElementCount;
    if (countPasos > 0) {
        anadirMostrarContenidoPasoACadaPaso(countPasos);
    }
}

/* añadir el evento click a cada paso */
function anadirMostrarContenidoPasoACadaPaso(count) {
    for (i = 1; i <= count; i++) {
        document.querySelector(".paso" + i).addEventListener("click", pasoSeleccionado);
    }
}

/* guardar el paso clicado y activar boton eliminar*/
function pasoSeleccionado() {
    let paso = event.currentTarget;
    mostrarTituloYDescripcionDelPaso(paso);
    hayUnElementoSeleccionado = true;
    añadirValorCodPasoAlFormulario(paso);
}

function eliminar() {
    if (hayUnElementoSeleccionado) {
        let respuestaAEliminar = prompt("¿Seguro que desea eliminar el paso? S/N");
        if (respuestaAEliminar == "S" || respuestaAEliminar == "s" || respuestaAEliminar == "Si" || respuestaAEliminar == "Sí" || respuestaAEliminar == "sí" || respuestaAEliminar == "si") {
            let eliminarPaso = document.getElementById("eliminarPaso");
            eliminarPaso.setAttribute("value", "eliminar");
            document.getElementById("formulario").submit();
        }
    } else {
        alert("Por favor, seleccione un paso");
    }
}

function mostrarTituloYDescripcionDelPaso(paso) {
    let descripcionPaso = document.getElementById("idDescripcionPaso");
    let elementoTituloPaso = document.getElementById("idNombrePaso");
    let tituloPaso = document.querySelector("#" + paso.id + " div p").textContent;
    descripcionPaso.value = paso.childNodes[5].textContent;
    elementoTituloPaso.value = tituloPaso;
}

function añadirValorCodPasoAlFormulario(paso) {
    //expresión regular que elimina "paso" y me quedo con los números, que son el cod del paso en la BD
    let codigoDePasoEnLaBD = paso.id.replace(/\D/g, '');
    let inputPasoSeleccionado = document.getElementById("inputPasoSeleccionado");
    inputPasoSeleccionado.setAttribute("value", codigoDePasoEnLaBD);
}

function comprobacionesYSubmit() {
    if (hayUnElementoSeleccionado) {
        if (validarDatosEditarPaso()) {
            document.getElementById("formulario").submit();
        }
    } else {
        if (validarDatosCrearPaso()) {
            document.getElementById("formulario").submit();
        }
    }

}

function validarDatosEditarPaso() {
    if (comprobarSiSeHanIntroducidoTodosLosDatos(crearObjetoPaso()).length == 0) {
        return true;
    }
}

function validarDatosCrearPaso() {
    /*comprueba el largo del mensaje de error para saber si se han rellenado todos los campos*/
    if (comprobarSiSeHanIntroducidoTodosLosDatos(crearObjetoPaso()).length == 0) {
        if (comprobarSiSeHaIntroducidoUnaImagen(crearObjetoPaso()).length == 0) {
            if (crearObjetoPaso().validarFotoPaso()) {
                return true;
            } else {
                alert("error en el formato imagen. la imagen debe ser: .jpg|\.jpeg|\.png");
                return false;
            }
        } else {
            alert(comprobarSiSeHaIntroducidoUnaImagen(crearObjetoPaso()));
            return false;
        }
    } else {
        alert(comprobarSiSeHanIntroducidoTodosLosDatos(crearObjetoPaso()));
        return false;
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

/* comprueba si se han introducido los datos. Devuelve un string con los atributos que faltan
si todos los atributos se han introducido, devuele un string "" */
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
    /*si todos los campos se han rellenado, eliminar el mensaje de error */
    if (error == false) {
        mensajeErrorFaltanDatos = "";
    }
    return mensajeErrorFaltanDatos;
}

function comprobarSiSeHaIntroducidoUnaImagen(paso) {
    if (paso.fotoPaso.length == 0) {
        return "Por favor introduce una imagen";
    } else {
        return "";
    }
}