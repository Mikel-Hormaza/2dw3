<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    limitesFuncion();
}

function limitesFuncion()
{
    if (isset($_POST['siguiente'])) {
        echo "<br> siguiente";
        noAvanzar();
    }
    if (isset($_POST['ultimo'])) {
        echo "<br> ultimo";
        noAvanzar();
    }
}

function noAvanzar()
{
    if ($_COOKIE['codigoDelUltimoManualDeLaTabla'] !== $_COOKIE['codigoDelUltimoManualDeLaTablaMostrado']) {
        echo "<br>son desiguales";
/*         $_SESSION['primeraVariableLimit'] += 8;
        header('Location: gestionManuales.php');
        die(); */
    }
}
