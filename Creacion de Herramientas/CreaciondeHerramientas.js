class CreacionHerramienta {
    constructor(p_nombreHerramienta,
      p_categoria) {
      this.__nombreHerramienta = p__nombreHerramienta;
      this._categoria = p_categoria;
    }
    get nombreHerramienta() {
        return this._nombreHerramienta;
      }
    
      set nombreUsuario(p_nombreHerramienta) {
        this._nombreHerramienta = p_nombreHerramienta;
      }

      get categoria() {
        return this._categoria;
      }
    
      set categoria(p_categoria) {
        this._categoria = p_categoria;
      }
}

document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("crearHerramienta").addEventListener('click', validarFormulario); 
  });
  function validarFormulario(evento) {
      evento.preventDefault();
      var nombre = document.getElementById('nombrHerramienta').value;
      if(nombre.length == 0) {
        alert('Escriba un nombre');
      }
      var categoria = document.forms["formulario"]["categoria"].selectedIndex;
      if( categoria == null || categoria == 0 ) {
        alert("Debe seleccionar una opción en el campo 'Categoria'");
        return false;					
      }
          document.getElementById("formulario").submit();
  }