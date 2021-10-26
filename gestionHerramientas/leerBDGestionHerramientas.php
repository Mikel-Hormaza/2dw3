<?php
$servidor  = "localhost";
$usuario = "root";
$password = "";



try {
    $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlherramienta = "SELECT codHerramienta, nombreHerramienta, categoria, fotoHerramienta 
    FROM herramienta";

    $resultadoHerramienta = $conexion->query($sqlherramienta);
    $datosHerramienta = $resultadoHerramienta->fetchAll();

    $sqlherramientaususario = "SELECT codHerramienta, nombreHerramienta, categoria, fotoHerramienta 
    FROM herramienta, manual, usuario WHERE herramienta.codHerramienta=manual.codHerramienta && manual.codUsuario=usuario.codUsuario";

    $resultadoHerramienta = $conexion->query($sqlherramientaususario);
    $datosHerramienta = $resultadoHerramienta->fetchAll();


} catch (PDOException $e) {
    echo $sqlherramienta . "<br>" . $e->getMessage();
}
$konexioa = null;
