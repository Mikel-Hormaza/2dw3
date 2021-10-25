window.addEventListener("load", inicio);

/*Mostrar más*/
function inicio() {
    document.getElementById("botonLeerMas").addEventListener("click", mostrarDetalles);
    document.getElementById("botonLeerMasEquipo").addEventListener("click", mostrarEquipo);
    document.getElementById("botonLeerMasSeguridad").addEventListener("click", mostrarSeguridad);
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