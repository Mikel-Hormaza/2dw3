<?php
//Conexion con localhost
$servidor  = "localhost";
$usuario = "root";
$password = "";


$error=$errorpass="";
$errorinicio="";
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
foreach ($datosUsuario as $usuarios) {
if(isset($_POST['InicioSesion'])) {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombreUsuario= $usuarios['nomUsuario'];
        $Contraseña= $usuarios['passUsuario'];
        if(empty($_POST["NombredeUsuario"])){
            $error= "Escriba un nombre de usuario"; 
         }elseif(empty($_POST["Contraseña"])){
            $errorpass="Escriba una contraseña";
         }else{
        $nombre= isset($_REQUEST['NombredeUsuario'])? $_REQUEST['NombredeUsuario'] : null;
        $pass= isset($_REQUEST['Contraseña'])? $_REQUEST['Contraseña'] : null;
        
        if($nombreUsuario == $nombre && $Contraseña == $pass){
            session_start();
            $_SESSION['NombredeUsuario'] = $_REQUEST['NombredeUsuario'];
          
            header('Location: ../Inicio de sesion/Login.php');
            die();
        }else{
           $errorinicio="Nombre de usuario o contraseña erroneos";
        }
    }
    }
}
}

$conexion = null;
