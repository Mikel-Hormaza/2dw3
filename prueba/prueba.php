<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <script>
        var datosPHP;
    </script>
    <?php require_once 'llamarANombresHerramientas.php' ?>
    <script src="prueba.js"></script>
</head>

<body>

    <div id="contenedor">
        <span id="spanNombresHerramientas" > </span>
        <form id="formulario" action="#" method="POST" onsubmit="false">
            <input id="idBusquedaNombreHerramienta" type="text" name="herramienta" placeholder="Type to search..">
        </form>

        <ul id="mostrarBloqueResultados">
        </ul>
    </div>
</body>

</html>