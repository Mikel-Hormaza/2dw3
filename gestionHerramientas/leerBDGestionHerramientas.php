<?php
//Conexion con localhost
$servidor  = "localhost";
$usuario = "root";
$password = "";



try {
    //Conexion con nuestra base de datos de fixpoint
    $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Select para coger la informacion de las herramientas
    $sqlherramienta = "SELECT codHerramienta, nombreHerramienta, categoria, fotoHerramienta 
    FROM herramienta";

    $resultadoHerramienta = $conexion->query($sqlherramienta);
    $datosHerramienta = $resultadoHerramienta->fetchAll();

    //Select para coger la informacion de las herramientas segun el usuario
    $sqlherramientaususario = "SELECT herramienta.codHerramienta, nombreHerramienta, categoria, fotoHerramienta FROM herramienta, manual, usuario WHERE herramienta.codHerramienta=manual.codHerramienta && manual.codUsuario=usuario.codUsuario";

    $misherramientas = $conexion->query($sqlherramientaususario);
    $datosMisHerramienta = $misherramientas->fetchAll();

    //Select para coger la informacion de las herramientas segun la categoria seleccionada
    $sqlcategoriaherramienta = "SELECT codHerramienta, nombreHerramienta, categoria, fotoHerramienta
    FROM herramienta ";/*WHERE categoria=$categoria*/

    $categoriaherramienta = $conexion->query($sqlcategoriaherramienta);
    $datosCategoria = $categoriaherramienta->fetchAll();

    //Preparar PDO SQL
    $sqlimagen = $conexion->prepare("SELECT fotoHerramienta FROM herramienta WHERE codHerramienta='1'");

    //Hacer la consulta db

    if ($sqlimagen) {
        $sqlimagen->execute();

        //Coge el contenido del registro dentro de $row
        $row = $sqlimagen->fetch(PDO::FETCH_ASSOC); //Todo con id = $id debe estar en el búfer de registro

        $image = $row['fotoHerramienta'];

        $imagen = 'src="data:image/jpeg;base64,' . base64_encode($row['fotoHerramienta']) . '"';
    } else {
        echo "No image found";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
foreach ($datosHerramienta as $herramienta) {
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codherramienta = $herramineta['codHerramienta'];

        session_start();
        $_SESSION[$herramineta['codHerramienta']] = $_REQUEST[$herramineta['codHerramienta']];

        header('Location: ../gestionHerramientas/gestionHerramientas.php');
        die(); 

}
}
$conexion = null;
