window.addEventListener("load", hasiera);

function hasiera() {
    document.getElementById("registrarse").addEventListener("click", objetoUsuario);
}

function objetoUsuario() {
    let Nombre = document.getElementsByClassName("nombre")[0].value;
    let Email = document.getElementsByClassName("correo")[0].value;
    let Contraseña = document.getElementsByClassName("password")[0].value;

    var usuario1 = {
        nombre: Nombre,
        email: Email,
        contraseña: Contraseña
    };

    function validarNombre() {
        let izena = document.getElementsByClassName("nombre")[0].value;
        let regIzena = /^[A-Za-z]+$/;  //SOLO LETRAS//

        if (!regIzena.test(izena)) {
            alert ("Nombre no apropiado");
            return false;
        } else {
            alert ("Nombre apropiado");
            return true;
        }
    }

    usuario1.validarNombre();
}

