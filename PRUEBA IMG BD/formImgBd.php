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
         
        //----------------------------------------------------------------------------------------------------------------//

        /*$insert = $db->query("INSERT into herramienta (nombreHerramienta, categoria, fotoHerramienta) 
        VALUES ('Alicates', 'herramienta taller', '$imgContent')");*/
        
        /*$insert = $db->query("INSERT into manual (nombreManual, informacionManual, equipoNecesario, medidasDeSeguridad, fotoManual, codHerramienta, codUsuario, fechaCreacion)
        VALUES ('Como desmontar un PC', 'En este manual vamos a explicar como abrirlo','destornillador', 'Dispositivo apagado', '$imgContent', '3', '1', '2021-11-27')");*/

        /*$insert = $db->query("INSERT into paso (tituloPaso, descripcionPaso, fotoPaso, codManual) 
        VALUES ('Quinto paso', 'Utiliza unas pinzas para este paso', '$imgContent', '4')");*/

        //---------------------------------------------------------------------------------------------------------------//

        //$update = $db->query("UPDATE herramienta SET fotoHerramienta='$imgContent' WHERE codHerramienta='1';");
        //$update = $db->query("UPDATE herramienta SET fotoHerramienta='$imgContent' WHERE codHerramienta='2';");
        //$update = $db->query("UPDATE herramienta SET fotoHerramienta='$imgContent' WHERE codHerramienta='3';");


        //$update = $db->query("UPDATE manual SET fotoManual='$imgContent' WHERE codManual='2';");

        //$update = $db->query("UPDATE paso SET fotoPaso='$imgContent' WHERE codPaso='5';");

        if($update){
            echo "Insertado con éxito";
        }else{
            echo "Fallo al insertar";
        }
    }else{
        echo "Por favor, selecciona archivo para insertar";
    }
}
?>
