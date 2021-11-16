class Biblioteca {
    constructor (
        p_nombreHerramienta,
        p_fotoHerramienta
    ) {
        this._nombreHerramienta = p_nombreHerramienta;
        this._fotoHerramienta = p_fotoHerramienta;
    }

    get nombreHerramienta() {
        return this._nombreHerramienta
    }

    set nombreHerramienta(p_nombreHerramienta) {
        this._nombreHerramienta = p_nombreHerramienta;
    }

    get fotoHerramienta() {
        return this._fotoHerramienta
    }

    set fotoHerramienta(p_fotoHerramienta) {
        this._fotoHerramienta = p_fotoHerramienta;
    }
}