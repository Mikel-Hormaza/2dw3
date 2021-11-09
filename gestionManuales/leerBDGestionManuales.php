<?php
session_start();

$primeraVariableLimit;
$datosManuales;
$datoNumTotalManuales;
$codigoDelUltimoManualDeLaTablaMostrado;
$codigoDelUltimoManualDeLaTabla;
$maxLimit = 1; //la cantidad de manuales que se pueden mostrar

/* la primera vez que la página se carga, la primera variable vale cero*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    botonesInicioFinal();
} else {
    $primeraVariableLimit = 0;
    llamarBD($primeraVariableLimit, "ASC");
}

/*comprobar qué botón se ha seleccionado*/
function  botonesInicioFinal(){
    if (isset($_POST['primero'])) {
        avanzarONoAvanzar("primero");
    }
    if (isset($_POST['anterior'])) {
        avanzarONoAvanzar("anterior");
    }
    if (isset($_POST['siguiente'])) {
        avanzarONoAvanzar("siguiente");
    }
    if (isset($_POST['ultimo'])) {
        avanzarONoAvanzar("ultimo");
    }
}

function avanzarONoAvanzar($nombreBoton)
{
    global $maxLimit;
    if($nombreBoton=="siguiente"||$nombreBoton=="ultimo"){
        if ($_COOKIE["codigoDelUltimoManualDeLaTablaMostrado"] !== $_COOKIE["codigoDelUltimoManualDeLaTabla"]) {
            if($nombreBoton=="siguiente"){
                $_SESSION['primeraVariableLimit']+=$maxLimit;
                llamarBD($_SESSION['primeraVariableLimit'], "ASC");
            }
            elseif($nombreBoton=="ultimo"){
                $_SESSION['primeraVariableLimit']=0;
                llamarBD($_SESSION['primeraVariableLimit'], "DESC");
            }
        }else{
            echo "son iguales <br>";
            llamarBD($_SESSION['primeraVariableLimit'], $_COOKIE["ordenUltimaBusqueda"]);
        }
    }
    if($nombreBoton=="anterior"||$nombreBoton=="primero"){
        if ($_COOKIE["codigoDelPrimerManualDeLaTablaMostrado"] !== $_COOKIE["codigoDelPrimerManualDeLaTabla"]) {
            if($nombreBoton=="anterior"){
                $_SESSION['primeraVariableLimit']+=$maxLimit;
                llamarBD($_SESSION['primeraVariableLimit'], "ASC");
            }
            elseif($nombreBoton=="primero"){
                $_SESSION['primeraVariableLimit']=0;
                llamarBD($_SESSION['primeraVariableLimit'], $_COOKIE["ordenUltimaBusqueda"]);
            }
        }else{
            echo "son iguales <br>";
            llamarBD($_SESSION['primeraVariableLimit'], $_COOKIE["ordenUltimaBusqueda"]);
        }
    }
}

/* guardo mediante cookies el valor del último y primer cod de manual mostrado,
guarda el cod del último y primer manual,
guarda el orden ASC o DESC de la última busqueda realizada en la BD*/
function guardarCookiesCodManuales($datosManuales, $datoNumTotalManuales, $AscODesc)
{
 /*    el código del primer y último manual que se muestra */
    setcookie("codigoDelPrimerManualDeLaTablaMostrado", $datosManuales[0]["codManual"], time() + 3600, "/");
    setcookie("codigoDelUltimoManualDeLaTablaMostrado", end($datosManuales)["codManual"], time() + 3600, "/");
/*     código del primer y último manual en la BD */
    setcookie("codigoDelUltimoManualDeLaTabla", end($datoNumTotalManuales)["codManual"], time() + 3600, "/");
    setcookie("codigoDelPrimerManualDeLaTabla", $datoNumTotalManuales[0]["codManual"], time() + 3600, "/");
    setcookie("ordenUltimaBusqueda", $AscODesc, time() + 3600, "/");

}

function guardarPrimeraVariableLimit($primeraVariableLimit){
    $_SESSION['primeraVariableLimit']=$primeraVariableLimit;
}

/* llama a la BD para cargar los manuales. 
Recibe como parámetros el primer manual que muestra y el orden ASC o DESC del order by */
function llamarBD($primeraVariableLimit, $AscODesc)
{
    global $maxLimit;
    global $datosManuales;
    global $datoNumTotalManuales;
    try {

        $servidor  = "localhost";
        $usuario = "root";
        $password = "";

        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlManuales = "SELECT codManual, nombreManual, fotoManual, manual.codHerramienta, nombreHerramienta
            FROM manual,herramienta
            WHERE manual.codHerramienta like herramienta.codHerramienta 
            ORDER BY fechaCreacion $AscODesc
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

    guardarCookiesCodManuales($datosManuales, $datoNumTotalManuales, $AscODesc);
    guardarPrimeraVariableLimit($primeraVariableLimit);
}

require_once "gestionManuales.php";
