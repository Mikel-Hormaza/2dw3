window.addEventListener("load", inicio);

function inicio() {
    document.getElementById("mostrar").addEventListener("click", mostrarMas);
}

function mostrarMas() {
        let textoAñadir = "De esta manera, buscamos promover la solidaridad y la economía circular. Te invitamos a colaborar con este proyecto e impulsar la sostenibilidad en la sociedad"
        
        document.getElementById("textoOculto").innerHTML = textoAñadir;
        document.getElementById("textoOculto").style.visibility = "visible";
        document.getElementById("mostrar").value = "Mostrar menos";
        document.getElementById("mostrar").addEventListener("click", mostrarMenos);
}

function mostrarMenos() {
    let textoAñadir = "De esta manera, ponemos a disposición pública las herramientas reparadas. Invitamos a todo el que quiera a que se acerce a nuestro centro y ayudarnos a llevar adelante nuestro proyecto."
    
    document.getElementById("textoOculto").innerHTML = "";
    document.getElementById("mostrar").value = "Mostrar mas";
    document.getElementById("mostrar").addEventListener("click", mostrarMas);
}



/* function mostrarMas2() {
    let textoAñadir = "De esta manera, buscamos promover la solidaridad y la economía circular. Te invitamos a colaborar con este proyecto e impulsar la sostenibilidad en la sociedad"
    
    document.getElementById("textoOculto").innerHTML = textoAñadir;
    document.getElementById("textoOculto").style.visibility = "visible";
    document.getElementById("mostrar").value = "Mostrar menos";
    document.getElementById("mostrar").addEventListener("click", mostrarMenos2);
}

function mostrarMenos2() {
    // let textoAñadir = "De esta manera, ponemos a disposición pública las herramientas reparadas. Invitamos a todo el que quiera a que se acerce a nuestro centro y ayudarnos a llevar adelante nuestro proyecto."
    
    document.getElementById("textoOculto").innerHTML = "";
    document.getElementById("mostrar").value = "Mostrar mas";
    document.getElementById("mostrar").addEventListener("click", mostrarMas);
} */
