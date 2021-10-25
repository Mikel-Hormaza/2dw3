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

//Utilizamos estas variables para llamar a mostrarBotonMostrar desde el PHP principal
$informacionManual = $datosManual[0]["informacionManual"];
$equipoNecesario = $datosManual[0]["equipoNecesario"];
$medidasDeSeguridad = $datosManual[0]["medidasDeSeguridad"];

/*Si textoProcesado en un string imprime el texto entero.
Sino, llama a imprimir en trozos (en texto en dos, botón "mostrar"...)*/
function mostrarBotonMostrar($texto, $tipoDeDato)
{
    $textoProcesado = decidirSiRecortar($texto);

    if (!is_array($textoProcesado)) {
        imprimirTextoEntero($texto);
    } else {
        imprimirTextoATrozos($textoProcesado, $tipoDeDato);
    }
}
/*Comprueba el largo del texto*/
function decidirSiRecortar($texto)
{
    $lengthMax = 200;
    /*Si el largo del texto es inferior a 200 caracteres devuelve el texto entero*/
    if (strlen($texto) < $lengthMax) {
        echo $texto;
        return  $texto;
    } else {
        /*Sino, devuelve un array con el primer y el segundo trozo del texto*/
        return textoATrozos($texto);
    }
}
/*Devuelve un array con el primer y el segundo trozo del texto*/
function textoATrozos($texto)
{
    $primerTrozo = substr($texto, 0, 200);
    $segundoTrozo = substr($texto, strlen($primerTrozo));
    return array($primerTrozo, $segundoTrozo);
}

function imprimirTextoATrozos($arrayDeTexto, $tipoDeDato)
{
    switch ($tipoDeDato) {
        case 1:
?>
            <div>
                <p><?php echo $arrayDeTexto[0]; ?><span id="puntos">...</span><span id="mas"><?php echo $arrayDeTexto[1]; ?></span></p>
                <button id="botonLeerMas">Mostrar</button>
            </div><?php
                    break;
                case 2:
                    ?>
            <p><?php echo $arrayDeTexto[0]; ?><span id="puntosEquipo">...</span><span id="masEquipo"><?php echo $arrayDeTexto[1]; ?></span></p>
            <button id="botonLeerMasEquipo">Mostrar</button>
        <?php
                    break;
                case 3:
        ?>
            <p><?php echo $arrayDeTexto[0]; ?><span id="puntosSeguridad">...</span><span id="masSeguridad"><?php echo $arrayDeTexto[1];?></span></p>
            <button id="botonLeerMasSeguridad">Mostrar</button>
    <?php
                    break;
            }
        }

        function imprimirTextoEntero($texto)
        { ?>
    <p><?php $texto ?></p>
<?php
        }



?>