<?php

session_start();

$servidor  = "localhost";
$usuario = "root";
$password = "";
#PARCHE
$_SESSION['primeraVariableLimit']=0;
$_SESSION['segudaVariableLimit']=8;

$primeraVariableLimit = $_SESSION['primeraVariableLimit'];
$segudaVariableLimit = $_SESSION['segudaVariableLimit'];

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
