window.addEventListener("load", inicio);

function inicio() {
    document.getElementById("idBotonCrearManual").addEventListener("click", crearObjetoManual);
}

function crearObjetoManual() {

    let today = new Date();
    let fechaCreacion = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();

    let manual1 = new Manual(document.getElementById("idNombreManual").value,
        document.getElementById("idDescripcionManual").value,
        document.getElementById("idImagenManual").value,
        document.getElementById("idHerramientasNecesarias").value,
        document.getElementById("idMedidasSeguridad").value,
        document.getElementById("idCodHerramienta").value,
        "1" /*Cod user */ ,
        fechaCreacion);

}