<?php
$db_host = "localhost";
$u_name = "root";
$u_pass = "";
$db_name = "fixpoint";
$conn = new PDO("mysql:host=$db_host;dbname=$db_name", $u_name, $u_pass);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Prepare PDO SQL
$sql = $conn->prepare("SELECT fotoHerramienta FROM herramienta WHERE codHerramienta='1'");

//Do the db query

if ($sql) {
    $sql->execute();

    //Get the content of the record into $row
    $row = $sql->fetch(PDO::FETCH_ASSOC); //Everything with id=$id should be in record buffer

    $image = $row['fotoHerramienta'];

    echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['fotoHerramienta'] ).'"/>';
} else {
    echo "No image found";
}
?>
