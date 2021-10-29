class Manual {
  constructor(p_nombreManual,
    p_informacionManual,
    p_equipoNecesario,
    p_medidasDeSeguridad,
    p_fotoManual,
    p_codHerramienta,
    p_codUsuario,
    p_fechaCreacion) {
    this._nombreManual = p_nombreManual;
    this._informacionManual = p_informacionManual;
    this._equipoNecesario = p_equipoNecesario;
    this._medidasDeSeguridad = p_medidasDeSeguridad;
    this._fotoManual = p_fotoManual;
    this._codHerramienta = p_codHerramienta;
    this._codUsuario = p_codUsuario;
    this._fechaCreacion = p_fechaCreacion;
  }

  get nombreManual() {
    return this._nombreManual;
  }

  set nombreManual(p_nombreManual) {
    this._nombreManual = p_nombreManual;
  }



}