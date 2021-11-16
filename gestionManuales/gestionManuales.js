window.addEventListener("load", inicio);

function inicio() {
    document.getElementById("idBotonDesplegar").addEventListener("click", desplegarOpcionesDeFiltrado);
    document.getElementById("categoria").addEventListener("click", desplegarCategorías);
    botonesInicioFinal();
    contarManuales();
}

/*PARCHE si hay un único manual */
function contarManuales() {
    let countManuales = document.getElementById("listaManuales").childElementCount;
    if (countManuales > 0) {
        anadirFuncionClickACadaManual(countManuales)
    }
}

function anadirFuncionClickACadaManual(count) {
    for (i = 1; i <= count; i++) {
        document.querySelector(".manual" + i + " button").addEventListener("click", manualSeleccionado);
        document.querySelector(".manual" + i + " button:nth-child(2)").addEventListener("click", manualSeleccionado);
    }
}

function manualSeleccionado() {
    /*el manual seleccionado */
    let boton = event.currentTarget;
    let divDondeSeEncuentraElBoton = boton.parentElement;
    /*código del manual */
    let codManual = divDondeSeEncuentraElBoton.id;
    /*texto del boton */
    let textoBoton = boton.childNodes[1].textContent;

    if (textoBoton == "editar") {
       // let respuestaEditar = prompt("¿Quieres editar el manual? S/N");
        let formularioQueMandaElCodDeManual = document.createElement("form");
        let inputEditarOEliminar = document.createElement("input");
        let inputCodManual = document.createElement("input");

        formularioQueMandaElCodDeManual.setAttribute("id", "formularioQueMandaElCodDeManual");
        formularioQueMandaElCodDeManual.setAttribute("method", "post");
        formularioQueMandaElCodDeManual.setAttribute("action", "../datosManual/datosManual.php");
        inputEditarOEliminar.setAttribute("name", "editarOEliminar");
        inputCodManual.setAttribute("name", "codManual");
        inputEditarOEliminar.setAttribute("value", "editar");
        //expresión regular que elimina "paso" y me quedo con los números, que son el cod del paso en la BD
        inputCodManual.setAttribute("value", codManual.replace(/\D/g, ''));
        
        formularioQueMandaElCodDeManual.appendChild(inputEditarOEliminar);
        formularioQueMandaElCodDeManual.appendChild(inputCodManual);
        formularioQueMandaElCodDeManual.appendChild(boton);
        divDondeSeEncuentraElBoton.appendChild(formularioQueMandaElCodDeManual);
        formularioQueMandaElCodDeManual.submit();



    } else {
        let respuestaEliminar = prompt("¿Quieres eliminar el manual? S/N");
    }
    

}

/* leer las variables se encuentran en el innertext del span*/
function botonesInicioFinal() {

    let arrayDatosPHP = document.getElementById("spanBotonesInicioFinal").innerText.split(",");
    let codigoDelPrimerManualDeLaTabla = parseInt(arrayDatosPHP[0]);
    let codigoDelPrimerManualDeLaTablaMostrado = parseInt(arrayDatosPHP[1]);
    let codigoDelUltimoManualDeLaTablaMostrado = parseInt(arrayDatosPHP[2]);
    let codigoDelUltimoManualDeLaTabla = parseInt(arrayDatosPHP[3]);
    mostrarOcultarBotonesInicioFinal(codigoDelPrimerManualDeLaTabla, codigoDelPrimerManualDeLaTablaMostrado, codigoDelUltimoManualDeLaTablaMostrado, codigoDelUltimoManualDeLaTabla);
}
/* en función de las variables leídas, deshabilitar botones inutilizables */
function mostrarOcultarBotonesInicioFinal(codigoDelPrimerManualDeLaTabla, codigoDelPrimerManualDeLaTablaMostrado, codigoDelUltimoManualDeLaTablaMostrado, codigoDelUltimoManualDeLaTabla) {
    if (codigoDelPrimerManualDeLaTabla == codigoDelPrimerManualDeLaTablaMostrado) {
        let botonInicio = document.getElementById("primero");
        let botonAnterior = document.getElementById("anterior");
        deshabilitarBoton(botonInicio);
        deshabilitarBoton(botonAnterior);
    }
    if (codigoDelUltimoManualDeLaTablaMostrado == codigoDelUltimoManualDeLaTabla) {
        let botonSiguiente = document.getElementById("siguiente");
        let botonUltimo = document.getElementById("ultimo");
        deshabilitarBoton(botonSiguiente);
        deshabilitarBoton(botonUltimo);
    }
}

/*Deshabilitamos el botón. Importante: el botón pasa a ser type button y no submit para no enviar el formulario*/
function deshabilitarBoton(boton) {
    boton.type = "button";
    boton.style.backgroundColor = "#626267";
    boton.style.cursor = "context-menu";
    boton.style.opacity = "0.4";
}

function desplegarOpcionesDeFiltrado() {
    comprobarSiElBloqueTieneClaseMostrar("idBloqueDesplegar");
}

function desplegarCategorías() {
    comprobarSiElBloqueTieneClaseMostrar("idContenidoCategoria");
}

function comprobarSiElBloqueTieneClaseMostrar(idBloque) {
    let divPlegable;
    if (idBloque == "idBloqueDesplegar") {
        divPlegable = document.getElementById(idBloque).classList.contains("mostrarDesplegarOpciones");
    } else if (idBloque == "idContenidoCategoria") {
        divPlegable = document.getElementById(idBloque).classList.contains("mostrarDesplegarCategorias");
    }
    if (divPlegable) {
        /* si el bloque seleccionado es idBloqueDesplegar al ocultarlo es necesario que oculte también las categorías */
        if (idBloque == "idBloqueDesplegar") {
            ocultarBloque("idBloqueDesplegar");
            ocultarBloque("idContenidoCategoria");
        } else {
            ocultarBloque(idBloque);
        }

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