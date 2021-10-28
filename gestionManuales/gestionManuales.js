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



/* Al clicar el botón, añadir al elemento la clase mostrarDesplegarOpciones con display block*/
/* function desplegarContenido() {
    document.getElementById("idBloqueDesplegar").classList.toggle("mostrarDesplegarOpciones");
}
function desplegarBotonCategoria(){
    document.getElementById("idBotonCategoria").classList.toggle("mostrarDesplegarOpciones");
}

function desplegarContenidoCategoria(){
    document.getElementById("idContenidoCategoria").classList.toggle("mostrarDesplegarOpciones");
}

function ocultarBloqueDesplegado(){
    if (!event.target.matches('.botonDesplegar')) {
        let contenido = document.getElementsByClassName("contenidoADesplegar");
        let i;
        for (i = 0; i < contenido.length; i++) {
            let abrirContenido = contenido[i];
            if (abrirContenido.classList.contains('mostrarDesplegarOpciones')) {
                abrirContenido.classList.remove('mostrarDesplegarOpciones');
            }
        }
    }
} */
