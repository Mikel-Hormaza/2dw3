<?php
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
         
        //--------------------------------------------------------------------------------------------------------//

        $insert = $db->query("INSERT into herramienta (nombreHerramienta, categoria, fotoHerramienta) VALUES ('Alicates', 'herramienta taller', '$imgContent')");
        
        //--------------------------------------------------------------------------------------------------------//

        //$update = $db->query("UPDATE herramienta SET fotoHerramienta=$imgContent WHERE nombreHerramienta='Destornillador'");

        if($insert){
            echo "Imágen insertada con éxito";
        }else{
            echo "Fallo al insertar imágen";
        }
    }else{
        echo "Por favor, selecciona archivo para insertar";
    }
}
?>
