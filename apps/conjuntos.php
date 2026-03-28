<?php
require_once("../classes/SetOperations.php");

$resultado = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $A = array_map("intval", explode(",", $_POST["conjuntoA"]));
    $B = array_map("intval", explode(",", $_POST["conjuntoB"]));
    $setOps = new SetOperations();

    $resultado = "Unión: " . implode(", ", $setOps->union($A, $B)) .
                 "<br>Intersección: " . implode(", ", $setOps->interseccion($A, $B)) .
                 "<br>A - B: " . implode(", ", $setOps->diferencia($A, $B)) .
                 "<br>B - A: " . implode(", ", $setOps->diferencia($B, $A));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Operaciones de Conjuntos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Operaciones de Conjuntos</h1>
<form method="POST">
    <label>Conjunto A (números separados por coma):</label>
    <input type="text" name="conjuntoA" required>
    <label>Conjunto B:</label>
    <input type="text" name="conjuntoB" required>
    <button type="submit">Calcular</button>
</form>
<p><strong>Resultado:</strong><br><?= $resultado ?></p>
    <div class="volver">
        <a href="../index.php">Menú Principal</a>
    </div>
</body>
</html>