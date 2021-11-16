<?php
//Conexion con localhost
$servidor  = "localhost";
$usuario = "root";
$password = "";
session_start();
$codUsuario = $_SESSION['codUsuario'];
$permiso = $_SESSION['permisoUsuario'];


try {
    //Conexion con nuestra base de datos de fixpoint
    $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Select para coger la informacion de las herramientas
    $sqlherramienta = $conexion->prepare("SELECT codHerramienta, nombreHerramienta, categoria, fotoHerramienta 
    FROM herramienta");

    //Hacer la consulta db

    if ($sqlherramienta) {
        $sqlherramienta->execute();

        //Coge el contenido del registro dentro de $row
        $row = $sqlherramienta->fetch(PDO::FETCH_ASSOC); //Todo con id = $id debe estar en el búfer de registro

        $image = $row['fotoHerramienta'];

        $imagen = 'src="data:image/jpeg;base64,' . base64_encode($row['fotoHerramienta']) . '"';
    } else {
        echo "Imagen no encontrada";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
$conexion = null;
/*foreach ($sqlherramienta as $herramienta) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $codherramienta = $herramineta['codHerramienta'];

        session_start();
        $_SESSION['codHerramienta']=$codherramienta;

        header('Location: ../gestionHerramientas/gestionHerramientas.php');
        die();
    }
}*/

