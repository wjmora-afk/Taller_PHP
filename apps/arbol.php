<?php
require_once("../classes/BinaryTree.php");

$resultado = "";
$grafico = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valores = explode(",", str_replace(" ", "", $_POST["valores"]));

    $tree = new BinaryTree();
    foreach ($valores as $v) {
        if ($v !== "") {
            $tree->insert($v);
        }
    }

    $resultado = "<strong>Preorden:</strong> " . $tree->printPreorder($tree->root) . "<br>" .
        "<strong>Inorden:</strong> " . $tree->printInorder($tree->root) . "<br>" .
        "<strong>Postorden:</strong> " . $tree->printPostorder($tree->root);

    $grafico = "<svg width='1000' height='600'>" . $tree->drawSVGTree($tree->root, 500, 50) . "</svg>";
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
        <label>Valores del árbol (ej: 5,3,7,2,4,6,8 o A,B,C,D):</label>
        <input type="text" name="valores" required>
        <button type="submit">Generar Árbol</button>
    </form>
    <p><?= $resultado ?></p>
    <?= $grafico ?>

    <div class="volver">
        <a href="../index.php">Menú Principal</a>
    </div>
</body>

</html>
