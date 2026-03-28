<?php
require_once("../classes/Acronym.php");

$resultado = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frase = $_POST["frase"];
    $acronym = new Acronym($frase);
    $resultado = $acronym->generate();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Acrónimo</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Acronimo</h1>
    <form method="POST">
        <label>Ingrese una frase:</label>
        <input type="text" name="frase" required>
        <button type="submit">Generar Acrónimo</button>
    </form>
    <p><strong>Resultado:</strong> <?= $resultado ?></p>
    <div class="volver">
        <a href="../index.php">Menú Principal</a>
    </div>
</body>

</html>