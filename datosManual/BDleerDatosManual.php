<?php

session_start();
$datosManual;

/*llama a la BD para obtener los atributos del manual con ese código.
Además, para comprobar si ese código existe en la BD, devuelve un COUNT de nombres
de manual con ese mismo código*/
function editarManualLlamarBD($codManualSeleccionado)
{
    $servidor  = "localhost";
    $usuario = "root";
    $password = "";
    global $datosManual;
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $usuario, $password);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlManual = "SELECT COUNT(nombreManual), nombreManual, informacionManual, equipoNecesario, medidasDeSeguridad, codHerramienta
        FROM manual
        WHERE manual.codManual like $codManualSeleccionado";

        $resultadoManual = $conexion->query($sqlManual);
        $datosManual = $resultadoManual->fetchAll();
    } catch (PDOException $e) {
        echo $sqlManual . "<br>" . $e->getMessage();
    }

    $conexion = null;
}

/* comprueba si hay un manual seleccionado para editar o eliminar
en función de ello muestra el formulario con contenido o vacío */
function mostrarFormulario()
{
    global $datosManual;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        guardarCodigoYEditarOEliminarEnSession();
        $codManualSeleccionado = $_SESSION["codManualSeleccionado"];
        if ($_POST["editarOEliminar"] == "editar") {
            editarManualLlamarBD($codManualSeleccionado);
            if (!comprobarSiElManualExisteEnLaBD($datosManual)) {
                formularioVacio();
            } else {
                formularioConContenido($datosManual);
                $_SESSION["codHerramientaSeleccionada"] = $datosManual[0]["codHerramienta"];
            }
        } elseif ($_POST["editarOEliminar"] == "eliminar") {
            echo "eliminar";
        }
    } else {
        formularioVacio();
    }
}
/* muestra el formulario con los datos actuales del manual*/
function formularioConContenido($datosManual)
{
?> <form id="formulario" method="post" action="validarDatosManual.php" enctype="multipart/form-data">
        <input id="idNombreManual" type="text" name="nombreManual" placeholder="Título de manual" maxlength="150" required="required" value="<?php echo $datosManual[0]["nombreManual"] ?>">
        <textarea id="idDescripcionManual" name="descripcionManual" placeholder="Descripción de la reparación" maxlength="350" required="required"><?php echo $datosManual[0]["informacionManual"] ?></textarea>
        <textarea id="idHerramientasNecesarias" name="herramientasNecesarias" placeholder="Herramientas necesarias" maxlength="250" required="required"><?php echo $datosManual[0]["equipoNecesario"] ?></textarea>
        <textarea id="idMedidasSeguridad" name="medidasSeguridad" placeholder="Medidas de seguridad" maxlength="250" required="required"><?php echo $datosManual[0]["medidasDeSeguridad"] ?></textarea>
        <button type="button" id="classInputButton1" class="classInputButton" onclick="document.getElementById('classInputFileIMG1').click();">Insertar imagen</button>
        <input id="classInputFileIMG1" class="classInputFileIMG" name="classInputFileIMG" type="file" accept="image/png, .jpeg, .jpg" require="required" />
        <div class="botonesOpcionesFormulario">
            <button type="button">guardar y seguir</button>
        </div>
    </form>
<?php
}

/* muestra el formulario vacío*/
function formularioVacio()
{
?> <form id="formulario" method="post" action="validarDatosManual.php" enctype="multipart/form-data">
        <input id="idNombreManual" type="text" name="nombreManual" placeholder="Título de manual" maxlength="150" required="required">
        <textarea id="idDescripcionManual" name="descripcionManual" placeholder="Descripción de la reparación" maxlength="350" required="required"></textarea>
        <textarea id="idHerramientasNecesarias" name="herramientasNecesarias" placeholder="Herramientas necesarias" maxlength="250" required="required"></textarea>
        <textarea id="idMedidasSeguridad" name="medidasSeguridad" placeholder="Medidas de seguridad" maxlength="250" required="required"></textarea>
        <button type="button" id="classInputButton1" class="classInputButton" onclick="document.getElementById('classInputFileIMG1').click();">Insertar imagen</button>
        <input id="classInputFileIMG1" class="classInputFileIMG" name="classInputFileIMG" type="file" accept="image/png, .jpeg, .jpg" require="required" />
        <div class="botonesOpcionesFormulario">
            <button type="button">guardar y seguir</button>
        </div>
    </form>
<?php
}

function guardarCodigoYEditarOEliminarEnSession()
{
    $_SESSION["codManualSeleccionado"] = $_POST["codManual"];
    $_SESSION["editarOEliminar"] = $_POST["editarOEliminar"];
}

/* comprueba el COUNT devuelto por la BD. Si el código de manual existe en la BD devuelve TRUE*/
function comprobarSiElManualExisteEnLaBD($datosManual)
{
    if ($datosManual[0]["COUNT(nombreManual)"] == 1) {
        return true;
    } else {
        return false;
    }
}
?>