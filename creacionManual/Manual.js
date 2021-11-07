class Manual {
  constructor(p_nombreManual,
    p_informacionManual,
    p_equipoNecesario,
    p_medidasDeSeguridad,
    p_fotoManual) {
    this._nombreManual = p_nombreManual;
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

  get informacionManual() {
    return this._informacionManual;
  }

  set informacionManual(p_informacionManual) {
    this._informacionManual = p_informacionManual;
  }

  get equipoNecesario() {
    return this._equipoNecesario;
  }

  set equipoNecesario(p_equipoNecesario) {
    this._equipoNecesario = p_equipoNecesario;
  }

  get medidasDeSeguridad() {
    return this._medidasDeSeguridad;
  }

  set medidasDeSeguridad(p_medidasDeSeguridad) {
    this._medidasDeSeguridad = p_medidasDeSeguridad;
  }

  get fotoManual() {
    return this._fotoManual;
  }

  set fotoManual(p_fotoManual) {
    this._fotoManual = p_fotoManual;
  }



}