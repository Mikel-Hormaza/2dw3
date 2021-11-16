document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('submit', validarFormulario); 
  });

/* Esta es la parte de la validacion para que no haya ningun elemento vacio */
function validarFormulario(evento) {
    evento.preventDefault();
    var izena = document.getElementById('izena').value;
    if(izena.length == 0) {
        alert('No has escrito nada en el nombre');
    }

    var abizena = document.getElementById('abizena').value;
    if(abizena.length == 0) {
        alert('No has escrito nada en el apellido');
    }

    var email = document.getElementById('email').value;
    if( /^(.+\@.+\..+)$/i.test(email)) {
        alert('No has escrito nada en el mail');
    }else{
        alert("Ingrese un Email v\u00e1lido");
    }

    var telefonoa = document.getElementById('telefonoa').value;
    if(/^[0-9]{9}$/i.test(telefonoa)) {
        alert("correcto");
    }else{
        alert("Ingrese un Tel\u00E9fono v\u00e1lido");
    }
    this.submit();

    var mesua = document.getElementById('mesua').value;
    if(mesua.length == 0) {
        alert('No has escrito nada en el mesua');
    }
    this.submit();
}