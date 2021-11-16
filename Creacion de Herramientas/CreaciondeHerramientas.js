class CreacionHerramienta {
    constructor(p_nombreHerramienta,
      p_categoria,
      p_fotoHerramienta) {
      this._nombreHerramienta = p_nombreHerramienta;
      this._categoria = p_categoria;
      this._fotoHerreamienta = p_fotoHerramienta
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

      get fotoHerreamienta() {
        return this._fotoHerreamienta;
      }
    
      set fotoHerramienta(p_fotoHerramienta) {
        this._fotoHerramienta = p_fotoHerramienta;
      }
}

document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("crearHerramienta").addEventListener('click', validarFormulario); 
  });
  function validarFormulario(evento) {
      evento.preventDefault();
      let nombre = document.getElementById('nombrHerramienta').value;
      if(nombre.length == 0) {
        alert('Escriba un nombre');
      }
      let categoria = document.forms["formulario"]["categoria"].selectedIndex;
      if( categoria == null || categoria == 0 ) {
        alert("Debe seleccionar una opción en el campo 'Categoria'");
      }
      let fotoHerramienta = document.getElementById("classInputFileIMG").value.replace(/^.*\\/, "");   
      if(fotoHerramienta.length == 0) {
            alert('Introduce una imagen para la herramienta');
      }

      document.getElementById("formulario").submit();
}

