<?php 

class Usuario {
    public $nombre_usuario;
    public $contra1_usuario;
    public $contra2_usuario;
    public $email_usuario;


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
    
    public function validarNombre() {
        $NombreUsuario = $_POST['nombre'];
        $regName = "/^[A-Za-z]+$/";  //SOLO LETRAS//

        if (preg_match($regName, $NombreUsuario)) {
            // echo ("Nombre apropiado");
            return true;
        } else {
            // echo ("Nombre no apropiado. Solo se permiten letras");
            return false;
        }
    }

    public function validarContra1() {
        $contraseña1Usuario = $_POST['contraseña'];
        $regPassword1 = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";

        if (preg_match($regPassword1, $contraseña1Usuario)) {
            // echo ("Primera contraseña apropiada");
            return true;
        } else {
            // echo ("Primera contraseña no apropiada. Debe incluir al menos 8 caracteres. Una mayuscula, una minuscula y un numero");
            return false;
        }
    }

    public function validarContra2() {
        $contraseña2Usuario = $_POST['contraseña2'];
        $regPassword2 = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";

        if (preg_match($regPassword2, $contraseña2Usuario)) {
            // echo ("Segunda contraseña apropiada");
            return true;
        } else {
            // echo ("Segunda contraseña no apropiada. Debe incluir al menos 8 caracteres. Una mayuscula, una minuscula y un numero");
            return false;
        }
    }

    public function validarEmail() {
        $emailUsuario = $_POST['correo'];
        $regEmail = "/^[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,4}/";

        if (preg_match($regEmail, $emailUsuario)) {
            // echo ("Email apropiado");
            return true;
        } else {
            // echo ("Email no apropiado. Debe tener el siguiente formato: CARACTERES@CARACTERES.DOMINIO");
            return false;
        }
    } 

    public function compararContraseñas() {
        $password1 = $_POST['contraseña'];
        $password2 = $_POST['contraseña2'];

        if ($password1 == $password2) {
            // echo ("Las contraseñas coinciden");
            return true;
        } else {}
        // echo ("Las contraseñas no coinciden");
        return false;
    }
}

?>
