<?php
$servidor  = "localhost";
$usuario = "root";
$password = "";



try {
    $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlherramienta = "SELECT codHerramienta, nombreHerramienta, categoria, fotoHerramienta 
    FROM herramienta";

    $resultadoHerramienta = $conexion->query($sqlherramienta);
    $datosHerramienta = $resultadoHerramienta->fetchAll();

    $sqlherramientaususario = "SELECT herramienta.codHerramienta, nombreHerramienta, categoria, fotoHerramienta FROM herramienta, manual, usuario WHERE herramienta.codHerramienta=manual.codHerramienta && manual.codUsuario=usuario.codUsuario";

    $misherramientas = $conexion->query($sqlherramientaususario);
    $datosMisHerramienta = $misherramientas->fetchAll();

    $sqlcategoriaherramienta = "SELECT codHerramienta, nombreHerramienta, categoria, fotoHerramienta
    FROM herramienta ";/*WHERE categoria=$categoria*/

    $categoriaherramienta = $conexion->query($sqlcategoriaherramienta);
    $datosCategoria = $categoriaherramienta->fetchAll();

    //Prepare PDO SQL
    $sqlimagen = $conexion->prepare("SELECT fotoHerramienta FROM herramienta WHERE codHerramienta='1'");

    //Do the db query

    if ($sqlimagen) {
        $sqlimagen->execute();

        //Get the content of the record into $row
        $row = $sqlimagen->fetch(PDO::FETCH_ASSOC); //Everything with id=$id should be in record buffer

        $image = $row['fotoHerramienta'];

        $imagen = 'src="data:image/jpeg;base64,' . base64_encode($row['fotoHerramienta']) . '"';
    } else {
        echo "No image found";
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}
$conexion = null;
