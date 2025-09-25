<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>construccion del arbol</title>
    <link rel="stylesheet" href="arbol.css">
</head>
<body>
    <h1>construcción del arbol</h1>

    <form method="post">
        <label for="preorden">preorden:</label>
        <input type="text" id="preorden" name="preorden">

        <label for="inorden">inorden:</label>
        <input type="text" id="inorden" name="inorden">

        <label for="postorden">postorden:</label>
        <input type="text" id="postorden" name="postorden">

        <button type="submit">construir arbol</button>
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $preorden  = !empty($_POST['preorden'])  ? array_map('trim', explode(',', $_POST['preorden']))  : [];
    $inorden   = !empty($_POST['inorden'])   ? array_map('trim', explode(',', $_POST['inorden']))   : [];
    $postorden = !empty($_POST['postorden']) ? array_map('trim', explode(',', $_POST['postorden'])) : [];

    echo "<div class='resultado'><h2>datos:</h2>";

    if($preorden)  echo "<p><strong>Preorden:</strong> "  . implode(', ', $preorden) . "</p>";
    if($inorden)   echo "<p><strong>Inorden:</strong> "   . implode(', ', $inorden) . "</p>";
    if($postorden) echo "<p><strong>Postorden:</strong> " . implode(', ', $postorden) . "</p>";

    if(count($preorden) + count($inorden) + count($postorden) >= 2) {
        echo "<p>arbol finalizado</p>";
    } else {
        echo "<p style='color:red;'>debe ingresar datos para generr el arbol</p>";
    }

    echo "</div>";
}
?>

</body>
</html>
