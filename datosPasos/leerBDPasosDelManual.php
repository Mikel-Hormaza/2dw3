<?php
session_start();
$datosManual;
$datosPasos;

$_SESSION["codManualSeleccionado"]=1; #parche
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
        WHERE codManual like $codManualSeleccionado && estadoPaso like 'visible'";

        $resultadoManual = $conexion->query($sqlManual);
        $datosManual = $resultadoManual->fetchAll();

        $resultadoPasos = $conexion->query($sqlPasos);
        $datosPasos = $resultadoPasos->fetchAll();
    } catch (PDOException $e) {
        echo $sqlManual . "<br>" . $e->getMessage();
    }

    $conexion = null;

    if (!empty($datosPasos)) {
        guardarCodigosEnSesion($datosPasos);
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
        <!-- añado como id del paso su código de paso en la BD -->
        <div class="paso paso<?php echo $numPaso + 1; ?>" id="paso<?php echo $paso["codPaso"]; ?>">
            <div>
                <?php $numPaso++; ?>
                <h3 class="pasoTitulo">Paso <?php echo $numPaso ?></h3>
                <p><?php echo $paso["tituloPaso"] ?></p>
            </div>
            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($paso["fotoPaso"]) . '"/>' ?>
            <p class="descripcionPaso"><?php echo $paso["descripcionPaso"] ?></p>
        </div>
    <?php
    }
}

/* guardamos los códigos de los pasos en un array en session. De esta forma
al clicar en un paso, antes de mostrar su contenido en el formulario de crearPaso
comprobamos si su código existe en la BD */
function guardarCodigosEnSesion($datosPasos)
{
    $pos = -1;
    $codigosDeLosPasosDelManual = array();
    foreach ($datosPasos as $datosPaso) {
        $pos++;
        array_push($codigosDeLosPasosDelManual, $datosPasos[$pos][0]);
    }
    $_SESSION['codigosDeLosPasosDelManual'] = $codigosDeLosPasosDelManual;
}


/* comprueba si el código de paso seleccionado existe en la BD. 
Si existe, mostrar los datos en el formulario de crearPaso */
function comprobarCodSeleccionadoExisteEnLaBD($codDePaso)
{
    if (in_array($codDePaso, $_SESSION['codigosDeLosPasosDelManual'])) {
        return true;
    } else {
        echo "not ok";
        return false;
    }
}


?>