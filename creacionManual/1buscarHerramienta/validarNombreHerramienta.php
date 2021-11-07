<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["herramienta"])){
        $_SESSION['nombreHerramientaSeleccionada']=validarDatos($_POST["herramienta"]);
        echo "herramienta seleccionada: ".$_SESSION['nombreHerramientaSeleccionada'];
    }else{
        echo "error";
    }
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