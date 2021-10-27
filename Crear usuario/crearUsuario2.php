<?php
$zerbitzaria = "localhost";
$erabiltzailea = "root";
$pasahitza = "";

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$contraseña2 = $_POST['contraseña2'];
$totalUsuarios = 0;
$resultado = 0;

try {
    $konexioa =  new PDO ("mysql: host = $zerbitzaria; dbname=fixpoint", $erabiltzailea, $pasahitza);
    $konexioa->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($contraseña == $contraseña2) {
        $sql = "SELECT COUNT(*) FROM usuario WHERE nomUsuario='$nombre' || correoUsuario='$correo' || passUsuario='$contraseña'";

        if ($resultado = $konexioa->query($sql)) {
            
            if ($resultado->fetchColumn() > 0) {
                echo "Ya existe un usuario que coincide con algun campo introducido. Intentalo con otros datos";
            } else {
                $sql="INSERT INTO usuario (nomUsuario, passUsuario, correoUsuario, permisoUsuario)
                VALUES ('$nombre', '$contraseña', '$correo', 'usuario');";
                $konexioa->exec($sql);
                echo "Nuevo registro. Usuario " .$nombre . " creado correctamente.";
            }
        }
    } else {
        echo "Las contraseñas no coinciden";
    }
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>
