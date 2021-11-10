<?php

session_start();
require_once 'Paso.php';
/* el cod de manual $_SESSION["codManualSeleccionado"] */

$servidor  = "localhost";
$user = "root";
$pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    validarDatos();
}

/*comprueba el largo de los mensajesde de error para saber si se han rellenado todos los campos
    Si no hay errores,comprueba la foto del Paso. Si ésta devuelve true realiza las comprobaciones
    contra la BD antes de la insert*/
function validarDatos()
{
    if (strlen(comprobarSiSeHanIntroducidoTodosLosDatos()) > 1) {
        echo comprobarSiSeHanIntroducidoTodosLosDatos();
    } else {
        if (strlen(comprobarLargoDeAtributosIntroducidos(crearObjetoPaso())) > 1) {
            echo comprobarLargoDeAtributosIntroducidos(crearObjetoPaso());
        } else {
            if (crearObjetoPaso()->validarFotoPaso()) {
                if (comprobacionesEnBD("tituloUnique", crearObjetoPaso()->getTituloPaso()) == 0) {
                    insertarPasoBD(crearObjetoPaso());
                    echo "foto subida";
                } else {
                    echo "el titulo ya existe en la BD";
                }
            } else {
                echo "foto not ok";
            }
        }
    }
}

function insertarPasoBD($Paso)
{
    $insertarBDcompletado = true;
    global $servidor;
    global $user;
    global $pass;

    $titulo = $Paso->getTituloPaso();
    $descripcionPaso = $Paso->getDescripcionPaso();
    $equipoNecesario = $Paso->getEquipoNecesario();
    $medidasSeguridad = $Paso->getMedidasDeSeguridad();
    $fotoPaso = imagenPaso();
    $codHerramienta = $Paso->getCodHerramienta();
    $codManualSeleccionado = $Paso->getcodManualSeleccionado();
    $fecha = $Paso->getFechaCreacion();


    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $user, $pass);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO Paso (nombrePaso,
        informacionPaso,
        equipoNecesario,
        medidasDeSeguridad,
        fotoPaso,
        codHerramienta,
        codManualSeleccionado,
        fechaCreacion) 
        VALUES ('$titulo',
        '$descripcionPaso',
        '$equipoNecesario', 
        '$medidasSeguridad',
        '$fotoPaso', 
        '$codHerramienta', 
        '$codManualSeleccionado', 
        '$fecha');
        ";
        $conexion->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        $insertarBDcompletado = false;
    }
    $conexion = null;
    if ($insertarBDcompletado) {
        /* guardar en $_SESSION["codPasoSeleccionado"] el cod de la herramienta  */
        comprobacionesEnBD("obtenerCodPaso", $titulo);
    }
    return $insertarBDcompletado;
}
/* si codPasoSeleccionado==tituloUnique: devolver un count con los Pasoes con el mismo título en la BD 
i codPasoSeleccionado==obtenerCodPaso: guardar en $_SESSION["codPasoSeleccionado"] el cod de la herramienta */
function comprobacionesEnBD($tipoComprobacion, $dato)
{
    global $servidor;
    global $user;
    global $pass;

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $user, $pass);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($tipoComprobacion == "tituloUnique") {
            $sql = "SELECT COUNT(codPaso)
            from Paso
            WHERE nombrePaso like'$dato'";

            $resultado = $conexion->query($sql);
            $tituloPaso = $resultado->fetchAll();
        } elseif ($tipoComprobacion == "obtenerCodPaso") {
            $sql = "SELECT codPaso
            FROM Paso
            WHERE nombrePaso like '$dato'";

            $resultado = $conexion->query($sql);
            $codPaso = $resultado->fetchAll();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    if ($tipoComprobacion == "tituloUnique") {
        return $tituloPaso[0]["COUNT(codPaso)"];
    } elseif ($tipoComprobacion == "obtenerCodPaso") {
        $_SESSION["codPasoSeleccionado"] = $codPaso[0]["codPaso"];
    }
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
        $_SESSION["codHerramientaSeleccionada"]
    );
    return $Paso1;
}

/*comprueba que todos los datos se han introducido */
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

/* comprueba el largo de los atributos según largo en la BD*/
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

function validarDato($dato)
{
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}
