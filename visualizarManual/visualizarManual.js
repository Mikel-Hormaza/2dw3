let div1;
let div2;
let div3;

window.addEventListener("load", inicio);

/*Mostrar más*/
function inicio() {
  obtenerDivs();
  document.getElementById("generarPDF").addEventListener("click", generarPDF);
}

function generarPDF() {
/*   let docPDF = new jsPDF();
  
    let tituloManual = document.getElementById("tituloManual").childNodes[0].textContent;
    let codManual = document.getElementsByTagName("h3")[0].textContent;
    let fechaCreacion = document.getElementsByTagName("h3")[1].textContent;
    let creador = document.getElementsByTagName("h3")[2].textContent;

    let infoDetallesManual = document.getElementById("divInfoDetallesManual").childNodes[1].textContent;
    let equipoNecesario = document.getElementById("divInfoEquipoNecesario").childNodes[3].textContent;
    let medidasDeSeguridad = document.getElementById("divInfoMedidasSeguridad").childNodes[3].textContent;

  docPDF.text(20, 20, codManual);
    docPDF.text(20, 30, tituloManual);
    docPDF.text(20, 40, fechaCreacion);
    docPDF.text(20, 50, creador); 

    docPDF.text(20,  60, infoDetallesManual);
  docPDF.text(20, 70, equipoNecesario);
    docPDF.text(20, 80, medidasDeSeguridad);


    docPDF.addPage();
    doc.setProperties({
      overflow:'linebreak'
    });
    
  docPDF.save('documento.pdf'); */
}

/*Obtener los divs con párrafos*/
function obtenerDivs() {
  div1 = document.getElementById("divInfoDetallesManual");
  div2 = document.getElementById("divInfoEquipoNecesario");
  div3 = document.getElementById("divInfoMedidasSeguridad");
  comprobarNumeroDeParrafos(div1, 1);
  comprobarNumeroDeParrafos(div2, 2);
  comprobarNumeroDeParrafos(div3, 3);
}

/*Comprobar si hay uno o dos párrafos een los div. 
Si hay uno, no añadir addEventListener al botón porque no existe.
Si hay dos, añadir*/
function comprobarNumeroDeParrafos(div, tipo) {
  let elementosDiv = div.getElementsByTagName("P");
  if (elementosDiv > 1) {
    anadirEventListener(tipo);
  }
}

/*Añadir eventListeners segun tipo de dato (detales, equipo, seguridad)*/
function anadirEventListener(tipo) {
  switch (tipo) {
    case 1:
      document.getElementById("botonLeerMas").addEventListener("click", mostrarDetalles);
      break;
    case 2:
      document.getElementById("botonLeerMasEquipo").addEventListener("click", mostrarEquipo);
      break;
    case 3:
      document.getElementById("botonLeerMasSeguridad").addEventListener("click", mostrarSeguridad);
      break;
  }
}

function mostrarDetalles() {
  mostrarTexto("puntos", "mas", "botonLeerMas");
}

function mostrarEquipo() {
  mostrarTexto("puntosEquipo", "masEquipo", "botonLeerMasEquipo");
}

function mostrarSeguridad() {
  mostrarTexto("puntosSeguridad", "masSeguridad", "botonLeerMasSeguridad");
}

/*Mostar la parte del texto oculta*/
function mostrarTexto(puntosSuspensivos, mas, boton) {
  let puntos = document.getElementById(puntosSuspensivos);
  let masText = document.getElementById(mas);
  let btnText = document.getElementById(boton);

  if (puntos.style.display == "none") {
    puntos.style.display = "inline";
    btnText.innerHTML = "Mostrar";
    masText.style.display = "none";
  } else {
    puntos.style.display = "none";
    btnText.innerHTML = "Ocultar";
    masText.style.display = "inline";
  }
}