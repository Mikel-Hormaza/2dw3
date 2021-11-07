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

  set tituloManual(p_tituloManual) {
    this._tituloManual = p_tituloManual;
  }

  get descripcionManual() {
    return this._descripcionManual;
  }

  set descripcionManual(p_descripcionManual) {
    this._descripcionManual = p_descripcionManual;
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