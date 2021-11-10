<?php 

class Usuario {
    public function __construct($nombre_usuario, $contra1_usuario, $contra2_usuario, $email_usuario) {
        $this->nombreUsuario = $nombre_usuario;
        $this->contra1Usuario = $contra1_usuario;
        $this->contra2Usuario = $contra2_usuario;
        $this->emailUsuario = $email_usuario;
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }
    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }
    public function getContra1Usuario() {
        return $this->contra1Usuario;
    }
    public function setContra1Usuario($contra1Usuario) {
        $this->contra1Usuario = $contra1Usuario;
    }
    public function getContra2Usuario() {
        return $this->contra2Usuario;
    }
    public function setContra2Usuario($contra2Usuario) {
        $this->contra2Usuario = $contra2Usuario;
    }
    public function getEmailUsuario() {
        return $this->emailUsuario;
    }
    public function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }
    
    public function validarNombreUsuario() {
        $NombreUsuario = $_POST['nombre'];
        $regName = "/^[A-Za-z]+$/";  //SOLO LETRAS//

        if (preg_match($regName, $NombreUsuario)) {
            echo ("Nombre apropiado");
        } else {
            echo ("Nombre no apropiado. Solo se permiten letras");
        }
    }

    public function validarContra1Usuario() {
        $contraseña1Usuario = $_POST['password'];
        $regPassword1 = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";

        if (preg_match($regPassword1, $contraseña1Usuario)) {
            echo ("Primera contraseña apropiada");
        } else {
            echo ("Primera contraseña no apropiada. Debe incluir al menos 8 caracteres. Una mayuscula, una minuscula y un numero");
        }
    }

    public function validarContra2Usuario() {
        $contraseña2Usuario = $_POST['repeatPW'];
        $regPassword2 = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";

        if (preg_match($regPassword2, $contraseña2Usuario)) {
            echo ("Segunda contraseña apropiada");
        } else {
            echo ("Segunda contraseña no apropiada. Debe incluir al menos 8 caracteres. Una mayuscula, una minuscula y un numero");
        }
    }

    public function validarEmailUsuario() {
        $emailUsuario = $_POST['correo'];
        $regEmail = "/^[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,4}/";

        if (preg_match($regEmail, $emailUsuario)) {
            echo ("Email apropiado");
        } else {
            echo ("Email no apropiado. Debe tener el siguiente formato: CARACTERES@CARACTERES.DOMINIO");
        }
    } 

    public function compararContraseñas() {
        $password1 = $_POST['password'];
        $password2 = $_POST['repeatPW'];

        if ($password1 == $password2) {
            echo ("Las contraseñas coinciden");
        } else {}
        echo ("Las contraseñas no coinciden");
    }
}

?>
