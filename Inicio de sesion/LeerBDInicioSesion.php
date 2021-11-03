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
    $sqlUsuario = "SELECT nomUsuario, passUsuario 
    FROM usuario";

    $resultadoUsuario = $conexion->query($sqlUsuario);
    $datosUsuario = $resultadoUsuario->fetchAll();
} catch (PDOException $e) {
    echo $e->getMessage();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombreUsuario= $datosUsuario['nomUsuario'];
    $Contraseña= $datosUsuario['passUsuario'];

    $nombre= isset($_REQUEST['NombredeUsuario'])? $_REQUEST['NombredeUsuario'] : null;
    $pass= isset($_REQUEST['Contraseña'])? $_REQUEST['Contraseña'] : null;



    if($nombreUsuario == $nombre && $Contraseña == $pass){
        session_start();
        $_SESSION['NombredeUsuario'] = $_REQUEST['NombredeUsuario'];
      
        header('Location: ../Inicio de sesion/Login.php');
        die();
    }else{
        echo 'Nombre de usuario o contraseña erroneos';
    }
}

$conexion = null;


?>