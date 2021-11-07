window.addEventListener("load", inicio);

function inicio() {
    anadirEventoClickABotones();
}

function anadirEventoClickABotones() {
    document.querySelector(".botonesOpcionesFormulario button").addEventListener("click", validarDatos);
}

function validarDatos() {
    alert("guardar ysalir");
    crearObjetoManual();
}

function crearObjetoManual() {

    let v_nombreManual = document.getElementById("idNombreManual").value;
    let v_informacionManual = document.getElementById("idDescripcionManual").value;
    let v_equipoNecesario = document.getElementById("idHerramientasNecesarias").value;
    let v_medidasDeSeguridad = document.getElementById("idMedidasSeguridad").value;
    let v_fotoManual = document.getElementById("classInputFileIMG1").value;

    let manual1 = new Manual(v_nombreManual,
        v_informacionManual,
        v_equipoNecesario,
        v_medidasDeSeguridad,
        v_fotoManual);
/* 
alert(manual1.nombreManual); ejemplo getter

manual1.nombreManual="manolo";
alert(manual1.nombreManual); ejemplo setter */

}