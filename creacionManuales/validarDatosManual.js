window.addEventListener("load", inicio);

function inicio() {
    document.getElementById("idBotonCrearManual").addEventListener("click", comprobar);
}
/* 
alert(document.getElementById("idBotonCrearManual").value[0]); */
function comprobar() {
    let inputVal = document.getElementById("idNombreManual").value;

    // Displaying the value
    console.log(inputVal.length);
}