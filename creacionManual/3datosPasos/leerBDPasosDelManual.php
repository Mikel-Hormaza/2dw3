<?php
session_start();

$datosManual;
$datosPasos;

if(!empty($_SESSION["codManualSeleccionado"])){
    $codManualSeleccionado=$_SESSION["codManualSeleccionado"];
    llamarBD();
    mostrarPasos();
}else{
    $_SESSION["codManualSeleccionado"]=5; #parche
}

function llamarBD(){
    $servidor  = "localhost";
    $usuario = "root";
    $password = "";
    global $codManualSeleccionado;
    global $datosManual;
    global $datosPasos;
    
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);
    
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sqlManual = "SELECT codManual, nombreManual, informacionManual, equipoNecesario, medidasDeSeguridad, fotoManual, fechaCreacion, nomUsuario 
        FROM manual, usuario 
        WHERE manual.codManual like $codManualSeleccionado
        && manual.codUsuario like usuario.codUsuario";
    
        $sqlPasos = "SELECT tituloPaso, descripcionPaso, fotoPaso 
        FROM paso
        WHERE codManual like $codManualSeleccionado";
    
        $resultadoManual = $conexion->query($sqlManual);
        $datosManual = $resultadoManual->fetchAll();
    
        $resultadoPasos = $conexion->query($sqlPasos);
        $datosPasos = $resultadoPasos->fetchAll();
    } catch (PDOException $e) {
        echo $sqlManual . "<br>" . $e->getMessage();
    }
    
    $conexion = null;
    
}

function mostrarPasos(){
    global $datosPasos;
    if(!empty($_SESSION["codManualSeleccionado"])){
        $numPaso = 0;
        foreach ($datosPasos as $paso) {
        ?>
            <div class="paso">
                <div>
                    <?php $numPaso++; ?>
                    <h3 class="pasoTitulo">Paso <?php echo $numPaso ?></h3>
                    <p><?php echo $paso["tituloPaso"] ?></p>
                </div>
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($paso["fotoPaso"]).'"/>' ?>
                <p><?php echo $paso["descripcionPaso"] ?></p>
            </div>
        <?php
        }
    }
}

?>