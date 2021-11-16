class Usuario {
    constructor (nombre_usuario, contra1_usuario, contra2_usuario, email_usuario) {
        this._nombre = nombre_usuario;
        this._contra1 = contra1_usuario;
        this._contra2 = contra2_usuario;
        this._email = email_usuario;
    }

    get nombre () {
        return this._nombre;
    }
    set nombre (nombre_usuario) {
        this._nombre = nombre_usuario;
    }
    get contra1 () {
        return this._contra1;
    }
    set contra1 (contra1_usuario) {
        this._contra1 = contra1_usuario;
    }
    get contra2 () {
        return this._contra2;
    }
    set contra2 (contra2_usuario) {
        this._contra2 = contra2_usuario;
    }
    get email () {
        return this._email;
    }
    set email (email_usuario) {
        this._email = email_usuario;
    }

    validarNombreUsuario() {
        let f_nombreUsuario = document.getElementById("nombre").value;
        let regName = /^[A-Za-z]+$/;  //SOLO LETRAS//

        if (!regName.test(f_nombreUsuario)) {
            alert ("Nombre no apropiado. Solo se admiten letras");
            return false;
        } else {
            alert ("Nombre apropiado");
            return true;
        }
    }
    validarContra1Usuario() {
        let f_contra1Usuario = document.getElementById("password").value;
        let regPassword1 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;  //8 CARACTERES. MINIMO 1 MAYUS, 1 MINUS Y 1 NUM//

        if (!regPassword1.test(f_contra1Usuario)) {
            alert ("Primera contraseña no apropiada. Debe contener al menos 8 caracteres. Una mayuscula, una minuscula y un numero");
            return false;
        } else {
            alert ("Primera contraseña apropiada");
            return true;
        }
    }
    validarContra2Usuario() {
        let f_contra2Usuario = document.getElementById("repeatPW").value;
        let regPassword2 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;   //8 CARACTERES. MINIMO 1 MAYUS, 1 MINUS Y 1 NUM//

        if (!regPassword2.test(f_contra2Usuario)) {
            alert ("Segunda contraseña no apropiada. Debe contener al menos 8 caracteres. Una mayuscula, una minuscula y un numero");
            return false;
        } else {
            alert ("Segunda contraseña apropiada");
            return true;
        }
    }
    validarEmailUsuario() {
        let f_emailUsuario = document.getElementById("correo").value;
        let regEmail = /^[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,4}/;  //CARACTERES@CARACTERES.DOMINIO//

        if (!regEmail.test(f_emailUsuario)) {
            alert ("Email no apropiado. Debe tener este formato: CARACTERES@CARACTERES.DOMINIO");
            return false;
        } else {
            alert ("Email apropiado");
            return true;
        }
    }
    compararContraseñas() {
        let f_contra1 = document.getElementById("password").value;
        let f_contra2 = document.getElementById("repeatPW").value;

        if (f_contra1 != f_contra2) {
            alert ("Las contraseñas no coinciden");
            return false;
        } else {
            alert ("Las contraseñas coinciden");
            return true;
        }
    }
}
