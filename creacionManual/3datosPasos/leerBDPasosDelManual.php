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
        <div class="paso paso<?php echo $numPaso + 1; ?>" id="<?php echo $paso["codPaso"]; ?>">
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

/* funcion llamada desde la página
busca a ver si se ha seleccionado un paso.
Si no hay  ningún paso seleccionado, muestra el formulario vacío 
si sí lo hay, muestra el paso */
function mostrarFormulario()
{
    if (!isset($_POST["botonPasoSeleccionado"])) {
    ?>
        <form id="formulario" method="post" action="validarDatosPaso.php" enctype="multipart/form-data">
            <input type="text" name="nombrePaso" id="idNombrePaso" placeholder="Título del paso" maxlength="150" require="required">
            <textarea placeholder="Descripción del paso" name="descripcionPaso" id="idDescripcionPaso" maxlength="500" require="required"></textarea>
            <button type="button" id="classInputButton2" class="classInputButton" onclick="document.getElementById('classInputFileIMG').click();">Insertar imagen del paso</button>
            <input id="classInputFileIMG" class="classInputFileIMG" name="classInputFileIMG" type="file" accept="image/png, .jpeg, .jpg" require="required" />
            <div id="botonesOpcionesFormularioPaso" class="botonesOpcionesFormulario">
                <button type="button" id="idBotoncrearPaso">crear paso</button>
                <button type="button" id="idBotonEliminarPaso">eliminar</button>
            </div>
        </form>

    <?php
    } else {
        if (comprobarCodSeleccionadoExisteEnLaBD($_POST["botonPasoSeleccionado"])) {
            llamarALaBDParaLeerDatosPaso($_POST["botonPasoSeleccionado"]);
        } else {
            echo "código de paso erróneo";
        }
    }
}

function llamarALaBDParaLeerDatosPaso($codPaso)
{

    $servidor  = "localhost";
    $usuario = "root";
    $password = "";

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlPaso = "SELECT tituloPaso, descripcionPaso, fotoPaso
        FROM paso
        WHERE codPaso like'$codPaso'";

        $resultadoPaso = $conexion->query($sqlPaso);
        $datosPaso = $resultadoPaso->fetchAll();
    } catch (PDOException $e) {
        echo $sqlPaso . "<br>" . $e->getMessage();
    }

    $conexion = null;
    $_SESSION["botonPasoSeleccionado"]=$codPaso;
    mostrarDatosDelPasoEnElFormulario($datosPaso);
}

function mostrarDatosDelPasoEnElFormulario($datosPaso)
{
    ?>

    <form id="formulario" method="post" action="validarDatosPaso.php" enctype="multipart/form-data">
        <input type="text" name="nombrePaso" id="idNombrePaso" placeholder="Título del paso" maxlength="150" require="required" value="<?php echo $datosPaso[0]["tituloPaso"]; ?>">
        <textarea placeholder="Descripción del paso" name="descripcionPaso" id="idDescripcionPaso" maxlength="500" require="required"><?php echo $datosPaso[0]["descripcionPaso"]; ?></textarea>
        <button type="button" id="classInputButton2" class="classInputButton" onclick="document.getElementById('classInputFileIMG').click();">Insertar imagen del paso</button>
        <input id="classInputFileIMG" class="classInputFileIMG" name="classInputFileIMG" type="file" accept="image/png, .jpeg, .jpg" require="required" />
        <div id="botonesOpcionesFormularioPaso" class="botonesOpcionesFormulario">
            <button type="button" id="idBotoncrearPaso">crear paso</button>
            <button type="button" id="idBotonEliminarPaso">eliminar</button>
        </div>
    </form>

<?php
}

?>