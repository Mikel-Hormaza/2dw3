<?php
$servidor  = "localhost";
$user = "root";
$pass = "";

$arraySoloNombresHerramientas = array();

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=fixpoint", $user, $pass);

    //ezarri pdo exception modura
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT nombreHerramienta FROM herramienta";

    $resultado = $conexion->query($sql);
    $nombresHerramientas = $resultado->fetchAll();
    
} catch (PDOException $e) {
    echo $e->getMessage();
}

$conexion = null;

for ($i = 0; $i < sizeof($nombresHerramientas); $i++) {
    array_push($arraySoloNombresHerramientas, $nombresHerramientas[$i][0]);
}

?>

<!-- Guardar los nombres de herramientas en el innetHTML  -->
<script>
    var datosPHP =
        <?php echo '["' . implode('", "', $arraySoloNombresHerramientas) . '"]' ?>;
        console.log(datosPHP);
    let spanInner = document.getElementsByName("spanNombresHerramientas");
        console.log(spanInner);
    let scriptHTML = datosPHP;
    spanInner.innerHTML = scriptHTML;
</script>