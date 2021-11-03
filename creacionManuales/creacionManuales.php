<!DOCTYPE html>
<html>

<head>
        <title>Fix Point</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="Imagenes/reparacion.jpg">
        <link rel="stylesheet" type="text/css" href="creacionManuales.css">
        <script src="Manual.js"></script>
        <script src="validarDatosManual.js"></script>
        <?php require_once "validarDatosManual_BD.php" ?>
        <?php require_once 'llamarBDNombresHerramientas.php' ?>
        <script src="prueba.js"></script>
</head>

<body>

        <button id="VOLVER" class="return"><a href="../gestionManuales/gestionManuales.php">Volver<span> a gestión de manuales</span></a></button>
        <main class="contenedor">
        <span id="spanNombresHerramientas" name="spanNombresHerramientas"> </span>
                <div class="formularios">

                        <form class="formulario" action="#" method="post">

                                <input id="idCodHerramienta" class="buscador" type="text" placeholder="Nombre de la herramienta">

                                <ul id="mostrarBloqueResultados">
                                </ul>

                                <input id="idNombreManual" type="text" placeholder="Nombre de manual" maxlength="150" required="required">

                                <textarea id="idDescripcionManual" placeholder="Descripción de la reparación" maxlength="350" required="required"></textarea>

                                <label class="labelimg" for="upload-photo">Insertar imagen<span> del manual</span></label>
                                <input id="idImagenManual" type="file" required="required" class="imagen" name="photo" id="upload-photo" />

                                <textarea id="idHerramientasNecesarias" placeholder="Herramientas necesarias" maxlength="250"></textarea>

                                <textarea id="idMedidasSeguridad" placeholder="Medidas de seguridad" maxlength="250"></textarea>

                                <button type="button" id="idBotonCrearManual" class="gorde" value="crearManual">Crear manual</button>
                        </form>

                        <form class="fondo">
                                <h4>Pasos</h4>

                                <input type="text" placeholder="Titulo"><br>

                                <textarea placeholder="Descripcion del paso"></textarea><br>


                                <label class="labelimg" for="upload-photo">Insertar imagen<span> del paso</span></label>
                                <input type="file" class="imagen" name="photo" id="upload-photo" />



                                <button class="gordepauso">Guardar paso</button>

                        </form>
                        <div id="botonesCierre">
                                <!--AL QUITAR UN BOTÓN ENCOJE-->
                                <button type="button" id="salirSinGuardar" class="gordepauso">Finalizar</button>
                                <button class="gordepauso">Finalizar y mostrar manual</button>
                        </div>
                </div>


                <div class="mostrarpasos">
                        <div class="paso">
                                <div>
                                        <h3 class="pasoTitulo">Paso 1 </h3>
                                        <p>Desmontaje del iPhone 12 Pro Max </p>
                                </div>
                                <img src="Imagenes/reparacion.jpg" alt="">
                                <p>
                                        En caso de que no lo hayas oído, el cuadrado es redondo... de nuevo.

                                        Siento decírtelo, pero el tamaño importa, al menos en lo que se refiere a los sensores de la cámara. Para lograr su supuesta mejora del 87% en el rendimiento de la luz baja, el 12 Pro Max utiliza el mayor sensor de un iPhone hasta ahora. Pero antes de que nos pongamos nerviosos con las cámaras, comparemos los iPhones con los iPhones:

                                        En nuestra línea de tiempo del iPhone tenemos un iPhone 11 Pro Max verde, un iPhone 12 Pro dorado, y un iPhone 12 Pro Max azul.

                                        Si lo tuyo son las cosas grandes, el iPhone 12 Pro Max es un sueño. Todo es más grande, incluso el bulto de la cámara.
                                </p>
                                <hr>
                        </div>
                        <div class="paso">
                                <div>
                                        <h3 class="pasoTitulo">Paso 1 </h3>
                                        <p>Desmontaje del iPhone 12 Pro Max </p>
                                </div>
                                <img src="Imagenes/reparacion.jpg" alt="">
                                <p>
                                        En caso de que no lo hayas oído, el cuadrado es redondo... de nuevo.

                                        Siento decírtelo, pero el tamaño importa, al menos en lo que se refiere a los sensores de la cámara. Para lograr su supuesta mejora del 87% en el rendimiento de la luz baja, el 12 Pro Max utiliza el mayor sensor de un iPhone hasta ahora. Pero antes de que nos pongamos nerviosos con las cámaras, comparemos los iPhones con los iPhones:

                                        En nuestra línea de tiempo del iPhone tenemos un iPhone 11 Pro Max verde, un iPhone 12 Pro dorado, y un iPhone 12 Pro Max azul.

                                        Si lo tuyo son las cosas grandes, el iPhone 12 Pro Max es un sueño. Todo es más grande, incluso el bulto de la cámara.
                                </p>
                                <hr>
                        </div>
                        <div class="paso">
                                <div>
                                        <h3 class="pasoTitulo">Paso 1 </h3>
                                        <p>Desmontaje del iPhone 12 Pro Max </p>
                                </div>
                                <img src="Imagenes/reparacion.jpg" alt="">
                                <p>
                                        En caso de que no lo hayas oído, el cuadrado es redondo... de nuevo.

                                        Siento decírtelo, pero el tamaño importa, al menos en lo que se refiere a los sensores de la cámara. Para lograr su supuesta mejora del 87% en el rendimiento de la luz baja, el 12 Pro Max utiliza el mayor sensor de un iPhone hasta ahora. Pero antes de que nos pongamos nerviosos con las cámaras, comparemos los iPhones con los iPhones:

                                        En nuestra línea de tiempo del iPhone tenemos un iPhone 11 Pro Max verde, un iPhone 12 Pro dorado, y un iPhone 12 Pro Max azul.

                                        Si lo tuyo son las cosas grandes, el iPhone 12 Pro Max es un sueño. Todo es más grande, incluso el bulto de la cámara.
                                </p>
                                <hr>
                        </div>
                </div>
        </main>



</body>

</html>