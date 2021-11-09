<?php

session_start();

$servidor  = "localhost";
$usuario = "root";
$password = "";
#PARCHE
$_SESSION['primeraVariableLimit']=0;
$_SESSION['segundaVariableLimit']=8;

$primeraVariableLimit = $_SESSION['primeraVariableLimit'];
$segundaVariableLimit = $_SESSION['segundaVariableLimit'];

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlManuales = "SELECT codManual, nombreManual, fotoManual, manual.codHerramienta, nombreHerramienta
    FROM manual,herramienta
    WHERE manual.codHerramienta like herramienta.codHerramienta 
    ORDER BY fechaCreacion
    LIMIT $primeraVariableLimit, $segundaVariableLimit";

    $resultadoManuales = $conexion->query($sqlManuales);
    $datosManuales = $resultadoManuales->fetchAll();

    
    $sqlTotalManuales = "SELECT COUNT(codManual) from manual";
    $resultadoTotalManual = $conexion->query($sqlTotalManuales);
    $datoTotalManual = $resultadoTotalManual->fetchAll();


} catch (PDOException $e) {
    echo $sqlManuales . "<br>" . $e->getMessage();
}

$manualMax=$datoTotalManual[0]['COUNT(codManual)'];
 
$conexion = null;

/* if(isset($_GET['primero'])){
echo "primero";
}
 */

?>