<?php
session_start();
$datosManual;
$datosPasos;

$_SESSION["codManualSeleccionado"] = 5; #parche
$codManualSeleccionado = $_SESSION["codManualSeleccionado"];

function llamarBD()
{
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

        $sqlPasos = "SELECT codPaso, tituloPaso, descripcionPaso, fotoPaso 
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

    if (!empty($datosPasos)) {
        return true;
    } else {
        return false;
    }
}

/*Muestra los pasos del manual */
function mostrarPasos($datosPasos)
{
    $numPaso = 0;
    foreach ($datosPasos as $paso) {
?>
        <div class="paso">
            <div>
                <?php $numPaso++; ?>
                <h3 class="pasoTitulo">Paso <?php echo $numPaso ?></h3>
                <p><?php echo $paso["tituloPaso"] ?></p>
            </div>
            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($paso["fotoPaso"]) . '"/>' ?>
            <p><?php echo $paso["descripcionPaso"] ?></p>
            <span><?php echo $paso["codPaso"] ?></span>
        </div>
<?php
    }
}

?>