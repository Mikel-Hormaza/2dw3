document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('submit', validarFormulario); 
  });

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

    var gmail = document.getElementById('gmail').value;
    if(gmail.length == 0) {
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
}

function pruebaemail (valor){
	re=/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/
	if(!re.exec(valor)){
		alert('email no valido');
	}
	else alert('email valido');
	}

