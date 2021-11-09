document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('submit', validarFormulario); 
  });

/*function validarFormulario(evento) {
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
    if(email.length == 0) {
        alert('No has escrito nada en el mail');
    }

    var telefonoa = document.getElementById('telefonoa').value;
    if(telefonoa.length == 0) {
        alert('No has escrito nada en el telefono');
    }
    this.submit();

    var mesua = document.getElementById('mesua').value;
    if(mesua.length == 0) {
        alert('No has escrito nada en el mesua');
    }
    this.submit();
}*/

function validateEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
  
function validate() {
  const $result = $("#result");
  const email = $("#email").val();
  $result.text("");

  if (validateEmail(email)) {
    $result.text(email + " is valid :)");
    $result.css("color", "green");
  } else {
    $result.text(email + " is not valid :(");
    $result.css("color", "red");
  }
  return false;
}
  
$("#email").on("input", validate);

