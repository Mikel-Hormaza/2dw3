class contacto{
    constructor(
        p_nombreContacto,
        p_apellidoContacto,
        p_emailContacto,
        p_telefonoContacto,
        P_mensajeContacto
    ) {
        this._nombreContacto = p_nombreContacto;
        this._apellidoContacto = p_apellidoContacto;
        this._emailContacto = p_emailContacto;
        this._telefonoContacto = p_telefonoContacto;
        this._mensajeContacto = P_mensajeContacto;
    }

    get nombreContacto() {
        return this._nombreContacto;
    }

    set nombreContacto(p_nombreContacto) {
        this._nombreContacto = p_nombreContacto;
    }
    
    get apellidoContacto() {
        return this.apellidoContacto;
    }

    set apellidoContacto(p_apellidoContacto) {
        this._apellidoContacto = p_apellidoContacto;
    }

    get emailContacto() {
        return this._emailContacto;
    }

    set emailContacto(p_emailContacto) {
        this._emailContacto = p_emailContacto;
    }

    get telefonoContacto() {
        return this._telefonoContacto;
    }

    set telefonoContacto(p_telefonoContacto) {
        this._telefonoContacto = p_telefonoContacto;
    }

    get mensajeContacto() {
        return this._mensajeContacto;
    }

    set mensajeContacto(p_mensajeContacto) {
        this._mensajeContacto = p_mensajeContacto;
    }
}