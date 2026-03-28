<?php
require_once("../classes/MathTools.php");

$resultado = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num = intval($_POST["numero"]);
    $op = $_POST["operacion"];
    $math = new MathTools();

    if ($op == "fibonacci") {
        $resultado = implode(", ", $math->fibonacci($num));
    } else {
        $resultado = $math->factorial($num);
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Fibonacci y Factorial</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Fibonacci y Factorial</h1>
    <form method="POST">
        <input type="number" name="numero" required>
        <select name="operacion">
            <option value="fibonacci">Fibonacci</option>
            <option value="factorial">Factorial</option>
        </select>
        <button type="submit">Calcular</button>
    </form>
    <p><strong>Resultado:</strong> <?= $resultado ?></p>
    <div class="volver">
        <a href="../index.php">Menú Principal</a>
    </div>
</body>

</html>
