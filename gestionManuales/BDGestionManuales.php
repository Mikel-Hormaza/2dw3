<?php
session_start();

$servidor  = "localhost";
$usuario = "root";
$password = "";

$_SESSION["codUsuario"] = 1; #parche
$_SESSION["permisoDeUsuario"] = "admin"; #parche

$maxLimit = 6; //la cantidad de manuales que se pueden mostrar

/*como hay dos formularios, además de comprobar si se ha enviado comprobamos si se ha seleccionado alguno de los botones de esos formularios*/
/*IF: comprueba si hemos hecho submit en los botones de inicio final */
if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['primero'])
    or isset($_POST['anterior'])
    or isset($_POST['siguiente'])
    or isset($_POST['ultimo']))) {
    gestionarBotonesNavegacionInicioFinal();
}
/*ELSEIF: comprueba si hemos hecho submit en el filtrado */ 
elseif (
    $_SERVER["REQUEST_METHOD"] == "POST"
    && (isset($_POST['idCreadosPorMi'])
        or isset($_POST['idTodos'])
        or isset($_POST['idmaquina-herramienta'])
        or isset($_POST['idelectronica'])
        or isset($_POST['idherramienta-taller']))) {
    filtrarLosManualesMostrados();
}
/*ELSE: la primera vez que la página se carga, cuando aún no se han enviado formularios, vale cero. Es la primera variable del LIMIT en las SELECT*/ 
else {
    $primeraVariableLimit = 0;
    prepararWhereYLimitDeLaSelect($primeraVariableLimit, "ASC", $_SESSION["codUsuario"], null, false);
}

function filtrarLosManualesMostrados()
{

    $primeraVariableLimit = 0;
    if (isset($_POST['idCreadosPorMi'])) {
        prepararWhereYLimitDeLaSelect($primeraVariableLimit, $_SESSION['ordenUltimaBusqueda'], $_SESSION["codUsuario"], null, false);
    }
    if (isset($_POST['idherramienta-taller'])) {
        prepararWhereYLimitDeLaSelect($primeraVariableLimit, $_SESSION['ordenUltimaBusqueda'], $_SESSION["codUsuario"], $_POST['idherramienta-taller'], false);
    }
    if (isset($_POST['idTodos'])) {
        prepararWhereYLimitDeLaSelect($primeraVariableLimit, $_SESSION['ordenUltimaBusqueda'], $_SESSION["codUsuario"], null, true);
    }
    if (isset($_POST['idmaquina-herramienta'])) {
        prepararWhereYLimitDeLaSelect($primeraVariableLimit, $_SESSION['ordenUltimaBusqueda'], $_SESSION["codUsuario"], $_POST['idmaquina-herramienta'], false);
    }
    if (isset($_POST['idelectronica'])) {
        prepararWhereYLimitDeLaSelect($primeraVariableLimit, $_SESSION['ordenUltimaBusqueda'], $_SESSION["codUsuario"], $_POST['idelectronica'], false);
    }
}

/* llama a la BD para obtener los manuales y además los códigos de todos los manuales que compartes la where */
function llamarBD($where, $primeraVariableLimit, $AscODesc)
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
            FROM manual,herramienta " . $where . "
            ORDER BY fechaCreacion  $AscODesc, codManual, nombreManual, fotoManual
            LIMIT $primeraVariableLimit, $maxLimit";
        $resultadoManuales = $conexion->query($sqlManuales);

        $sqlNumManuales = "SELECT codManual
            FROM manual, herramienta " . $where . "
            ORDER by fechaCreacion ASC, codManual, nombreManual, fotoManual ";

        $numTotalManuales = $conexion->query($sqlNumManuales);
        $datoNumTotalManuales = $numTotalManuales->fetchAll();

        $conexion = null;

    } catch (PDOException $e) {
        echo $sqlManuales . "<br>" . $e->getMessage();
    }

    /*cuando seleccionamos el boton "último" llamo a la BD y selecciono los últimos manuales utilizando DESC. 
        Para que no se muestren "invertidos" utilizo array_reverse antes de mostrarlos*/
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

