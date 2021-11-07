<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo $_POST["nombreManual"];
/*     if(!empty($_POST["nombreManual"])){
        $_SESSION['nombreHerramientaSeleccionada']=validarDatos($_POST["herramienta"]);
        echo "herramienta seleccionada: ".$_SESSION['nombreHerramientaSeleccionada'];
    }*/
} 

function validarDatos($dato)
{
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

?>