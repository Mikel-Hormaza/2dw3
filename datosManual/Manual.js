class Manual {
  constructor(p_tituloManual,
    p_descripcionManual,
    p_equipoNecesario,
    p_medidasDeSeguridad,
    p_fotoManual) {
    this._tituloManual = p_tituloManual;
    this._descripcionManual = p_descripcionManual;
    this._equipoNecesario = p_equipoNecesario;
    this._medidasDeSeguridad = p_medidasDeSeguridad;
    this._fotoManual = p_fotoManual;
  }

  get tituloManual() {
    return this._tituloManual;
  }

  get descripcionManual() {
    return this._descripcionManual;
  }

  get equipoNecesario() {
    return this._equipoNecesario;
  }

  get medidasDeSeguridad() {
    return this._medidasDeSeguridad;
  }


  get fotoManual() {
    return this._fotoManual;
  }

  /* mediante una expresión regular y el método exec comprobamos si el archivo tiene una extensión válida */
  validarFotoManual() {
    let extensionesValidas = /(\.jpg|\.jpeg|\.png)$/i;
    if (extensionesValidas.exec(this.fotoManual)) {
      return true;
    } else {
      return false;
    }
  }

}