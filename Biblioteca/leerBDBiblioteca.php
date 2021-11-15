<?php
//Conexion con localhost
$servidor  = "localhost";
$usuario = "root";
$password = "";

try {
    //Conexion con la base de datos fixpoint
    $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Select para coger la informacion de la base de datos
    $sqlBiblioteca = "SELECT codManual, nombreHerramienta, fotoHerramienta
    FROM manual,herramienta WHERE manual.codHerramienta=herramienta.codHerramienta";

    $resultadoBiblioteca = $conexion->query($sqlBiblioteca);
    $datosBiblioteca = $resultadoBiblioteca->fetchAll();

    
    $sqlimagen = $conexion->prepare("SELECT fotoHerramienta FROM herramienta,manual WHERE codManual='1' && manual.codHerramienta=herramienta.codHerramienta");

    //Hacer la consulta db

    if ($sqlimagen) {
        $sqlimagen->execute();

        //Coge el contenido del registro dentro de $row
        $row = $sqlimagen->fetch(PDO::FETCH_ASSOC); //Todo con id = $id debe estar en el búfer de registro

        $image = $row['fotoHerramienta'];

        $imagen = 'src="data:image/jpeg;base64,' . base64_encode($row['fotoHerramienta']) . '"';
    } else {
        echo "Imagen no encontrada";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}


?>