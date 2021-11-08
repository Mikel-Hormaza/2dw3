class Login {
    constructor(p_nombreUsuario,
      p_contrasena) {
      this._nombreUsuario = p_nombreUsuario;
      this._contrasena = p_contrasena;
    }
    get nombreUsuario() {
        return this._nombreUsuario;
      }
    
      set nombreUsuario(p_nombreUsuario) {
        this._nombreUsuario = p_nombreUsuario;
      }

      get contrasena() {
        return this._contrasena;
      }
    
      set contrasena(p_contrasena) {
        this._contrasena = p_contrasena;
      }
      

    }

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("Iniciosesion").addEventListener('click', validarFormulario); 
  });
    function validarFormulario(evento) {
        evento.preventDefault();
        var usuario = document.getElementById('NombredeUsuario').value;
        if(usuario.length == 0) {
          alert('Escriba un nombre de usuario');
        }
        var contrasena = document.getElementById('Contrasena').value;
        if (contrasena.length == 0) {
          alert('Escriba una contrasena');
        }
            document.getElementById("formulario").submit();
        
        
      }