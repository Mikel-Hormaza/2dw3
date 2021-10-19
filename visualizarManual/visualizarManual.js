window.addEventListener("load", inicio);

/*Clicar idBotonDesplegar: desplegarContenido
categoria: desplegarBotonCategoria*/
function inicio() {
    document.getElementById("botonLeerMas").addEventListener("click", mostrarTexto);
}

function mostrarTexto() {
    let puntos = document.getElementById("puntos");
    let masText = document.getElementById("mas");
    let btnText = document.getElementById("botonLeerMas");
  
    if (puntos.style.display == "none") {
      puntos.style.display = "inline";
      btnText.innerHTML = " Mostrar"; 
      masText.style.display = "none";
    } else {
      puntos.style.display = "none";
      btnText.innerHTML = " ocultar"; 
      masText.style.display = "inline";
    }
  }