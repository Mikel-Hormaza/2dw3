<?php

session_start();
require_once 'Manual.php';
/* $_SESSION["codUsuario"] = 1; #parche */

$servidor  = "localhost";
$user = "root";
$pass = "";


/*Comprueba si se ha enviado el formulario y si existe en session editarOEliminar. Hacer validaciones distintas según si hay que*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["editarOEliminar"]) && isset($_POST["codManual"])) {
        if ($_POST["editarOEliminar"] == "eliminar") {
            $_SESSION["codManualSeleccionado"] = $_POST["codManual"];
            insertarManualBD(null, "eliminar", null);
            irAGestionDeManuales();
        }
    } else {
        validarDatos();
    }
}


/*comprueba si se han introducido todos los datos escrito - para ello comprueba el largo del mensaje de error 
sino se han introducido, mostrar mensaje de error
si se han introducido, comprobar largo según la BD*/
function validarDatos()
{
    if (strlen(comprobarSiSeHanIntroducidoLosDatosEscritos()) == 0) {
        comprobarLargoDeAtributosSegunLargoEnLaBD();
    } else {
        echo comprobarSiSeHanIntroducidoLosDatosEscritos();
    }
}

/*comprueba que tods los datos se han introducido.
Devuelve un string con el mensaje de error. Si no hay errores, devuelve un string vacío */
function comprobarSiSeHanIntroducidoLosDatosEscritos()
{
    $error = false;
    $mensajeErrorFaltanDatos = "Por favor, introduzca: <br>";
    if (strlen($_POST["nombreManual"]) == 0) {
        $error = true;
        $mensajeErrorFaltanDatos .= "el título <br>";
    }
    if (strlen($_POST["descripcionManual"]) == 0) {
        $error = true;
        $mensajeErrorFaltanDatos .= "la descripción <br>";
    }
    if (strlen($_POST["herramientasNecesarias"]) == 0) {
        $error = true;
        $mensajeErrorFaltanDatos .= "el equipo o herramientas necesarias <br>";
    }
    if (strlen($_POST["medidasSeguridad"]) == 0) {
        $error = true;
        $mensajeErrorFaltanDatos .= "medidas de seguridad necesarias <br>";
    }
    if (empty($_SESSION["codHerramientaSeleccionada"])) {
        $error = true;
        $mensajeErrorFaltanDatos .= "error al leer el código de herramienta <br>";
    }
    if (empty($_SESSION["codUsuario"])) {
        $error = true;
        $mensajeErrorFaltanDatos .= "error al leer el código de usuario <br>";
    }
    if ($error == false) {
        $mensajeErrorFaltanDatos = "";
    }
    return $mensajeErrorFaltanDatos;
}

/* comprobar el largo de los atributos con respecto al largo máximo según la BD - para ello compruebo el largo del mensaje de error 
si el largo no es correcto, mostrar mensaje de error
si es correcto, comprobar si se ha introducido foto del manual */
function comprobarLargoDeAtributosSegunLargoEnLaBD()
{
    if (strlen(comprobarLargoDeAtributosIntroducidos(crearObjetoManual(true))) == 0) {
        comprobarImagenSegunEditarOCrear();
    } else {
        echo comprobarLargoDeAtributosIntroducidos(crearObjetoManual(true));
    }
}

/* comprueba el largo de los atributos según largo en la BD
Devuelve un string con el mensaje de error. Si no hay errores, devuelve un string vacío */
function comprobarLargoDeAtributosIntroducidos($manual)
{
    $error = false;
    $mensajeErrorFaltanDatos = "Atención: atributo demasiado largo: <br>";
    if (strlen($manual->getTituloManual()) > 150) {
        $error = true;
        $mensajeErrorFaltanDatos .= "el título <br>";
    }
    if (strlen($manual->getDescripcionManual()) > 350) {
        $error = true;
        $mensajeErrorFaltanDatos .= "la descripción <br>";
    }
    if (strlen($manual->getEquipoNecesario()) > 250) {
        $error = true;
        $mensajeErrorFaltanDatos .= "el equipo o herramientas necesarias <br>";
    }
    if (strlen($manual->getMedidasDeSeguridad()) > 250) {
        $error = true;
        $mensajeErrorFaltanDatos .= "medidas de seguridad necesarias <br>";
    }
    if ($error == false) {
        $mensajeErrorFaltanDatos = "";
    }
    return $mensajeErrorFaltanDatos;
}

