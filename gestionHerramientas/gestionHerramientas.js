window.addEventListener("load", inicio);
/*Si el usuario clica cuando el desplegable está desplegado, ocultarlo*/
window.addEventListener("click", ocultarBloqueDesplegado);

/*Clicar idBotonDesplegar: desplegarContenido
categoria: desplegarBotonCategoria*/
function inicio() {
    document.getElementById("idBotonDesplegar").addEventListener("click", desplegarContenido);
    document.getElementById("categoria").addEventListener("click", desplegarBotonCategoria);
    document.getElementById("idBotonCategoria").addEventListener("click", desplegarContenidoCategoria);
}

/* Al clicar el botón, añadir al elemento la clase mostrar con display block*/
function desplegarContenido() {
    document.getElementById("idBloqueDesplegar").classList.toggle("mostrar");
}
function desplegarBotonCategoria(){
    document.getElementById("idBotonCategoria").classList.toggle("mostrar");
}

function desplegarContenidoCategoria(){
    document.getElementById("idContenidoCategoria").classList.toggle("mostrar");
}

function ocultarBloqueDesplegado(){
    if (!event.target.matches('.botonDesplegar')) {
        var contenido = document.getElementsByClassName("contenidoADesplegar");
        
        var i;
        for (i = 0; i < contenido.length; i++) {
            var abrirContenido = contenido[i];
            if (abrirContenido.classList.contains('mostrar')) {
                abrirContenido.classList.remove('mostrar');
            }
        }
    }
}
