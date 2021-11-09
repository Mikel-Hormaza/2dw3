window.addEventListener("load", inicio);

function inicio() {
    document.getElementById("idBotonDesplegar").addEventListener("click", desplegable1);
    document.getElementById("categoria").addEventListener("click", desplegable2);
    document.getElementById("idBotonCategoria").addEventListener("click", desplegable3);
    botonesInicioFinal();
}

/* leer las variables se encuentran en el innertext del span*/
function botonesInicioFinal() {
    let arrayDatosPHP = document.getElementById("spanBotonesInicioFinal").innerText.split(",");
    let codigoDelPrimerManualDeLaTabla = parseInt(arrayDatosPHP[0]);
    let codigoDelPrimerManualDeLaTablaMostrado = parseInt(arrayDatosPHP[1]);
    let codigoDelUltimoManualDeLaTablaMostrado = parseInt(arrayDatosPHP[2]);
    let codigoDelUltimoManualDeLaTabla =parseInt(arrayDatosPHP[3]);
    mostrarOcultarBotonesInicioFinal(codigoDelPrimerManualDeLaTabla, codigoDelPrimerManualDeLaTablaMostrado, codigoDelUltimoManualDeLaTablaMostrado, codigoDelUltimoManualDeLaTabla);
}
/* en función de las variables leídas, deshabilitar botones inutilizables */
function mostrarOcultarBotonesInicioFinal(codigoDelPrimerManualDeLaTabla, codigoDelPrimerManualDeLaTablaMostrado, codigoDelUltimoManualDeLaTablaMostrado, codigoDelUltimoManualDeLaTabla) {
    if (codigoDelPrimerManualDeLaTabla==codigoDelPrimerManualDeLaTablaMostrado) {
        let botonInicio = document.getElementById("primero");
        let botonAnterior = document.getElementById("anterior");
        deshabilitarBoton(botonInicio);
        deshabilitarBoton(botonAnterior);
    }
    if (codigoDelUltimoManualDeLaTablaMostrado==codigoDelUltimoManualDeLaTabla) {
        let botonSiguiente = document.getElementById("siguiente");
        let botonUltimo = document.getElementById("ultimo");
        deshabilitarBoton(botonSiguiente);
        deshabilitarBoton(botonUltimo);
    }
}

function deshabilitarBoton(boton) {
    boton.type = "button";
    boton.style.backgroundColor = "#626267";
    boton.style.cursor = "context-menu";
    boton.style.opacity="0.4";
}

function desplegable1() {
    comprobarSiElBloqueTieneClaseMostrar("idBloqueDesplegar");
}

function desplegable2() {
    comprobarSiElBloqueTieneClaseMostrar("idBotonCategoria");
}

function desplegable3() {
    comprobarSiElBloqueTieneClaseMostrar("idContenidoCategoria");
}

/*Si divPlegable True-llamar a ocultar
ELSE llamar a mostrar*/
function comprobarSiElBloqueTieneClaseMostrar(idBloque) {
    let divPlegable;
    if (idBloque == "idBloqueDesplegar") {
        divPlegable = document.getElementById(idBloque).classList.contains("mostrarDesplegarOpciones");
    } else if (idBloque == "idBotonCategoria") {
        divPlegable = document.getElementById(idBloque).classList.contains("mostrarBotonCategoria");
    } else if (idBloque == "idContenidoCategoria") {
        divPlegable = document.getElementById(idBloque).classList.contains("mostrarDesplegarCategorias");
    }
    if (divPlegable) {
        ocultarBloque(idBloque);
    } else {
        mostrarBloque(idBloque);
    }
}

/*La primer vez que mostremos un bloque éste no tiene clase "ocultar",
para comprobar si hace falta quitarlo llamamos a comprobarSiElBloqueTieneClaseOcultar */
function mostrarBloque(idBloque) {
    comprobarSiElBloqueTieneClaseOcultar(idBloque);
    if (idBloque == "idBloqueDesplegar") {
        document.getElementById(idBloque).classList.add("mostrarDesplegarOpciones");
    } else if (idBloque == "idBotonCategoria") {
        document.getElementById(idBloque).classList.add("mostrarBotonCategoria");
    } else if (idBloque == "idContenidoCategoria") {
        document.getElementById(idBloque).classList.add("mostrarDesplegarCategorias");
    }
}

/*Quitar la clase "mostrar" y añadir ocultar*/
function ocultarBloque(idBloque) {
    if (idBloque == "idBloqueDesplegar") {
        document.getElementById(idBloque).classList.remove("mostrarDesplegarOpciones");
        document.getElementById(idBloque).classList.add("ocultarDesplegarOpciones");
    } else if (idBloque == "idBotonCategoria") {
        document.getElementById(idBloque).classList.remove("mostrarBotonCategoria");
        document.getElementById(idBloque).classList.add("ocultarDesplegarCategorias");
    } else if (idBloque == "idContenidoCategoria") {
        document.getElementById(idBloque).classList.remove("mostrarDesplegarCategorias");
        document.getElementById(idBloque).classList.add("ocultarBotonCategoria");
    }
}
/*Si un elemento tiene la clase ocultar, quitársela*/
function comprobarSiElBloqueTieneClaseOcultar(idBloque) {
    if (idBloque == "idBloqueDesplegar") {
        if (document.getElementById(idBloque).classList.contains("ocultarDesplegarOpciones")) {
            document.getElementById(idBloque).classList.remove("ocultarDesplegarOpciones");
        }
    } else if (idBloque == "idBotonCategoria") {
        if (document.getElementById(idBloque).classList.contains("ocultarDesplegarCategorias")) {
            document.getElementById(idBloque).classList.remove("ocultarDesplegarCategorias");
        }
    } else if (idBloque == "idContenidoCategoria") {
        if (document.getElementById(idBloque).classList.contains("ocultarBotonCategoria")) {
            document.getElementById(idBloque).classList.remove("ocultarBotonCategoria");
        }
    }
}