/* Prepara la clausula WHERE de la llamada a la BD y luego llama a la BD. 
Recibe como parámetros:
1. el primer manual que muestra
2. el orden ASC o DESC del order by 
3. el codUsuario del usuario
4. la categoría seleccionada (si se ha seleccionado. Sino null)
5. si se ha seleccionado mostrar todo (sino false)*/
function prepararWhereYLimitDeLaSelect($primeraVariableLimit, $AscODesc, $codUsuario, $categoriaSeleccionada, $mostrarTodosLosManuales)
{
    $where = "WHERE manual.codHerramienta like herramienta.codHerramienta && estadoManual like 'visible'";
    /*     si el usuario tiene un permiso usuario al filtrar por categoría verá solo los de esa categoría que él mismo creó
    si el usuario tiene permiso de admin al filtrar por categoría verá todos los manuales de esa categoría */
    if ($_SESSION["permisoDeUsuario"] == "usuario") {
        if (!empty($categoriaSeleccionada)) {
            $where .= "&& herramienta.categoria like '$categoriaSeleccionada' ";
        }
        if ($mostrarTodosLosManuales == false) {
            $where .= " && manual.codUsuario like '" . $codUsuario . "'";
        }
    } else {
        if (!empty($categoriaSeleccionada)) {
            $where .= "&& herramienta.categoria like '$categoriaSeleccionada'";
        }
        if ($mostrarTodosLosManuales == false && empty($categoriaSeleccionada)) {
            $where .= " && manual.codUsuario like '" . $codUsuario . "'";
        }
    }
    $_SESSION["where"] = $where;
    llamarBD($where, $primeraVariableLimit, $AscODesc);
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


/* por cada categoria de herramientas encontrada en la BD como un botón del bloque de categorias*/
function mostrarOpcionesCategorias($categorias)
{
    $cont = -1;
    foreach ($categorias as $categoria) {
        $cont++;
        crearBotonDeUnaCategoria($categorias[$cont]["categoria"]);
    }
}


/* para que los botones tengan id, value y name distintos creamos esos valores con un string al que llamamos id+el nombre de categoria */
function crearBotonDeUnaCategoria($nomCategoria)
{
    $stringIdYName = "id";
    $stringIdYName .= $nomCategoria;
?>
    <button type="submit" id="<?php echo $stringIdYName ?>" name="<?php echo $stringIdYName ?>" value="<?php echo $nomCategoria ?>"><?php echo $nomCategoria; ?></button>
<?php
}


/* Por defecto la gestion de manuales muestra los manuales creados por el usuario logeado
Pero si $permiso == admin entonces el usuario podrá ver también todos los manuales*/
function comprobarOpcionesDesplegablesAMostrar($permiso)
{
    if ($permiso == "admin") {
        return
            "<button type=" . "submit" . " id=" . "idCreadosPorMi" . " name=" . "idCreadosPorMi" . ">Creados por mí</button>
        <button type=" . "submit" . " id=" . "idTodos" . " name=" . "idTodos" . ">Todos</button>";
    }
}

/*comprobar qué botón se ha seleccionado*/
function  gestionarBotonesNavegacionInicioFinal()
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

/* controla los botones inicio - anterior -siguiente - fin 
comprueba si el primer y último código mostrados en pantalla coinciden con el primer código de la consulta en la BD*/
function controlarBotonesInicioAnteriorSigUltimo($nombreBoton)
{
    global $maxLimit;
    /*comprobar si el primer código mostrado en pantalla coincide con el primer código de la consulta en la BD */
    if ($nombreBoton == "siguiente" || $nombreBoton == "ultimo") {
        if ($_SESSION['codigoDelUltimoManualDeLaTablaMostrado'] !== $_SESSION['codigoDelUltimoManualDeLaTabla']) {
            avanzarONoAvanzar($nombreBoton, $maxLimit);
        } else {
            repetirLlamadaPreviaALaBD();
        }
    }
    /*comprobar si el último código mostrado en pantalla coincide con el último código de la consulta en la BD */
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
        llamarBD($_SESSION["where"], $_SESSION['primeraVariableLimit'], "ASC");
    } elseif ($nombreBoton == "ultimo") {
        $_SESSION['primeraVariableLimit'] = 0;
        llamarBD($_SESSION["where"], $_SESSION['primeraVariableLimit'], "DESC");
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
            llamarBD($_SESSION["where"], $_SESSION['primeraVariableLimit'], "ASC");
        } else {
            retrocederONoRetroceder("primero", $maxLimit);
        }
    } elseif ($nombreBoton == "primero") {
        $_SESSION['primeraVariableLimit'] = 0;
        llamarBD($_SESSION["where"], $_SESSION['primeraVariableLimit'], "ASC");
    }
}
/* cuando clicamos ir a la "última" o "primera" página de manuales pero ya estamos en ella llamamos a la BD con los mismos parámetros de la última select realizada
es necesario volver a llamar a la BD para que vuelva a mostrarnos lso manuales */
function repetirLlamadaPreviaALaBD()
{
    llamarBD($_SESSION["where"], $_SESSION['primeraVariableLimit'], $_SESSION['ordenUltimaBusqueda']);
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
