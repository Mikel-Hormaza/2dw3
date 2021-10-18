window.addEventListener("load", inicio);

function inicio() {
    document.getElementById("idBotonDesplegar").addEventListener("click", desplegarContenido);
}

/* Al clicar el botón, mostrar contenido*/
function desplegarContenido() {
    document.getElementById("idBloqueDesplegar").classList.toggle("show");
}

/*Si el usuario clica fuera o encima, ocultarlo*/
window.addEventListener("click", mifuncion);

function mifuncion(){
    if (!event.target.matches('.botonDesplegar')) {
        var dropdowns = document.getElementsByClassName("contenidoADesplegar");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
