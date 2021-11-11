<?php
$zerbitzaria = "localhost";
$erabiltzailea = "root";
$pasahitza = "";

$totalUsuarios = 0;
$resultado = 0;

function validarNombre() {
    $nombre = $_POST['nombre'];
    $regName = "/^([a-zA-Z' ]+)$/";

    if (preg_match($regName, $nombre)) {
        echo ("PHP nombre correcto");
    } else {
        echo ("PHP nombre incorrecto");
    }
}

function validarEmail() {
    $correo = $_POST['correo'];

    if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo ("PHP email correcto");
    } else {
        echo ("PHP email incorrecto");
    }
}

function validarContra1() {
    $contraseña1 = $_POST['password'];
    $regContra1 = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";  //mínimo 8 caracteres. al menos 1 num, una mayus y una minus

    if (preg_match($contraseña1, $regContra1)) {
        echo ("PHP contra1 correcta");
    } else {
        echo ("PHP contra1 incorrecta");
    }
}

function validarContra2() {
    $contraseña2 = $_POST['repeatPW'];
    $regContra2 = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";  //mínimo 8 caracteres. al menos 1 num, una mayus y una minus

    if (preg_match($contraseña2, $regContra2)) {
        echo ("PHP contra2 correcta");
    } else {
        echo ("PHP contra2 incorrecta");
    }
}

function compararContraseña() {
    $contra1 = $_POST['password'];
    $contra2 = $_POST['repeatPW'];

    if ($contra1 == $contra2) {
        echo ("PHP contraseñas coinciden");
    } else {
        echo ("PHP contraseñas no coinciden");
    }
}

function todasLasValidaciones() {
    
}

try {
    $konexioa =  new PDO ("mysql: host = $zerbitzaria; dbname=fixpoint", $erabiltzailea, $pasahitza);
    $konexioa->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($contraseña1 == $contraseña2) {
        $sql = "SELECT COUNT(*) FROM usuario WHERE nomUsuario='$nombre' || correoUsuario='$correo' || passUsuario='$contraseña'";

        if ($resultado = $konexioa->query($sql)) {
            
            if ($resultado->fetchColumn() > 0) {
                echo "Ya existe un usuario que coincide con algun campo introducido. Intentalo con otros datos";
            } else {
                $sql="INSERT INTO usuario (nomUsuario, passUsuario, correoUsuario, permisoUsuario)
                VALUES ('$nombre', '$contraseña1', '$correo', 'usuario');";
                $konexioa->exec($sql);
                echo "Nuevo registro." . "<br>" . " Usuario " .$nombre . " creado correctamente.";
            }
        }
    } else {
        echo "Las contraseñas no coinciden";
    }
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>
