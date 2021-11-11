<?php
session_start();

$servidor  = "localhost";
$usuario = "root";
$password = "";

$_SESSION["codUsuario"] = 1; #parche
$_SESSION["permisoDeUsuario"] = "admin"; #parche


$primeraVariableLimit;
$maxLimit = 8; //la cantidad de manuales que se pueden mostrar

/* la primera vez que la página se carga, la primera variable vale cero*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    botonesNavegacionInicioFinal();
} else {
    $primeraVariableLimit = 0;
    llamarBD($primeraVariableLimit, "ASC");
}

/* llama a la BD para cargar los manuales. 
Recibe como parámetros el primer manual que muestra y el orden ASC o DESC del order by */
function llamarBD($primeraVariableLimit, $AscODesc)
{
    global $maxLimit;
    global $datosManuales;
    global $datoNumTotalManuales;
    global $servidor;
    global $usuario;
    global $password;
    try {

        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlManuales = "SELECT codManual, nombreManual, fotoManual, manual.codHerramienta, nombreHerramienta
            FROM manual,herramienta
            WHERE manual.codHerramienta like herramienta.codHerramienta 
            ORDER BY fechaCreacion $AscODesc
            LIMIT $primeraVariableLimit, $maxLimit";

        $resultadoManuales = $conexion->query($sqlManuales);

        $sqlNumManuales = "SELECT codManual
            FROM manual
            ORDER by fechaCreacion";

        $numTotalManuales = $conexion->query($sqlNumManuales);
        $datoNumTotalManuales = $numTotalManuales->fetchAll();

        $conexion = null;
    } catch (PDOException $e) {
        echo $sqlManuales . "<br>" . $e->getMessage();
    }
    /*cuando seleccionamos el boton "último" llamo a la BD y selecciono los últimos. 
        Para que no se muestren "invertidos" utilizo array_reverse */
    if ($AscODesc == "DESC") {
        $datosManuales = array_reverse($resultadoManuales->fetchAll());
        $countDeTodosLosCodigosEnLaTabla = sizeof($datoNumTotalManuales);
        guardarCount($countDeTodosLosCodigosEnLaTabla, $maxLimit);
    } else {
        $datosManuales = $resultadoManuales->fetchAll();
        guardarPrimeraVariableLimit($primeraVariableLimit);
    }


    guardarCodigosManualesEnSession($datosManuales, $datoNumTotalManuales, $AscODesc);
}

/* comprobar en la tabla de herramientas cuáles son las categorías de las mismas y cargarlas */
function cargarLasOpcionesDeCategoriaExistentesEnLaBD()
{
    global $servidor;
    global $usuario;
    global $password;
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlSelectCategorias = "SELECT categoria from herramienta GROUP BY categoria";

        $resultadoSelectCategorias = $conexion->query($sqlSelectCategorias);

        $datosDeLasCategorias = $resultadoSelectCategorias->fetchAll();

        $conexion = null;
    } catch (PDOException $e) {
        echo $sqlSelectCategorias . "<br>" . $e->getMessage();
    }
    mostrarOpcionesCategorias($datosDeLasCategorias);
}

/* muestra cada categoria encontrada en la BD como un elemento de la lista categorias */
function mostrarOpcionesCategorias($categorias)
{
    $cont = -1;
    foreach ($categorias as $categoria) {
        $cont++;
?>
        <a><?php echo $categorias[$cont]["categoria"] ?></a>
<?php
    }
}

function comprobarOpcionesDesplegablesAMostrar($permiso)
{
    if ($permiso == "admin") {
        return
            "<a>Creados por mí</a>
        <a>Todos</a>";
    }
}

/*comprobar qué botón se ha seleccionado*/
function  botonesNavegacionInicioFinal()
{
    if (isset($_POST['primero'])) {
        controlarBotonesInicioAnteriorSigUltimo("primero");
    }
    if (isset($_POST['anterior'])) {
        controlarBotonesInicioAnteriorSigUltimo("anterior");
    }
    if (isset($_POST['siguiente'])) {
        controlarBotonesInicioAnteriorSigUltimo("siguiente");
    }
    if (isset($_POST['ultimo'])) {
        controlarBotonesInicioAnteriorSigUltimo("ultimo");
    }
}

