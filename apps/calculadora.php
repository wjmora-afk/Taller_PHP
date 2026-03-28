<?php
session_start();
require_once("../classes/Calculator.php");

$resultado = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = floatval($_POST["num1"]);
    $b = floatval($_POST["num2"]);
    $op = $_POST["operacion"];
    $calc = new Calculator();

    switch ($op) {
        case "suma":
            $resultado = $calc->suma($a, $b);
            break;
        case "resta":
            $resultado = $calc->resta($a, $b);
            break;
        case "multiplicacion":
            $resultado = $calc->multiplicacion($a, $b);
            break;
        case "division":
            $resultado = $calc->division($a, $b);
            break;
        case "porcentaje":
            $resultado = $calc->porcentaje($a, $b);
            break;
    }

    $_SESSION["historial"][] = "$a $op $b = $resultado";
}

if (isset($_POST["borrar"])) {
    $_SESSION["historial"] = [];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Calculadora</h1>
    <form method="POST">
        <input type="number" step="any" name="num1" required>
        <input type="number" step="any" name="num2" required>
        <select name="operacion">
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicación</option>
            <option value="division">División</option>
            <option value="porcentaje">Porcentaje</option>
        </select>
        <button type="submit">Calcular</button>
    </form>
    <p><strong>Resultado:</strong> <?= $resultado ?></p>
    <div class="volver">
        <a href="../index.php">Menú Principal</a>
    </div>
</body>

</html>