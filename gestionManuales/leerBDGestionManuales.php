<?php
$servidor  = "localhost";
$usuario = "root";
$password = "";

$primeraVariableLimit = 0;
$segudaVariableLimit = 8;

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlManuales = "SELECT codManual, nombreManual, fotoManual, manual.codHerramienta, nombreHerramienta
    FROM manual,herramienta
    WHERE manual.codHerramienta like herramienta.codHerramienta 
    ORDER BY fechaCreacion
    LIMIT $primeraVariableLimit, $segudaVariableLimit";


    $resultadoManuales = $conexion->query($sqlManuales);
    $datosManuales = $resultadoManuales->fetchAll();
} catch (PDOException $e) {
    echo $sqlManuales . "<br>" . $e->getMessage();
}

$conexion = null;