<?php
//Conexion con localhost
$servidor  = "localhost";
$usuario = "root";
$password = "";



try {
    //Conexion con la base de datos fixpoint
    $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Select para coger la informacion de la base de datos
    $sqlUsuario = "SELECT nomUsuario, passUsuario 
    FROM usuario";

    $resultadoUsuario = $conexion->query($sqlUsuario);
    $datosUsuario = $resultadoUsuario->fetchAll();
} catch (PDOException $e) {
    echo $e->getMessage();
}
$conexion = null;
