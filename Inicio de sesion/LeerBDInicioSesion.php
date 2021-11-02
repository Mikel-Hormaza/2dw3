<?php
$servidor  = "localhost";
$usuario = "root";
$password = "";



try {
    $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlUsuario = "SELECT nomUsuario, passUsuario 
    FROM usuario";

    $resultadoUsuario = $conexion->query($sqlUsuario);
    $datosUsuario = $resultadoUsuario->fetchAll();

} catch (PDOException $e) {
    echo $e->getMessage();
}
$conexion = null;