<?php
require_once("../classes/BinaryTree.php");

$resultado = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pre = explode(",", $_POST["preorden"]);
    $in = explode(",", $_POST["inorden"]);

    $tree = new BinaryTree();
    $root = $tree->buildTree($pre, $in);

    $resultado = "Inorden reconstruido: " . $tree->printInorder($root);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Árbol Binario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Árbol Binario</h1>
<form method="POST">
    <label>Preorden (ej: A,B,D,E,C):</label>
    <input type="text" name="preorden" required>
    <label>Inorden:</label>
    <input type="text" name="inorden" required>
    <button type="submit">Construir Árbol</button>
</form>
<p><strong>Resultado:</strong> <?= $resultado ?></p>
    <div class="volver">
        <a href="../index.php">Menú Principal</a>
    </div>
</body>
</html>