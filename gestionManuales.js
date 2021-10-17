window.addEventListener("load", inicio);

function inicio() {
    document.getElementById("idBotonDesplegar").addEventListener("click", desplegarContenido);
}

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function desplegarContenido() {
    document.getElementById("idBloqueDesplegar").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
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

