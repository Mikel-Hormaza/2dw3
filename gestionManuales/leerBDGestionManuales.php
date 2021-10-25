<?php
$servidor  = "localhost";
$usuario = "root";
$password = "";

/* <!-- 
AQUÍ PASAR COMO SESSION EL COD DE MANUAL?
 --> */


try {
    $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlManuales = "SELECT codManual, nombreManual, fotoManual, manual.codHerramienta, nombreHerramienta
    FROM manual,herramienta
    WHERE manual.codHerramienta like herramienta.codHerramienta 
    ORDER BY fechaCreacion
    LIMIT 0, 4";


    $resultadoManuales = $conexion->query($sqlManuales);
    $datosManuales = $resultadoManuales->fetchAll();

    echo ("<br> DATOS MANUALES: <br>");
    var_dump($datosManuales);

    echo "<table border=2>";
    foreach ($datosManuales as $manual) {
        echo "<tr>";
        echo "<td>" . $manual["codManual"] . "</td>" . "<td>" . " Nombre Manual: " . $manual["nombreManual"] . "</td>" . "<td>" . " Nombre herraminta: " . $manual["nombreHerramienta"] . "</td>";
        echo "</tr>";
    }
    echo "</table>"; 


} catch (PDOException $e) {
    echo $sqlManuales . "<br>" . $e->getMessage();
}

$conexion = null;
