<?php
session_start();
require_once("../classes/Calculator.php");

if (!isset($_SESSION["historial"])) {
    $_SESSION["historial"] = [];
}

$resultado = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["borrar"])) {
        $_SESSION["historial"] = [];
    } else {
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

    <form method="POST">
        <button type="submit" name="borrar">Borrar Historial</button>
    </form>

    <p><strong>Resultado:</strong> <?= $resultado ?></p>

    <?php if (!empty($_SESSION["historial"])): ?>
        <h2>Historial</h2>
        <ul>
            <?php foreach ($_SESSION["historial"] as $op): ?>
                <li><?= htmlspecialchars($op) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <div class="volver">
        <a href="../index.php">Menú Principal</a>
    </div>
</body>

</html>