/* comprobar si se ha introducido imagen en el formulario. Para ello compruebo el largo del mensaje de error*/
function comprobarImagenSegunEditarOCrear()
{
    /*fuera de la opción "editar" introducir una imagen es obligatorio.
    Llamo al comprobador de la clase Manual que comprueba la imagen,
    sino muestro el error*/
    if (empty($_SESSION["editarOEliminar"])) {
        if (strlen(comprobarSiSeHaIntroducidoImagen()) == 0) {
            comprobacionesDelObjeto();
        } else {
            echo comprobarSiSeHaIntroducidoImagen();
        }
    } else {
        /* si al editar no añado una nueva imagen, inserto los cambios en la BD
    si sí hay nueva imagen, llamo al comprobador de la clase Manual que comprueba la imagen */
        if ($_SESSION["editarOEliminar"] == "editar") {
            if (strlen(comprobarSiSeHaIntroducidoImagen()) == 0) {
                comprobacionesDelObjeto();
            } else {
                insertarManualBD(crearObjetoManual(false), "editar", false);
                irAPasosDelManual();
            }
        }
    }
}

function comprobarSiSeHaIntroducidoImagen()
{
    if (empty($_FILES['classInputFileIMG']['name'])) {
        return "Por favor, introduzca: una imagen para el manual <br>";
    } else {
        return "";
    }
}

/* validaciones del objeto. En este caso únicamente hay una
Si devuelve true, antes de realizar la insert comprobar que en la BD no haya ningún manual con el mismo título
si no hay otro manual con ese título, insertar manual
sino, mostrar mensaje de error */
function comprobacionesDelObjeto()
{
    if (crearObjetoManual(true)->validarFotoManual()) {
        if (isset(($_SESSION["editarOEliminar"]))) {
            if (($_SESSION["editarOEliminar"] == "editar")) {
                insertarManualBD(crearObjetoManual(true), "editar", true);
                irAPasosDelManual();
            }
        } else {
            if (comprobacionesEnBD("tituloUnique", crearObjetoManual(true)->getTituloManual()) == 0) {
                insertarManualBD(crearObjetoManual(true), "crear", null);
                irAPasosDelManual();
            } else {
                echo "Ya existe en la base de datos un manual con este título";
            }
        }
    }
}

function insertarManualBD($manual, $editarOCrear, $hayFoto)
{
    $insertarBDcompletado = true;
    global $servidor;
    global $user;
    global $pass;

    if (($editarOCrear === "editar")or($editarOCrear==="crear")) {
        $titulo = $manual->getTituloManual();
        $descripcionManual = $manual->getDescripcionManual();
        $equipoNecesario = $manual->getEquipoNecesario();
        $medidasSeguridad = $manual->getMedidasDeSeguridad();
        $codHerramienta = $manual->getCodHerramienta();
    }


    if ($editarOCrear == "editar") {
        $codManual = $_SESSION["codManualSeleccionado"];
        if ($hayFoto == false) {
            $sql = "UPDATE manual
            SET nombreManual = '$titulo', informacionManual = '$descripcionManual', equipoNecesario = '$equipoNecesario', medidasDeSeguridad = '$medidasSeguridad'
            WHERE codManual = '$codManual'";
        } else {
            $fotoManual = imagenManual();
            $sql = "UPDATE manual
            SET nombreManual = '$titulo', informacionManual = '$descripcionManual', equipoNecesario = '$equipoNecesario', medidasDeSeguridad = '$medidasSeguridad', fotoManual = $fotoManual;
            WHERE codManual = '$codManual'";
        }
    } elseif ($editarOCrear == "eliminar") {
        $codManual = $_SESSION["codManualSeleccionado"];
        $sql = "UPDATE manual
        SET estadoManual = 'oculto'
        WHERE codManual = '$codManual'";
    } else {
        $fotoManual = imagenManual();
        $codUsuario = $manual->getCodUsuario();
        $fecha = $manual->getFechaCreacion();

        $sql = "INSERT INTO manual (nombreManual,
        informacionManual,
        equipoNecesario,
        medidasDeSeguridad,
        fotoManual,
        codHerramienta,
        codUsuario,
        fechaCreacion) 
        VALUES ('$titulo',
        '$descripcionManual',
        '$equipoNecesario', 
        '$medidasSeguridad',
        '$fotoManual', 
        '$codHerramienta', 
        '$codUsuario', 
        '$fecha');
        ";
    }

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $user, $pass);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conexion->exec($sql);
    } catch (PDOException $e) {
        echo "Error. Por favor, vuelva a intentarlo más tarde";
        $insertarBDcompletado = false;
    }
    $conexion = null;
    if (!($editarOCrear == "editar") && !($editarOCrear == "eliminar") && $insertarBDcompletado) {
        comprobacionesEnBD("obtenerCodManual", $titulo);
    }
    if (isset($_SESSION["editarOEliminar"])) {
        $_SESSION["editarOEliminar"] = null;
    }
}

