<?php
session_start();

$servidor  = "localhost";
$usuario = "root";
$password = "";

/* la primera vez que la página se carga, la primera variable vale cero*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $primeraVariableLimit = $_SESSION['primeraVariableLimit'];
}else{
    $primeraVariableLimit =0;
}

$maxLimit = 8;

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlManuales = "SELECT codManual, nombreManual, fotoManual, manual.codHerramienta, nombreHerramienta
    FROM manual,herramienta
    WHERE manual.codHerramienta like herramienta.codHerramienta 
    ORDER BY fechaCreacion
    LIMIT $primeraVariableLimit, $maxLimit";

    $resultadoManuales = $conexion->query($sqlManuales);
    $datosManuales = $resultadoManuales->fetchAll();

    $sqlNumManuales = "SELECT codManual
    FROM manual
    ORDER by fechaCreacion";

    $numTotalManuales = $conexion->query($sqlNumManuales);
    $datoNumTotalManuales = $numTotalManuales->fetchAll();
    $conexion = null; 
} catch (PDOException $e) {
    echo $sqlManuales . "<br>" . $e->getMessage();
}

setcookie("codigoDelUltimoManualDeLaTablaMostrado",end($datosManuales)["codManual"]);
setcookie("codigoDelUltimoManualDeLaTabla",end($datoNumTotalManuales)["codManual"]);

