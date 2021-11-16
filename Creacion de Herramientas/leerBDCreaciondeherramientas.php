<?php
//Conexion con localhost
$servidor  = "localhost";
$usuario = "root";
$password = "";

try {
    //Conexion con la base de datos fixpoint
    $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["submit"])){
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false){
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
    
            //detalles BD
            $dbHost     = 'localhost';
            $dbUsername = 'root';
            $dbPassword = '';
            $dbName     = 'fixpoint';
            
            //Create connection and select DB
            $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

            $insert = $db->query("INSERT into herramienta (nombreHerramienta, categoria, fotoHerramienta) 
            VALUES ('Alicates', 'herramienta taller', '$imgContent')");
        }if($insert){
            echo "Insertado con éxito";
        }else{
            echo "Fallo al insertar";
        }
    }
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