function irAPasosDelManual()
{
    header('Location: ../datosPasos/crearPaso.php');
    die();
}

function irAGestionDeManuales()
{
    header('Location: ../gestionManuales/gestionManuales.php');
    die();
}

/* si tipoComprobacion==tituloUnique: devolver un count con los manuales con el mismo título en la BD 
si tipoComprobacion==obtenerCodManual: guardar en $_SESSION["codManualSeleccionado"] el cod del manual creado */
function comprobacionesEnBD($tipoComprobacion, $dato)
{
    global $servidor;
    global $user;
    global $pass;

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $user, $pass);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($tipoComprobacion == "tituloUnique") {
            $sql = "SELECT COUNT(codManual)
            from manual
            WHERE nombreManual like'$dato'";

            $resultado = $conexion->query($sql);
            $tituloManual = $resultado->fetchAll();
        } elseif ($tipoComprobacion == "obtenerCodManual") {
            $sql = "SELECT codManual
            FROM manual
            WHERE nombreManual like '$dato'";

            $resultado = $conexion->query($sql);
            $codManual = $resultado->fetchAll();
        }
    } catch (PDOException $e) {
        echo "Error. Por favor, vuelva a intentarlo más tarde";
    }

    if ($tipoComprobacion == "tituloUnique") {
        return $tituloManual[0]["COUNT(codManual)"];
    } elseif ($tipoComprobacion == "obtenerCodManual") {
        $_SESSION["codManualSeleccionado"] = $codManual[0]["codManual"];
    }
}

/* devuelve la fecha del día de creación del manual */
function fechaDeHoy()
{
    return date("Y-m-d");
}

/* devuelve la imagen del manual */
function imagenManual()
{
    $check = getimagesize($_FILES["classInputFileIMG"]["tmp_name"]);
    if ($check !== false) {
        $image = $_FILES['classInputFileIMG']['tmp_name'];
        $fotoManual = addslashes(file_get_contents($image));
    }
    return $fotoManual;
}

/* devuelve un objeto manual */
function crearObjetoManual($hayFoto)
{
    if ($hayFoto == false) {
        $manual1 = new Manual(
            strtolower(validarDato($_POST["nombreManual"])), //devuelve el título en minúscula
            validarDato($_POST["descripcionManual"]),
            validarDato($_POST["herramientasNecesarias"]),
            validarDato($_POST["medidasSeguridad"]),
            "",
            $_SESSION["codHerramientaSeleccionada"],
            $_SESSION["codUsuario"],
            fechaDeHoy()
        );
    } else {
        $manual1 = new Manual(
            strtolower(validarDato($_POST["nombreManual"])), //devuelve el título en minúscula
            validarDato($_POST["descripcionManual"]),
            validarDato($_POST["herramientasNecesarias"]),
            validarDato($_POST["medidasSeguridad"]),
            $_FILES["classInputFileIMG"]["name"],
            $_SESSION["codHerramientaSeleccionada"],
            $_SESSION["codUsuario"],
            fechaDeHoy()
        );
    }

    return $manual1;
}


/* eliminar caracteres especiales */
function validarDato($dato)
{
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}
