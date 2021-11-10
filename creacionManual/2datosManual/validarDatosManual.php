<?php

session_start();
require_once 'Manual.php';
$_SESSION["codUsuario"] = 1;
$_SESSION["codHerramientaSeleccionada"] = 1; #parche

$servidor  = "localhost";
$user = "root";
$pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    validarDatos();
}

/*comprueba el largo de los mensajesde de error para saber si se han rellenado todos los campos
    Si no hay errores,comprueba la foto del manual. Si ésta devuelve true realiza las comprobaciones
    contra la BD antes de la insert*/
function validarDatos()
{
    if (strlen(comprobarSiSeHanIntroducidoTodosLosDatos()) > 1) {
        echo comprobarSiSeHanIntroducidoTodosLosDatos();
    } else {
        if (strlen(comprobarLargoDeAtributosIntroducidos(crearObjetoManual())) > 1) {
            echo comprobarLargoDeAtributosIntroducidos(crearObjetoManual());
        } else {
            if (crearObjetoManual()->validarFotoManual()) {
                if (comprobacionesEnBD("tituloUnique", crearObjetoManual()->getTituloManual()) == 0) {
                    insertarManualBD(crearObjetoManual());
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

function insertarManualBD($manual)
{
    $insertarBDcompletado = true;
    global $servidor;
    global $user;
    global $pass;

    $titulo = $manual->getTituloManual();
    $descripcionManual = $manual->getDescripcionManual();
    $equipoNecesario = $manual->getEquipoNecesario();
    $medidasSeguridad = $manual->getMedidasDeSeguridad();
    $fotoManual = imagenManual();
    $codHerramienta = $manual->getCodHerramienta();
    $codUsuario = $manual->getCodUsuario();
    $fecha = $manual->getFechaCreacion();


    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $user, $pass);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO manual (nombreManual,
        informacionManual,
        equipoNecesario,
        medidasDeSeguridad,
        fotoManual,
        codHerramienta,
        codUsuario,
        fechaCreacion) 
        VALUES ('$titulo',
        '$descripcionManual',
        '$equipoNecesario', 
        '$medidasSeguridad',
        '$fotoManual', 
        '$codHerramienta', 
        '$codUsuario', 
        '$fecha');
        ";
        $conexion->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        $insertarBDcompletado = false;
    }
    $conexion = null;
    if ($insertarBDcompletado) {
        /* guardar en $_SESSION["codManualSeleccionado"] el cod de la herramienta  */
        comprobacionesEnBD("obtenerCodManual", $titulo);
    }
    return $insertarBDcompletado;
}
/* si codManualSeleccionado==tituloUnique: devolver un count con los manuales con el mismo título en la BD 
i codManualSeleccionado==obtenerCodManual: guardar en $_SESSION["codManualSeleccionado"] el cod de la herramienta */
function comprobacionesEnBD($tipoComprobacion, $dato)
{
    global $servidor;
    global $user;
    global $pass;

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $user, $pass);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($tipoComprobacion == "tituloUnique") {
            $sql = "SELECT COUNT(codManual)
            from manual
            WHERE nombreManual like'$dato'";

            $resultado = $conexion->query($sql);
            $tituloManual = $resultado->fetchAll();
        } elseif ($tipoComprobacion == "obtenerCodManual") {
            $sql = "SELECT codManual
            FROM manual
            WHERE nombreManual like '$dato'";

            $resultado = $conexion->query($sql);
            $codManual = $resultado->fetchAll();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    if ($tipoComprobacion == "tituloUnique") {
        return $tituloManual[0]["COUNT(codManual)"];
    } elseif ($tipoComprobacion == "obtenerCodManual") {
        $_SESSION["codManualSeleccionado"] = $codManual[0]["codManual"];
    }
}

/* devuelve la fecha del día de creación del manual */
function fechaDeHoy()
{
    return date("Y-m-d");
}

function imagenManual()
{
    $check = getimagesize($_FILES["classInputFileIMG"]["tmp_name"]);
    if ($check !== false) {
        $image = $_FILES['classInputFileIMG']['tmp_name'];
        $fotoManual = addslashes(file_get_contents($image));
    }
    return $fotoManual;
}

/* devuelve un objeto manual */
function crearObjetoManual()
{
    $manual1 = new Manual(
        strtolower(validarDato($_POST["nombreManual"])), //devuelve el título en minúscula
        validarDato($_POST["descripcionManual"]),
        validarDato($_POST["herramientasNecesarias"]),
        validarDato($_POST["medidasSeguridad"]),
        $_FILES["classInputFileIMG"]["name"],
        $_SESSION["codHerramientaSeleccionada"],
        $_SESSION["codUsuario"],
        fechaDeHoy()
    );
    return $manual1;
}

/*comprueba que tods los datos se han introducido */
function comprobarSiSeHanIntroducidoTodosLosDatos()
{
    $error = false;
    $mensajeErrorFaltanDatos = "Por favor, introduzca: <br>";
    if (strlen($_POST["nombreManual"]) == 0) {
        $error = true;
        $mensajeErrorFaltanDatos .= "el título <br>";
    }
    if (strlen($_POST["descripcionManual"]) == 0) {
        $error = true;
        $mensajeErrorFaltanDatos .= "la descripción <br>";
    }
    if (strlen($_POST["herramientasNecesarias"]) == 0) {
        $error = true;
        $mensajeErrorFaltanDatos .= "el equipo o herramientas necesarias <br>";
    }
    if (strlen($_POST["medidasSeguridad"]) == 0) {
        $error = true;
        $mensajeErrorFaltanDatos .= "medidas de seguridad necesarias <br>";
    }
    if (empty($_FILES['classInputFileIMG']['name'])) {
        $error = true;
        $mensajeErrorFaltanDatos .= "una imagen para el manual <br>";
    }
    if (empty($_SESSION["codHerramientaSeleccionada"])) {
        $error = true;
        $mensajeErrorFaltanDatos .= "error al leer el código de herramienta <br>";
    }
    if (empty($_SESSION["codUsuario"])) {
        $error = true;
        $mensajeErrorFaltanDatos .= "error al leer el código de usuario <br>";
    }
    if ($error == false) {
        $mensajeErrorFaltanDatos = "";
    }
    return $mensajeErrorFaltanDatos;
}

/* comprueba el largo de los atributos según largo en la BD*/
function comprobarLargoDeAtributosIntroducidos($manual)
{
    $error = false;
    $mensajeErrorFaltanDatos = "Atención: atributo demasiado largo: <br>";
    if (strlen($manual->getTituloManual()) > 150) {
        $error = true;
        $mensajeErrorFaltanDatos .= "el título <br>";
    }
    if (strlen($manual->getDescripcionManual()) > 350) {
        $error = true;
        $mensajeErrorFaltanDatos .= "la descripción <br>";
    }
    if (strlen($manual->getEquipoNecesario()) > 250) {
        $error = true;
        $mensajeErrorFaltanDatos .= "el equipo o herramientas necesarias <br>";
    }
    if (strlen($manual->getMedidasDeSeguridad()) > 250) {
        $error = true;
        $mensajeErrorFaltanDatos .= "medidas de seguridad necesarias <br>";
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
