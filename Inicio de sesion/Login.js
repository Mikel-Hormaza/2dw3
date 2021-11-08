document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("Iniciosesion").addEventListener('click', validarFormulario); 
  });
  function validarFormulario(evento) {
    evento.preventDefault();
    var usuario = document.getElementById('NombredeUsuario').value;
    if(usuario.length == 0) {
      alert('Escriba un nombre de usuario');
    }
    var contraseña = document.getElementById('Contraseña').value;
    if (contraseña.length == 0) {
      alert('Escriba una contraseña');
    }else{
        document.getElementById("formulario").submit();
    }
    
  }