/* controla los botones inicio - anterior -siguiente - fin */
function controlarBotonesInicioAnteriorSigUltimo($nombreBoton)
{
    global $maxLimit;
    if ($nombreBoton == "siguiente" || $nombreBoton == "ultimo") {
        if ($_SESSION['codigoDelUltimoManualDeLaTablaMostrado'] !== $_SESSION['codigoDelUltimoManualDeLaTabla']) {
            avanzarONoAvanzar($nombreBoton, $maxLimit);
        } else {
            repetirLlamadaPreviaALaBD();
        }
    }
    if ($nombreBoton == "anterior" || $nombreBoton == "primero") {
        if ($_SESSION['codigoDelPrimerManualDeLaTablaMostrado'] !== $_SESSION['codigoDelPrimerManualDeLaTabla']) {
            retrocederONoRetroceder($nombreBoton, $maxLimit);
        } else {
            repetirLlamadaPreviaALaBD();
        }
    }
}
/* "siguiente"-> si el primer manual que vemos es X, y en cada pantalla vemos Y manuales, a X le sumamos Y para que muestre manuales a partir de X+Y
"último" -> selecciona los ultimos X manuales. Para ello les llama en orden DESC */
function avanzarONoAvanzar($nombreBoton, $maxLimit)
{
    if ($nombreBoton == "siguiente") {
        $_SESSION['primeraVariableLimit'] += $maxLimit;
        llamarBD($_SESSION['primeraVariableLimit'], "ASC");
    } elseif ($nombreBoton == "ultimo") {
        $_SESSION['primeraVariableLimit'] = 0;
        llamarBD($_SESSION['primeraVariableLimit'], "DESC");
    }
}

/* "anterior"-> si el primer manual que vemos es X, y en cada pantalla vemos Y manuales, a X le restamos Y para que muestre manuales a partir de X-Y
"primero" -> selecciona los primeros X manuales. Para ello les llama en orden ASC */
function retrocederONoRetroceder($nombreBoton, $maxLimit)
{
    if ($nombreBoton == "anterior") {
        /* como no podemos ver un manual en -X, solo een caso de ser X >= que Y le restaremos Y. 
        Sino, llamaremos a la misma funcion que controlarBotones con "primero"*/
        if ($_SESSION['primeraVariableLimit'] > $maxLimit) {
            $_SESSION['primeraVariableLimit'] -= $maxLimit;
            llamarBD($_SESSION['primeraVariableLimit'], "ASC");
        } else {
            controlarBotonesInicioAnteriorSigUltimo("primero");
        }
    } elseif ($nombreBoton == "primero") {
        $_SESSION['primeraVariableLimit'] = 0;
        llamarBD($_SESSION['primeraVariableLimit'], "ASC");
    }
}
/* cuando no podemos ir a la "última" o "primera" página de manuales porque ya estamos en ella, llamamos a la BD con los mismos parámetros de la última select realizada
es necesario volver a llamar a la BD para que vuelva a mostrarnos manuales */
function repetirLlamadaPreviaALaBD()
{
    llamarBD($_SESSION['primeraVariableLimit'], $_SESSION['ordenUltimaBusqueda']);
}

/* guardo en session el valor del último y primer cod de manual mostrado,
guarda el cod del último y primer manual,
guarda el orden ASC o DESC de la última busqueda realizada en la BD*/
function guardarCodigosManualesEnSession($datosManuales, $datoNumTotalManuales, $AscODesc)
{
    $_SESSION['codigoDelPrimerManualDeLaTablaMostrado'] = $datosManuales[0]["codManual"];
    $_SESSION['codigoDelUltimoManualDeLaTablaMostrado'] = end($datosManuales)["codManual"];
    $_SESSION['codigoDelUltimoManualDeLaTabla'] = end($datoNumTotalManuales)["codManual"];
    $_SESSION['codigoDelPrimerManualDeLaTabla'] = $datoNumTotalManuales[0]["codManual"];
    $_SESSION['ordenUltimaBusqueda'] = $AscODesc;
}

function guardarPrimeraVariableLimit($primeraVariableLimit)
{
    $_SESSION['primeraVariableLimit'] = $primeraVariableLimit;
}

/* cuando seleccionamos el botón final, para obtener PrimeraVariableLimit restamos el maxLimit al count */
function guardarCount($countDeTodosLosCodigosEnLaTabla, $maxLimit)
{
    $PVL = $countDeTodosLosCodigosEnLaTabla -= $maxLimit;
    guardarPrimeraVariableLimit($PVL);
}

require_once "gestionManuales.php";
