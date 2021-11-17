<?php
session_start();
require_once 'Paso.php';
$servidor  = "localhost";
$user = "root";
$pass = "";

/* comprobar si se ha enviado un formulario y si se ha rellenado el input "eliminarPaso"*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["eliminarPaso"])) {
        if($_POST["eliminarPaso"]=="eliminar"){
            eliminarPaso();
        }
    }
    validarDatos();
}

function eliminarPaso()
{
    global $servidor;
    global $user;
    global $pass;
    $codigoDelPaso = $_POST["inputPasoSeleccionado"];
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $user, $pass);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE paso
        SET estadoPaso = 'oculto'
        WHERE codPaso = '$codigoDelPaso'";

        $conexion->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conexion = null;
}

/* comprueba si hay un paso seleccionado */
function validarDatos()
{
    if (strlen($_POST["inputPasoSeleccionado"]) > 0) {
        validarDatosEditarPaso();
    } else {
        validarDatosCrearPaso();
    }
}

/*comprueba el largo del mensaje de error para saber si se han rellenado todos los campos
    Si no hay errores, comprueba si se ha introduido imagen. 
    Si ésta devuelve true realiza las comprobaciones contra la BD antes de la insert*/
function validarDatosCrearPaso()
{
    global $mensajeErrorFaltanDatos;
    if (strlen(comprobarSiSeHanIntroducidoElTituloYDescripcion()) == 0) {
        if (strlen(comprobarSiSeHaIntroducidoFoto()) == 0) {
            comprobarLargoDeAtributosSegunLargoEnLaBD();
        } else {
            echo $mensajeErrorFaltanDatos;
        }
    } else {
        echo comprobarSiSeHanIntroducidoElTituloYDescripcion();
    }
}

/*comprueba el largo del mensaje de error para saber si se han rellenado todos los campos
    Si no hay errores, comprueba si se ha introducido imagen para saber si editar con foto nueva o manteniendo la foto.
    Comprueba el largo de los atributos. Después de las comprobaciones, edita*/
function validarDatosEditarPaso()
{
    if (strlen(comprobarSiSeHanIntroducidoElTituloYDescripcion()) == 0) {
        if (strlen(comprobarSiSeHaIntroducidoFoto()) == 0) {
            comprobarLargoDeAtributosSegunLargoEnLaBD();
        } else {
            if(strlen(comprobarLargoDeAtributosIntroducidos(crearObjetoPaso(false)))==0){
                insertarOEditar("editarSinCambiarFoto");
            }else{
                echo comprobarLargoDeAtributosIntroducidos(crearObjetoPaso(false));
            }
            
        }
    }
}



/* comprobar el largo de los atributos con respecto al largo máximo según la BD - para ello compruebo el largo del mensaje de error 
si el largo de los atributos no es correcto, mostrar mensaje de error
si es correcto, realizar comprobaciones de la clase */
function comprobarLargoDeAtributosSegunLargoEnLaBD()
{
    if (strlen(comprobarLargoDeAtributosIntroducidos(crearObjetoPaso(true))) == 0) {
        comprobacionesDelObjeto();
    } else {
        echo comprobarLargoDeAtributosIntroducidos(crearObjetoPaso(true));
    }
}

/* realiza la comprobacion del objeto. Si devuelve true, inserta el paso en la BD y actualizar*/
function comprobacionesDelObjeto()
{
    if (crearObjetoPaso(true)->validarFotoPaso()) {
        insertarOEditar(null);
    } else {
        echo "foto not ok";
    }
}

/*comprueba si hay un paso seleccionado. Sino lo hay, crea un paso nuevo
Si sí lo hay, comprueba si al realizar cambios hemos introducido una nueva imagen o no y a continuacion hacemos el update
una vez realizados los cambios, elimina el paso seleccionado de session y actualiza la página*/
function insertarOEditar($insertarOEditar)
{
    if (strlen($_POST["inputPasoSeleccionado"]) == 0) {
        insertarPasoBD(crearObjetoPaso(true));
    } else {
        if ($insertarOEditar == "editarSinCambiarFoto") {
            editarAtributosBD(crearObjetoPaso(false), false);
        } else {
            editarAtributosBD(crearObjetoPaso(true), true);
        }
    }
    actualizarPagina();
}

function actualizarPagina()
{
    header('Location: ../datosPasos/crearPaso.php');
    die();
}

function insertarPasoBD($paso)
{
    global $servidor;
    global $user;
    global $pass;

    $titulo = $paso->getTituloPaso();
    $descripcionPaso = $paso->getDescripcionPaso();
    $fotoPaso = imagenPaso();
    $codManualSeleccionado = $paso->getCodManual();

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
    }
    $conexion = null;
}
/*UPDATE en la BD. Recibe como parámetro el código del paso y un boolean sobre si es neceario actualizar la imagen en la BD*/
function editarAtributosBD($paso, $nuevaFoto)
{
    global $servidor;
    global $user;
    global $pass;

    $titulo = $paso->getTituloPaso();
    $descripcionPaso = $paso->getDescripcionPaso();
    $codigoDelPaso = $_POST["inputPasoSeleccionado"];

    if ($nuevaFoto == true) {
        $fotoPaso = imagenPaso();
        $sql = "UPDATE paso
        SET tituloPaso = '$titulo', descripcionPaso = '$descripcionPaso', fotoPaso = '$fotoPaso'
        WHERE codPaso = '$codigoDelPaso'";
    } else {
        $sql = "UPDATE paso
        SET tituloPaso = '$titulo', descripcionPaso = '$descripcionPaso'
        WHERE codPaso = '$codigoDelPaso'";
    }

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $user, $pass);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conexion->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
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
function crearObjetoPaso($hayFoto)
{
    if ($hayFoto == false) {
        $paso1 = new Paso(
            strtolower(validarDato($_POST["nombrePaso"])), //devuelve el título en minúscula
            validarDato($_POST["descripcionPaso"]),
            "",
            $_SESSION["codManualSeleccionado"]
        );
    } else {
        $paso1 = new Paso(
            strtolower(validarDato($_POST["nombrePaso"])), //devuelve el título en minúscula
            validarDato($_POST["descripcionPaso"]),
            $_FILES["classInputFileIMG"]["name"],
            $_SESSION["codManualSeleccionado"]
        );
    }
    return $paso1;
}

/*comprueba que todos los datos se han introducido.
Devuelve un string con el mensaje de error. Si no hay errores, devuelve un string vacío */
function comprobarSiSeHanIntroducidoElTituloYDescripcion()
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
    if (empty($_SESSION["codManualSeleccionado"])) {
        $error = true;
        $mensajeErrorFaltanDatos .= "error al leer el código de manual <br>";
    }
    if ($error == false) {
        $mensajeErrorFaltanDatos = "";
    }
    return $mensajeErrorFaltanDatos;
}

/*Comprueba que se ha introducido una imagen.
Devuelve un string con el mensaje de error. Si no hay errores, devuelve un string vacío */
function comprobarSiSeHaIntroducidoFoto()
{
    if (empty($_FILES['classInputFileIMG']['name'])) {
        return "Por favor introduce una imagen";
    } else {
        return "";
    }
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
