<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["herramienta"])) {
        obtenerCodHerramienta(validarDatos($_POST["herramienta"]));
    } else {
        echo "error";
    }
}

function obtenerCodHerramienta($nombreHerramienta)
{
    $servidor  = "localhost";
    $user = "root";
    $pass = "";
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $user, $pass);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT codHerramienta
        FROM herramienta
        WHERE nombreHerramienta like '$nombreHerramienta'";

        $resultado = $conexion->query($sql);
        $codHerramienta = $resultado->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $_SESSION["codHerramientaSeleccionada"] = $codHerramienta[0]["codHerramienta"];
}

function validarDatos($dato)
{
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

header('Location: ../2datosManual/datosManual.php');
die();
?>