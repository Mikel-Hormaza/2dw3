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

  set tituloPaso(p_tituloPaso) {
    this._tituloPaso = p_tituloPaso;
  }

  get descripcionPaso() {
    return this._descripcionPaso;
  }

  set descripcionPaso(p_descripcionPaso) {
    this._descripcionPaso = p_descripcionPaso;
  }

  get fotoPaso() {
    return this._fotoPaso;
  }

  set fotoPaso(p_fotoPaso) {
    this._fotoPaso = p_fotoPaso;
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