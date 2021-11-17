<?php
//Conexion con localhost
$servidor  = "localhost";
$usuario = "root";
$password = "";



$error = "";
$errorpass = "";
$errorinicio = "";
try {
    //Conexion con la base de datos fixpoint
    $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Select para coger la informacion de la base de datos
    $sqlUsuario = "SELECT codUsuario, nomUsuario, passUsuario, permisoUsuario
    FROM usuario";

    $resultadoUsuario = $conexion->query($sqlUsuario);
    $datosUsuario = $resultadoUsuario->fetchAll();
} catch (PDOException $e) {
    echo $e->getMessage();
}

foreach ($datosUsuario as $usuarios) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombreUsuario = $usuarios['nomUsuario'];
            $Contrasena = $usuarios['passUsuario'];
            $codUsuario= $usuarios['codUsuario'];
            $permiso= $usuarios['permisoUsuario'];
            
            if (empty($_POST["NombredeUsuario"])) {
                $error = "Escriba un nombre de usuario";
                
            
            } elseif (empty($_POST["Contrasena"])) {
                $errorpass = "Escriba una contrasena";
               
            } else {
                $nombre = isset($_REQUEST['NombredeUsuario']) ? $_REQUEST['NombredeUsuario'] : null;
                $pass = isset($_REQUEST['Contrasena']) ? $_REQUEST['Contrasena'] : null;

                if ($nombreUsuario == $nombre && $Contrasena == $pass) {
                    session_start();
                    $_SESSION['NombredeUsuario'] = $_REQUEST['NombredeUsuario'];
                    $_SESSION['codUsuario']=$codUsuario;
                    $_SESSION['permisoUsuario'] = $_REQUEST['permisoUsuario'];
                    $_SESSION['permisoUsuario']=$permiso;

                    header('Location: ../gestionHerramientas/gestionHerramientas.php');
                    die();
                } else {
                    $errorinicio = "Nombre de usuario o contrasena erroneos";
                    echo "<script type='text/javascript'>alert('$errorinicio');</script>";
                }
            }
        }
    

}

$conexion = null;
?>