window.addEventListener("load", inicio);

/*Mostrar más*/
function inicio() {
  calcularSiAnadirFuncionAlBoton();
/*     document.getElementById("botonLeerMas").addEventListener("click", mostrarDetalles);
    document.getElementById("botonLeerMasEquipo").addEventListener("click", mostrarEquipo);
    document.getElementById("botonLeerMasSeguridad").addEventListener("click", mostrarSeguridad); */
}

/*Comprobar si hay uno o dos párrafos een los div. Si hay uno, no añadir addEventListener al botón porque no existe.
Si hay dos, añadir*/
function calcularSiAnadirFuncionAlBoton(){
  let div1 = document.getElementById("divInfoDetallesManual");
  let largoDeDiv1 = div1.getElementsByTagName("P");
  alert(largoDeDiv1.length);
}  

function mostrarDetalles(){
  mostrarTexto("puntos", "mas", "botonLeerMas");
}
function mostrarEquipo(){
  mostrarTexto("puntosEquipo", "masEquipo", "botonLeerMasEquipo");
}
function mostrarSeguridad(){
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
