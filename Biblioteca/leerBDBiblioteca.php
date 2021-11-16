<?php
session_start();

//Conexion con localhost
$servidor  = "localhost";
$usuario = "root";
$password = "";

try {
    //Conexion con la base de datos fixpoint
    $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Select para coger la informacion de la base de datos
    $sqlBiblioteca = $conexion->prepare("SELECT codManual, herramienta.codHerramienta, nombreHerramienta, fotoHerramienta
    FROM manual,herramienta
    WHERE herramienta.codHerramienta = manual.codHerramienta");

    //Hacer la consulta db

    if ($sqlBiblioteca) {
        $sqlBiblioteca->execute();

        //Coge el contenido del registro dentro de $row
        $row = $sqlBiblioteca->fetch(PDO::FETCH_ASSOC); //Todo con id = $id debe estar en el búfer de registro

        $image = $row['fotoHerramienta'];

        $imagen = 'src="data:image/jpeg;base64,' . base64_encode($row['fotoHerramienta']) . '"';
    } else {
        echo "Imagen no encontrada";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}


?>