<?php
require_once("../classes/Statistics.php");

$resultado = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nums = explode(",", $_POST["numeros"]);
    $nums = array_map("floatval", $nums);
    $stats = new Statistics($nums);

    $resultado = "Promedio: " . $stats->promedio() .
        " | Media: " . $stats->media() .
        " | Moda: " . $stats->moda();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Estadística</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Estadística</h1>
    <form method="POST">
        <label>Ingrese números separados por coma:</label>
        <input type="text" name="numeros" required>
        <button type="submit">Calcular</button>
    </form>
    <p><strong>Resultado:</strong> <?= $resultado ?></p>
    <div class="volver">
        <a href="../index.php">Menú Principal</a>
    </div>
</body>

</html>