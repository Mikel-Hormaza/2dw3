<?php
 
session_start();
require_once 'Usuario.php';
 
$servidor = "localhost";
$user = "root";
$password = "";
 
// $resultado = 0;
 
if ($_SERVER ["REQUEST_METHOD"] == "POST") {
    /*echo $_POST['nombre'];
    echo "<br>";
    echo $_POST['correo'];
    echo "<br>";
    echo $_POST['contraseña'];
    echo "<br>";
    echo $_POST['contraseña2'];
    echo "<br>";*/
 
    validarDatosIntroducidos();
}
 
function validarDatosIntroducidos() {
    // echo "validarDatosIntroducidos";
    // echo "<br>";
 
    if (strlen(comprobarSiSeIntroducenLosDatos()) > 1) {
        echo comprobarSiSeIntroducenLosDatos();
    } else {
        if (strlen(comprobarLarguraDeLosDatos(crearObjetoUsuario())) > 1) {
            echo comprobarLarguraDeLosDatos(crearObjetoUsuario());
        } else {
            if (todasLasValidaciones(crearObjetoUsuario()) == false) {
                insertUsuarioBD(crearObjetoUsuario());
            }
        }
    }
}
 
function crearObjetoUsuario() {
    // echo "crearObjetoUsuario";
    // echo "<br>";
 
    $nombre = $_POST['nombre'];
    $email = $_POST['correo'];
    $contra1 = $_POST['contraseña'];
    $contra2 = $_POST['contraseña2'];
 
    $usuario1 = new Usuario($nombre, $contra1, $contra2, $email);
    return $usuario1;
}
 
function comprobarSiSeIntroducenLosDatos() {
    // echo "comprobarSiSeIntroducenLosDatos";
    // echo "<br>";
 
    $nombre = $_POST['nombre'];
    $email = $_POST['correo'];
    $contra1 = $_POST['contraseña'];
    $contra2 = $_POST['contraseña2'];
 
    $error = false;
    $mensajeError = "Por favor, introduce: <br>";
 
    if (strlen($nombre) == 0) {
        $error = true;
        $mensajeError .= "el nombre <br>";
    }
    if (strlen($email) == 0) {
        $error = true;
        $mensajeError .= "el email <br>";
    }
    if (strlen($contra1) == 0) {
        $error = true;
        $mensajeError .= "la primera contraseña <br>";
    }
    if (strlen($contra2) == 0) {
        $error = true;
        $mensajeError .= "la segunda contraseña <br>";
    }
    if ($error == false) {
        $mensajeError = "";
    }
    return $mensajeError;
}
 
function comprobarLarguraDeLosDatos($usuario) {
    // echo "comprobarLarguraDeLosDatos";
    // echo "<br>";
 
    $error = false;
    $mensajeError = "Los siguientes atributos son demasiado largos: <br>";
 
    /*$largNombre = strlen($usuario->getNombreUsuario());
    $largpass = strlen($usuario->getContra1Usuario());
    $largEmail = strlen($usuario->getEmailUsuario());*/
 
    /*echo ("Nombre: " .$largNombre);
    echo "<br>";
    echo ("Password: " .$largpass);
    echo "<br>";
    echo ("Email: " .$largEmail);
    echo "<br>";*/
 
    if (strlen($usuario->getNombreUsuario())>40) {
        $error = true;
        $mensajeError .= "Nombre <br>";
    }
    if (strlen($usuario->getContra1Usuario())>30) {
        $error = true;
        $mensajeError .= "Primera contraseña <br>";
    }
    if (strlen($usuario->getContra2Usuario())>30) {
        $error = true;
        $mensajeError .= "Segunda contraseña <br>";
    }
    if (strlen($usuario->getEmailUsuario())>40) {
        $error = true;
        $mensajeError .= "Email <br>";
    }
    if ($error == false) {
        $mensajeError = "";
    }
 
     return $mensajeError;
}
 
function todasLasValidaciones($usuario) {
    // echo "todasLasValidaciones";
    // echo "<br>";
 
    $error = false;
 
    if (!$usuario->validarNombre()) {
        echo "Nombre no apropiado. Solo se admiten letras";
        echo "<br>";
        $error = true;
    }
    if (!$usuario->validarContra1()) {
        echo "Primera contraseña no apropiada. Debe incluir al menos 8 caracteres. 1 número, una mayus y una minus";
        echo "<br>";
        $error = true;
    }
    if (!$usuario->validarContra2()) {
        echo "Segunda contraseña no apropiada. Debe incluir al menos 8 caracteres. 1 número, una mayus y una minus";
        echo "<br>";
        $error = true;
    }
    if (!$usuario->validarEmail()) {
        echo "Email no apropiado. Debe tener el siguiente formato: CARACTERES@CARACTERES.DOMINIO";
        echo "<br>";
        $error = true;
    }
    if (!$usuario->compararContraseñas()) {
        echo "Las contraseñas no coinciden";
        echo "<br>";
        $error = true;
    }
    return $error;
}

function insertUsuarioBD($usuario) {
    global $servidor;
    global $user;
    global $password;
 
    $nombreUsuario = $usuario->getNombreUsuario();
    $contra1Usuario = $usuario->getContra1Usuario();
    $emailUsuario = $usuario->getEmailUsuario();
 
    try {
        $conexion = new PDO ("mysql: host = $servidor; dbname=fixpoint", $user, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        $sql = "SELECT COUNT(*) FROM usuario WHERE correoUsuario='$emailUsuario' || passUsuario='$contra1Usuario'";
 
        if ($resultado = $conexion->query($sql)) {
            if ($resultado->fetchColumn() > 0) {
                echo "Ya existe un usuario con esos datos." . "<br>" . "Intentalo de nuevo con otros datos";
            } else {
                $sql = "INSERT INTO usuario (nomUsuario, passUsuario, correoUsuario, permisoUsuario)
                VALUES ('$nombreUsuario', '$contra1Usuario', '$emailUsuario', 'usuario');";
 
                $conexion->exec($sql);
                echo "Nuevo registro." . "<br>" . "Usuario " .$nombreUsuario. " creado correctamente.";
            }
        }
    } catch (PDOException $e) { 
        echo ("ERROR");
        // echo $sql . "<br>" . $e->getMessage();
    }
}
 
?>
