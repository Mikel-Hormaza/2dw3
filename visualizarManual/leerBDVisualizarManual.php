<?php
$servidor  = "localhost";
$usuario= "root";
$password="";

/* <!-- 
AQUÍ PASAR COMO SESSION EL COD DE MANUAL?
 --> */
 $_SESSION['codManualSeleccionado']=2;
 $codManualSeleccionado=$_SESSION['codManualSeleccionado'];

try{
    $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint",$usuario, $password);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlManual = "SELECT codManual, nombreManual, informacionManual, equipoNecesario, medidasDeSeguridad, fotoManual, fechaCreacion, nomUsuario 
    FROM manual, usuario 
    WHERE manual.codManual like $codManualSeleccionado
    && manual.codUsuario like usuario.codUsuario";

    $sqlPasos="SELECT tituloPaso, descripcionPaso, fotoPaso 
    FROM paso
    WHERE codManual like $codManualSeleccionado";
    
    $resultadoManual=$conexion->query($sqlManual);
    $datosManual = $resultadoManual->fetchAll();

    $resultadoPasos=$conexion->query($sqlPasos);
    $datosPasos = $resultadoPasos->fetchAll();

}catch(PDOException $e){
    echo $sqlManual. "<br>" . $e->getMessage();
}

$conexion=null;
