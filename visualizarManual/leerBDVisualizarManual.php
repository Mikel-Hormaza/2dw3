<?php
$servidor  = "localhost";
$usuario = "root";
$password = "";

/* <!-- 
AQUÍ PASAR COMO SESSION EL COD DE MANUAL?
 --> */
$_SESSION['codManualSeleccionado'] = 2;
$codManualSeleccionado = $_SESSION['codManualSeleccionado'];

/*Conectar con la BD y leer los datos del manual y sus pasos*/
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

// $largo = strlen($datosManual[0]["informacionManual"]);
$informacionManual = $datosManual[0]["informacionManual"];
$equipoNecesario = $datosManual[0]["equipoNecesario"];
$medidasDeSeguridad = $datosManual[0]["medidasDeSeguridad"];


function mostrarBotonMostrar($texto, $tipoDeDato) 
{
    $textoProcesado = decidirSiRecortar($texto);

    if ( ! is_array($textoProcesado)) {
        imprimirTextoEntero($texto);
    }
    else {
        imprimirTextoATrozos($textoProcesado, $tipoDeDato);
    }
}

function decidirSiRecortar($texto) 
{
    $lengthMax = 200;
    if ( strlen($texto) < $lengthMax) {
       echo $texto;
       return  $texto;
    }
    else {
       return textoATrozos($texto);
        
    }
}

function textoATrozos($texto) 
{
    // $primerTrozo = stristr($texto, ". ", 1);
    // if (!empty($primerTrozo))
    // {
    //     $segundoTrozo = stristr($texto, ". ", 0);
    //     return array ($primerTrozo, $segundoTrozo);
    // }
    // else // a lo bestia
    // {
        $primerTrozo = substr($texto, 0, 200);
        $segundoTrozo = substr($texto, strlen($primerTrozo));
        echo "<br> PRIMER TROZO ".$primerTrozo;
        echo "<br> PRIMER2 TROZO ".$segundoTrozo;
        return array ($primerTrozo, $segundoTrozo);

    // }
}

function imprimirTextoATrozos($arrayDeTexto, $tipoDeDato)
{
    switch ($tipoDeDato) {
        case 1:
    ?>
            <p><?php echo $arrayDeTexto[0] ?>
                <span id="puntos">...</span><span id="mas"><?php echo $arrayDeTexto[1]  ?></span>
                <button id="botonLeerMas">Mostrar</button>
            </p><?php
                break;
            case 2:
                ?>
            <p><?php echo $arrayDeTexto[0]  ?>
                <span id="puntosEquipo">...</span><span id="masEquipo"><?php echo $arrayDeTexto[1]  ?></span>
                <br>
                <button id="botonLeerMasEquipo">Mostrar</button>
            </p>
        <?php
                break;
            case 3:
        ?>
            <p><?php echo $arrayDeTexto[0]  ?>
                <span id="puntosSeguridad">...</span><span id="masSeguridad"><?php echo $arrayDeTexto[1]  ?>
                </span> <br><button id="botonLeerMasSeguridad">Mostrar</button>
            </p>
<?php
                break;
        }
}

function imprimirTextoEntero($texto)
{ ?>
    <p><?php $texto ?></p>
    <?php
}

function textoCortado($texto, $tipoDeDato)
{
    /*cortar a los X caracteres en vez de con un punto porque si no hay punto...*/
    $primero = stristr($texto, ". ", 1);
    $segundo = stristr($texto, ". ", 0);

    switch ($tipoDeDato) {
        case 1:
    ?>
            <p><?php echo $primero ?>
                <span id="puntos">...</span><span id="mas"><?php echo $segundo ?></span>
                <br>
                <button id="botonLeerMas">Mostrar</button>
            </p><?php
                break;
            case 2:
                ?>
            <p><?php echo $primero ?>
                <span id="puntosEquipo">...</span><span id="masEquipo"><?php echo $segundo ?></span>
                <br>
                <button id="botonLeerMasEquipo">Mostrar</button>
            </p>
        <?php
                break;
            case 3:
        ?>
            <p><?php echo $primero ?>
                <span id="puntosSeguridad">...</span><span id="masSeguridad"><?php echo $segundo ?>
                </span> <br><button id="botonLeerMasSeguridad">Mostrar</button>
            </p>
<?php
                break;
        }
    }

?>