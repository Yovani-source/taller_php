<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Construcción de Árbol Binario</title>
    <link rel="stylesheet" href="arbol.css">
</head>
<body>
    <h1>Construcción de arbol Binario</h1>

    <form method="post">
        <label for="preorden">Recorrido Preorden:</label>
        <input type="text" id="preorden" name="preorden">

        <label for="inorden">Recorrido Inorden:</label>
        <input type="text" id="inorden" name="inorden">

        <label for="postorden">Recorrido Postorden:</label>
        <input type="text" id="postorden" name="postorden">

        <button type="submit">Construir Árbol</button>
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $preorden  = !empty($_POST['preorden'])  ? array_map('trim', explode(',', $_POST['preorden']))  : [];
    $inorden   = !empty($_POST['inorden'])   ? array_map('trim', explode(',', $_POST['inorden']))   : [];
    $postorden = !empty($_POST['postorden']) ? array_map('trim', explode(',', $_POST['postorden'])) : [];

    echo "<div class='resultado'><h2>Datos ingresados:</h2>";

    if($preorden)  echo "<p><strong>Preorden:</strong> "  . implode(', ', $preorden) . "</p>";
    if($inorden)   echo "<p><strong>Inorden:</strong> "   . implode(', ', $inorden) . "</p>";
    if($postorden) echo "<p><strong>Postorden:</strong> " . implode(', ', $postorden) . "</p>";

    if(count($preorden) + count($inorden) + count($postorden) >= 2) {
        echo "<p>Árbol construido con los recorridos proporcionados.</p>";
    } else {
        echo "<p style='color:red;'>Debe ingresar al menos dos recorridos para construir el árbol.</p>";
    }

    echo "</div>";
}
?>

</body>
</html>
