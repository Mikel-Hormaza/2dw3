class Manual {
  constructor(p_nombreManual,
    p_informacionManual,
    p_equipoNecesario,
    p_medidasDeSeguridad,
    p_fotoManual) {
    this._nombreManual = p_nombreManual;2
    this._informacionManual = p_informacionManual;
    this._equipoNecesario = p_equipoNecesario;
    this._medidasDeSeguridad = p_medidasDeSeguridad;
    this._fotoManual = p_fotoManual;
  }

  get nombreManual() {
    return this._nombreManual;
  }

  set nombreManual(p_nombreManual) {
    this._nombreManual = p_nombreManual;
  }



}