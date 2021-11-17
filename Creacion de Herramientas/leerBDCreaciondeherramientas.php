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
    $sqlCategoria = "SELECT categoria
    FROM herramienta
    GROUP BY categoria"
    ;

    $resultadoCategoria = $conexion->query($sqlCategoria);
    $datosCategoria = $resultadoCategoria->fetchAll();
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<?php

session_start();
require_once 'CreacionHerramienta.php';

//Conexion con localhost
$servidor  = "localhost";
$usuario = "root";
$password = "";

if($_SERVER ["REQUEST_METHOD"] == "POST") {
    //validarDatosCreacionHerramienta();
}

function validarDatosCreacionHerramienta() {
    if(strlen(ComprobarIntroduccionDeDatosHerramienta()) > 1) {
        echo ComprobarIntroduccionDeDatosHerramienta();
    } else {
        if (strlen(comprobarLarguraDeLasHerramientas(crearObjetoHerramienta())) > 1) {
            echo comprobarLarguraDeLasHerramientas(crearObjetoHerramienta());
        } else {
            insertarHerramientaBD(crearObjetoHerramienta());
        }
    }
}

function crearObjetoHerramienta() {
    $nombreHerra = $_POST['nombre'];
    $categoriaH = $_POST['categoria'];
    $fotoHerramienta = $_POST['classInputFileIMG'];

    if(isset($_POST['button'])) {
    if(!empty($_POST['categoria'])) {
        foreach($_POST['categoria'] as $selected){
            echo ' ' . $selected; 
            var_dump($selected);
        }
    } else {
        echo 'Error';
    }
    }

    $Herramienta1 = new Creacion($nombreHerra, $categoriaH, $fotoHerramienta);
    return $Herramienta1;
}

function imagenHerramienta() {
    $check = getimagesize($_FILES["classInputFileIMG"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['classInputFileIMG']['tmp_name'];
        $fotoHerramienta = addslashes(file_get_contents($image));
    }
    return $fotoHerramienta;
}

function ComprobarIntroduccionDeDatosHerramienta() {

    $nombreHerra = $_POST['nombre'];
    $categoriaH = $_POST['categoria'];
    $fotoHerramienta = $_POST['classInputFileIMG'];

    $error = false;
    $mensajeError = "Por favor, introduce: <br>";
 
    if (strlen($nombreHerra) == 0) {
        $error = true;
        $mensajeError .= "el nombre <br>";
    }
    if (strlen($categoriaH) == 0) {
        $error = true;
        $mensajeError .= "el categoria <br>";
    }
    if (strlen($fotoHerramienta) == 0) {
        $error = true;
        $mensajeError .= "la imagen <br>";
    }
    if ($error == false) {
        $mensajeError = "";
    }
    return $mensajeError;
}

function comprobarLarguraDeLasHerramientas($Herramienta) {
 
    $error = false;
    $mensajeError = "Los siguientes atributos son demasiado largos: <br>";
 
    if (strlen($Herramienta->getNombreHerramienta())>40) {
        $error = true;
        $mensajeError .= "Nombre <br>";
    }
    if ($error == false) {
        $mensajeError = "";
    }
 
     return $mensajeError;
}


function insertarHerramientaBD($Herramienta) {
    
    global $servidor;
    global $usuario;
    global $password;

    $nombreHerra = $Herramienta->getNombreHerramienta();
    $categoriaH = $Herramienta->getCategoria();
    $fotoHerramienta = imagenHerramienta();
    

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO herramienta (nombreHerramienta,
        categoria,
        fotoHerramienta) 

        VALUES ('$nombreHerra',
        '$categoriaH',
        '$fotoHerramienta');";

        $conexion->exec($sql);
        echo "Nuevo registro." . "<br>" . "Herramienta " .$nombreHerra. " creado correctamente.";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        
    }
    $conexion = null;
}

foreach ($datosCategoria as $categoria) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['nombre'] = $_REQUEST['nombre'];
        $_SESSION['categoria'] = $_REQUEST['categoria'];

        header('Location: ../Creacion de Herramientas/CreaciondeHerramientas.php');
        die();
    }
}

?>
