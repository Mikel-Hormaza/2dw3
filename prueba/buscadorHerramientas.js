//declaro el array

let arrayOpciones=[];

window.addEventListener("load", inicio);

function inicio() {
    arrayOpciones =leerPHP(); //lee los nombres de herramientas
    document.getElementById("idBusquedaNombreHerramienta").addEventListener("keyup", comprobarSiHayElementos);
}

/*Si hay resutados de una búsqueda 1ºeliminar 2ºvolver a filtrar */
function comprobarSiHayElementos() {
    let elementosLista = document.getElementById("mostrarBloqueResultados").childElementCount;
    if (elementosLista > 0) {
        eliminarElementosBusquedaPrevia(elementosLista);
        filtra();
    } else {
        filtra();
    }
}

/* Si hay texto en el input comprueba que el texto coincida con el contenido
de los elementos del array. Muestra las concidencias como elementos de una lista */
function filtra() {
    if (document.getElementById("idBusquedaNombreHerramienta").value.length > 0) {
        //recorro el array y si algún string CONTIENE el texto, lo muestro
        for (i = 0; i < arrayOpciones.length; i++) {
            if (arrayOpciones[i].includes(document.getElementById("idBusquedaNombreHerramienta").value)) {
                //Crear elementos
                let elementoLista = document.createElement("li");
                let parrafoLista = document.createElement("p");
                let texto = document.createTextNode(arrayOpciones[i]);
                parrafoLista.appendChild(texto);
                elementoLista.appendChild(parrafoLista);
                //atributos
                parrafoLista.setAttribute("class", "parrafoElementoLista");
                elementoLista.setAttribute("class", "elementoLista");
                //añadir a la ul
                let ul = document.getElementById("mostrarBloqueResultados");
                ul.appendChild(elementoLista);
            }
        }
    }
}


function eliminarElementosBusquedaPrevia(elementosLista) {

    while (elementosLista > 0) {
        let li = document.querySelector(".elementoLista");
        document.getElementById("mostrarBloqueResultados").removeChild(li);
        elementosLista--;
    }

}

function leerPHP() {
    let arrayNombresHerramientas = document.getElementsByTagName('span').innerHTML;
    return arrayNombresHerramientas;
}