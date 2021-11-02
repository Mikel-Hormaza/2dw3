let arrayOpciones = ["uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve", "diez"];

window.addEventListener("load", inicio);



function inicio() {
    document.getElementById("idBusquedaNombreHerramienta").addEventListener("keyup", filtra);

}

function filtra(){
    for(i=0; i<arrayOpciones.length; i++){
        if(arrayOpciones[i].includes(document.getElementById("idBusquedaNombreHerramienta").value)){
            console.log(arrayOpciones[i]);
        }
    }
}