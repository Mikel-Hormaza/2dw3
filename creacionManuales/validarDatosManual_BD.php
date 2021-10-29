<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
}

function validarDatos($dato)
{
    $dato = trim($dato); //eliminar espacios en blanco al principio y al fnal
    $dato = stripslashes($dato); //eliminar contrabarras
    $dato = htmlspecialchars($dato); //eliminar caracteres html
    return $dato;
}
