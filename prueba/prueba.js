//declaro el array

let arrayOpciones = ["uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve", "diez"];

window.addEventListener("load", inicio);



function inicio() {
    //después de meter cada caracter
    document.getElementById("idBusquedaNombreHerramienta").addEventListener("keyup", comprobarSiHayElementos);
}

function filtra() {
    let elementoCoincide;
    let parrafo;
    if (document.getElementById("idBusquedaNombreHerramienta").value.length > 0) {
        //recorro el array y si algún string CONTIENE el texto, lo muestro
        for (i = 0; i < arrayOpciones.length; i++) {
            if (arrayOpciones[i].includes(document.getElementById("idBusquedaNombreHerramienta").value)) {
                let elementoLista = elementoCoincide += i;
                let p = parrafo += i;
                //elemento de lista
                elementoLista = document.createElement("li");
                elementoLista.setAttribute("class", "elementoLista");
                //parrafo del elemento de lista
                p = document.createElement("p");
                p.setAttribute("class", "parrafoElementoLista");
                p = document.createTextNode(arrayOpciones[i]);
                elementoLista.appendChild(p);
                document.getElementById("mostrarBloqueResultados").appendChild(elementoLista);
            }
        }
    }
}

function comprobarSiHayElementos() {
    let elementosLista = document.getElementById("mostrarBloqueResultados").childElementCount;
    if (elementosLista > 0) {
        alert("HAYQUEelimunar");
        eliminarElementosBusquedaPrevia();
        //filtra();
    } else {
        filtra();
    }
}

function eliminarElementosBusquedaPrevia() {
        let elementoAEliminar = ul.getElementsByClassName("elementoLista");
        elementoAEliminar.remove();
        let parrafoElementoAEliminar = ul.getElementsByClassName("parrafoElementoLista");
        parrafoElementoAEliminar.remove();
}