<?php

session_start();
require_once 'Manual.php';
$_SESSION["codUsuario"] = 1;
$_SESSION["codHerramientaSeleccionada"] = 1; #parche

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    validarDatos();
}

function validarDatos()
{
    /*comprueba el largo del mensaje de error para saber si se han rellenado todos los campos*/
    if (strlen(comprobarSiSeHanIntroducidoTodosLosDatos()) > 1) {
        echo comprobarSiSeHanIntroducidoTodosLosDatos();
    } else {
        if (crearObjetoManual()->validarFotoManual()) {
            insertarManualBD(crearObjetoManual());
        } else {
            echo "foto not ok";
        }
    }
}

function insertarManualBD($manual)
{
    $servidor  = "localhost";
    $user = "root";
    $pass = "";

    $titulo = $manual->getTituloManual();
    $descripcionManual = $manual->getDescripcionManual();
    $equipoNecesario = $manual->getEquipoNecesario();
    $medidasSeguridad = $manual->getMedidasDeSeguridad();
    $fotoManual = addslashes(file_get_contents($manual->getFotoManual()));
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
    }

    $conexion = null;
}

function fechaDeHoy()
{
    return date("Y-m-d");
}

function crearObjetoManual()
{
    $manual1 = new Manual(
        validarDato($_POST["nombreManual"]),
        validarDato($_POST["descripcionManual"]),
        validarDato($_POST["herramientasNecesarias"]),
        validarDato($_POST["medidasSeguridad"]),
        validarDato($_POST["classInputFileIMG"]),
        $_SESSION["codHerramientaSeleccionada"],
        $_SESSION["codUsuario"],
        fechaDeHoy()
    );
    return $manual1;
}

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
    if (strlen($_POST["classInputFileIMG"]) == 0) {
        $error = true;
        $mensajeErrorFaltanDatos .= "una imagen para el manual <br>";
    }
    if (strlen($_SESSION["codHerramientaSeleccionada"]) == 0) {
        $error = true;
        $mensajeErrorFaltanDatos .= "error al leer el código de herramienta <br>";
    }
    if (strlen($_SESSION["codUsuario"]) == 0) {
        $error = true;
        $mensajeErrorFaltanDatos .= "error al leer el código de usuario <br>";
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
