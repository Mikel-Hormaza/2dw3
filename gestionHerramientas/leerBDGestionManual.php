<?php
$servidor  = "localhost";
$usuario = "root";
$password = "";



try {
    $konexioa = new PDO("mysql:host=$servidor;dbname=fixpoint",$usuario, $password);
    $konexioa->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlherramienta="SELECT nombreHerramienta, categoria, fotoHerramienta 
    FROM herramienta";

$resultadoHerramienta = $conexion->query($sqlherramienta);
$datosHerramienta = $resultadoHerramienta->fetchAll();


}catch (PDOException $e){
    echo $sqlherramienta."<br>" .$e->getMessage();

}
$konexioa=null;
?>