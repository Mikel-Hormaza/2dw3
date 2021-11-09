<?php
session_start();

$servidor  = "localhost";
$usuario = "root";
$password = "";

/* la primera vez que la página se carga, la primera variable vale cero
si */

/* if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['primeraVariableLimit']=limitesFuncion();
}else{
    $_SESSION['primeraVariableLimit']=6;
}
 */
$_SESSION['primeraVariableLimit']=0;
$primeraVariableLimit = $_SESSION['primeraVariableLimit'];
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

} catch (PDOException $e) {
    echo $sqlManuales . "<br>" . $e->getMessage();
}

$codigoDelUltimoManual= end($datoNumTotalManuales)["codManual"];
$codigoDelUltimoManualMostrado=end($datosManuales)["codManual"];
echo ($codigoDelUltimoManual."+".$codigoDelUltimoManualMostrado);
 
$conexion = null;

function limitesFuncion(){
    echo "enviado";
    if(isset($_POST['siguiente'])){
        echo "siguiente";
        $_SESSION['primeraVariableLimit']=$_SESSION['primeraVariableLimit']+8;
    }
}


require_once "gestionManuales.php";
