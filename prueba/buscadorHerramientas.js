//declaro el array

let arrayOpciones = [];
let contador;
window.addEventListener("load", inicio);

function inicio() {
    arrayOpciones = leerPHP(); //leer los nombres de herramientas y guardarlo en un array
    document.getElementById("idBusquedaNombreHerramienta").addEventListener("keyup", comprobarSiHayElementos);
}

/*Si hay resutados de una búsqueda 1ºeliminar 2ºvolver a filtrar */
function comprobarSiHayElementos() {
    let elementosLista = document.getElementById("mostrarBloqueResultados").childElementCount;
    if (elementosLista > 0) {
        eliminarElementosBusquedaPrevia(elementosLista);
    }
    filtra();
    configurarClicadoSobreElementoLista();
}

/* Si hay texto en el input comprueba que el texto coincida con el contenido
de los elementos del array. Muestra las concidencias como elementos de una lista */
function filtra() {
    if (document.getElementById("idBusquedaNombreHerramienta").value.length > 0) {
        contador = 0; // esta variable se utiliza en anadirClaseElementos
        crearElementosListaYParrafos();
    }
}

/*recorro el array y si algún string CONTIENE el texto, lo muestro*/
function crearElementosListaYParrafos() {
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
            anadirClaseElementos(parrafoLista);
            elementoLista.setAttribute("class", "elementoLista");
            //añadir a la ul
            let ul = document.getElementById("mostrarBloqueResultados");
            ul.appendChild(elementoLista);
        }
    }
}

/* si hay elementos en la lista añadir a cada elemento el evento click */
function configurarClicadoSobreElementoLista() {
    if (document.getElementById("mostrarBloqueResultados").childElementCount > 0) {
        for (i = 1; i <= document.getElementById("mostrarBloqueResultados").childElementCount; i++) {
            document.querySelector("ul li:nth-child(" + i + ") p").addEventListener("click", seleccionarElemento);
        }
    }
}

/* añadir el texto del elemento seleccionado al input */
function seleccionarElemento(event) {
    document.querySelector("input").value = event.target.textContent;
}

/*Al desplegar la lista de opciones necesitamos que los elementos pares e impares
tengan atributos distintos para diferenciarse mejor. Esta funcion añade dos clases
en función de si son pares o impares*/
function anadirClaseElementos(elemento) {
    contador++;
    if (contador % 2 == 0) {
        elemento.setAttribute("class", "parrafoElementoListaPar");
    } else {
        elemento.setAttribute("class", "parrafoElementoListaImpar");
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