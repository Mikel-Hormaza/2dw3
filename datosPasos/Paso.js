class Paso {
  constructor(p_tituloPaso,
    p_descripcionPaso,
    p_fotoPaso) {
    this._tituloPaso = p_tituloPaso;
    this._descripcionPaso = p_descripcionPaso;
    this._fotoPaso = p_fotoPaso;
  }

  get tituloPaso() {
    return this._tituloPaso;
  }

  get descripcionPaso() {
    return this._descripcionPaso;
  }

  get fotoPaso() {
    return this._fotoPaso;
  }

  /* mediante una expresión regular y el método exec comprobamos si el archivo tiene una extensión válida */
  validarFotoPaso() {
    let extensionesValidas = /(\.jpg|\.jpeg|\.png)$/i;
    if (extensionesValidas.exec(this.fotoPaso)) {
      return true;
    } else {
      return false;
    }
  }

}