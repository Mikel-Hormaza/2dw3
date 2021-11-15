<?php

session_start();
require_once 'Paso.php';
/* el cod de manual $_SESSION["codManualSeleccionado"] */
$_SESSION["codManualSeleccionado"] = 1;  #parche
$servidor  = "localhost";
$user = "root";
$pass = "";

/* comprobar si se ha enviado un formulario
si no se ha enviado el codigo del paso seleccionado el form enviado es el de creación de pasos y llamar a validar datos*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["botonPasoSeleccionado"])) {
        validarDatos();
    } 
}

/*comprueba el largo de los mensajesde de error para saber si se han rellenado todos los campos
    Si no hay errores,comprueba la foto del Paso. Si ésta devuelve true realiza las comprobaciones
    contra la BD antes de la insert*/
function validarDatos()
{
    if (strlen(comprobarSiSeHanIntroducidoTodosLosDatos()) == 0) {
        comprobarLargoDeAtributosSegunLargoEnLaBD();
    } else {
        echo comprobarSiSeHanIntroducidoTodosLosDatos();
    }
}

/* comprobar el largo de los atributos con respecto al largo máximo según la BD - para ello compruebo el largo del mensaje de error 
si el largo no es correcto, mostrar mensaje de error
si es correcto, realizar comprobaciones de la clase */
function comprobarLargoDeAtributosSegunLargoEnLaBD()
{
    if (strlen(comprobarLargoDeAtributosIntroducidos(crearObjetoPaso())) == 0) {
        comprobacionesDelObjeto();
    } else {
        echo comprobarLargoDeAtributosIntroducidos(crearObjetoPaso());
    }
}

/* realiza la comprobacion del objeto. Si devuelve true, inserta el paso en la BD y actualizar*/
function comprobacionesDelObjeto()
{
    if (crearObjetoPaso()->validarFotoPaso()) {
        insertarEnBDYActualizar();
    } else {
        echo "foto not ok";
    }
}

function insertarEnBDYActualizar()
{
    
    if($_SESSION["editarOCrear"]==="crear"){
        insertarPasoBD(crearObjetoPaso());
        echo "crear";
    }elseif($_SESSION["editarOCrear"]==="editar"){
        echo "editar";
    }
    
    header('Location: ../../creacionManual/3datosPasos/crearPaso.php');
    die();
}

function insertarPasoBD($Paso)
{
    global $servidor;
    global $user;
    global $pass;

    $titulo = $Paso->getTituloPaso();
    $descripcionPaso = $Paso->getDescripcionPaso();
    $fotoPaso = imagenPaso();
    $codManualSeleccionado = $Paso->getCodManual();


    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $user, $pass);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO Paso (tituloPaso,
        descripcionPaso,
        fotoPaso,
        codManual) 
        VALUES ('$titulo',
        '$descripcionPaso',
        '$fotoPaso', 
        '$codManualSeleccionado');";

        $conexion->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        $insertarBDcompletado = false;
    }
    $conexion = null;
}


function imagenPaso()
{
    $check = getimagesize($_FILES["classInputFileIMG"]["tmp_name"]);
    if ($check !== false) {
        $image = $_FILES['classInputFileIMG']['tmp_name'];
        $fotoPaso = addslashes(file_get_contents($image));
    }
    return $fotoPaso;
}

/* devuelve un objeto Paso */
function crearObjetoPaso()
{
    $Paso1 = new Paso(
        strtolower(validarDato($_POST["nombrePaso"])), //devuelve el título en minúscula
        validarDato($_POST["descripcionPaso"]),
        $_FILES["classInputFileIMG"]["name"],
        $_SESSION["codManualSeleccionado"]
    );
    return $Paso1;
}

/*comprueba que tods los datos se han introducido.
Devuelve un string con el mensaje de error. Si no hay errores, devuelve un string vacío */
function comprobarSiSeHanIntroducidoTodosLosDatos()
{
    $error = false;
    $mensajeErrorFaltanDatos = "Por favor, introduzca: <br>";
    if (strlen($_POST["nombrePaso"]) == 0) {
        $error = true;
        $mensajeErrorFaltanDatos .= "el título <br>";
    }
    if (strlen($_POST["descripcionPaso"]) == 0) {
        $error = true;
        $mensajeErrorFaltanDatos .= "la descripción <br>";
    }
    if (empty($_FILES['classInputFileIMG']['name'])) {
        $error = true;
        $mensajeErrorFaltanDatos .= "una imagen para el paso <br>";
    }
    if (empty($_SESSION["codManualSeleccionado"])) {
        $error = true;
        $mensajeErrorFaltanDatos .= "error al leer el código de manual <br>";
    }
    if ($error == false) {
        $mensajeErrorFaltanDatos = "";
    }
    return $mensajeErrorFaltanDatos;
}

/* comprueba el largo de los atributos según largo más en la BD
Devuelve un string con el mensaje de error. Si no hay errores, devuelve un string vacío */
function comprobarLargoDeAtributosIntroducidos($Paso)
{
    $error = false;
    $mensajeErrorFaltanDatos = "Atención: atributo demasiado largo: <br>";
    if (strlen($Paso->getTituloPaso()) > 80) {
        $error = true;
        $mensajeErrorFaltanDatos .= "el título <br>";
    }
    if (strlen($Paso->getDescripcionPaso()) > 300) {
        $error = true;
        $mensajeErrorFaltanDatos .= "la descripción <br>";
    }
    if ($error == false) {
        $mensajeErrorFaltanDatos = "";
    }
    return $mensajeErrorFaltanDatos;
}

/* eliminar carácteres especiales, espacios y contrabarras */
function validarDato($dato)
{
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}


?>