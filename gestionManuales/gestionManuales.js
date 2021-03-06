window.addEventListener("load", inicio);

function inicio() {
    document.getElementById("idBotonDesplegar").addEventListener("click", desplegable1);
    document.getElementById("categoria").addEventListener("click", desplegable2);
    document.getElementById("idBotonCategoria").addEventListener("click", desplegable3);
    botonesInicioFinal();
    contarManuales();
}

function contarManuales() {
    let countManuales = document.getElementById("listaManuales").childElementCount;
    if (countManuales > 0) {
        anadirFuncionClickACadaManual(countManuales)
    }
}

function anadirFuncionClickACadaManual(count) {
    for (i = 1; i <= count; i++) {
        document.querySelector(".manual" + i + " button").addEventListener("click", editarOEliminarManualSeleccionado);
        document.querySelector(".manual" + i + " button:nth-child(2)").addEventListener("click", editarOEliminarManualSeleccionado);
    }
}

function editarOEliminarManualSeleccionado() {
    /*el manual seleccionado */
    let boton = event.currentTarget;
    let divDondeSeEncuentraElBoton = boton.parentElement;
    /*código del manual */
    let codManual = divDondeSeEncuentraElBoton.id;
    /*texto del boton (editar o eliminar) */
    let textoBoton = boton.childNodes[1].textContent;

    if (textoBoton == "editar") {
        enviarOpcionEditar(boton, divDondeSeEncuentraElBoton, codManual);
    } else {
        let respuestaEliminar = prompt("¿Quieres eliminar el manual? S/N");
        if (respuestaEliminar == "S" || respuestaEliminar == "s" || respuestaEliminar == "Si" || respuestaEliminar == "Sí" || respuestaEliminar == "sí" || respuestaEliminar == "si") {
            enviarOpcionEliminar(boton, divDondeSeEncuentraElBoton, codManual);
        }
    }
}

function enviarOpcionEliminar(boton, divDondeSeEncuentraElBoton, codManual) {
    /* creo un formulario con dos inputs, uno para guardar "eliminar" o "editar" y otro para el "codManual" */
    let formularioQueMandaElCodDeManual = document.createElement("form");
    let inputEditarOEliminar = document.createElement("input");
    let inputCodManual = document.createElement("input");

    /*propiedades y atributos de los nuevos elementos*/
    formularioQueMandaElCodDeManual.setAttribute("id", "formularioQueMandaElCodDeManual");
    formularioQueMandaElCodDeManual.setAttribute("method", "post");
    formularioQueMandaElCodDeManual.setAttribute("action", "../datosManual/validarDatosManual.php"); //validarDatosManual.php
    inputEditarOEliminar.setAttribute("name", "editarOEliminar");
    inputCodManual.setAttribute("name", "codManual");
    inputEditarOEliminar.setAttribute("value", "eliminar"); //VALOR ELIMINAR
    //expresión regular que elimina "paso" y me quedo con los números, que son el cod del paso en la BD
    inputCodManual.setAttribute("value", codManual.replace(/\D/g, ''));

    /* uno los elementos y lo envío a PHP haciendo submit */
    formularioQueMandaElCodDeManual.appendChild(inputEditarOEliminar);
    formularioQueMandaElCodDeManual.appendChild(inputCodManual);
    formularioQueMandaElCodDeManual.appendChild(boton);
    divDondeSeEncuentraElBoton.appendChild(formularioQueMandaElCodDeManual);
    formularioQueMandaElCodDeManual.submit();
}

function enviarOpcionEditar(boton, divDondeSeEncuentraElBoton, codManual) {
    /* creo un formulario con dos inputs, uno para guardar "eliminar" o "editar" y otro para el "codManual" */
    let formularioQueMandaElCodDeManual = document.createElement("form");
    let inputEditarOEliminar = document.createElement("input");
    let inputCodManual = document.createElement("input");

    /*propiedades y atributos de los nuevos elementos*/
    formularioQueMandaElCodDeManual.setAttribute("id", "formularioQueMandaElCodDeManual");
    formularioQueMandaElCodDeManual.setAttribute("method", "post");
    formularioQueMandaElCodDeManual.setAttribute("action", "../datosManual/datosManual.php"); //datosManual.php
    inputEditarOEliminar.setAttribute("name", "editarOEliminar");
    inputCodManual.setAttribute("name", "codManual");
    inputEditarOEliminar.setAttribute("value", "editar"); //VALOR EDITAR
    //expresión regular que elimina "paso" y me quedo con los números, que son el cod del paso en la BD
    inputCodManual.setAttribute("value", codManual.replace(/\D/g, ''));

    /* uno los elementos y lo envío a PHP haciendo submit */
    formularioQueMandaElCodDeManual.appendChild(inputEditarOEliminar);
    formularioQueMandaElCodDeManual.appendChild(inputCodManual);
    formularioQueMandaElCodDeManual.appendChild(boton);
    divDondeSeEncuentraElBoton.appendChild(formularioQueMandaElCodDeManual);
    formularioQueMandaElCodDeManual.submit();
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