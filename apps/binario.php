<?php
$resultado = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num = intval($_POST["numero"]);
    $resultado = decbin($num);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Decimal a Binario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Decimal a Binario</h1>  
<form method="POST">
    <label>Ingrese un número entero:</label>
    <input type="number" name="numero" required>
    <button type="submit">Convertir</button>
</form>
<p><strong>Binario:</strong> <?= $resultado ?></p>
    <div class="volver">
        <a href="../index.php">Menú Principal</a>
    </div>
</body>
</html>