window.addEventListener("load", inicio);

function inicio() {
    document.getElementById("mostrar").addEventListener("click", alternarTexto);
}

function alternarTexto() {
    let textoAñadir = "De esta manera, buscamos promover la solidaridad y la economía circular. Te invitamos a colaborar con este proyecto e impulsar la sostenibilidad en la sociedad";
    let clase = document.getElementById("mostrar").className;

    if (clase == "ocultado") {
        document.getElementById("textoOculto").innerHTML = textoAñadir;
        document.getElementById("textoOculto").style.visibility = "visible";
        document.getElementById("mostrar").value = "Mostrar menos";
        document.getElementById("mostrar").classList.remove("ocultado");
        document.getElementById("mostrar").classList.add("mostrado");
        document.getElementById("mostrar").style.display = "inline";
    }
    if (clase == "mostrado") {
        document.getElementById("textoOculto").innerHTML = "";
        document.getElementById("mostrar").value = "Mostrar mas";
        document.getElementById("mostrar").classList.remove("mostrado");
        document.getElementById("mostrar").classList.add("ocultado");
    }
}
