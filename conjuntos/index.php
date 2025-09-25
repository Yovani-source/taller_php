<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Operaciones con Conjuntos</title>
    <link rel="stylesheet" href="conjuntos.css">
</head>
<body>
    <h1>operaciones de conjuntos</h1>

    <form method="post">
        <label>conjunto A (separar cada termino por comas):</label>
        <input type="text" name="A" required>
        <br>
        <label>conjunto B (separar cada termino por comas):</label>
        <input type="text" name="B" required>
        <br>    
        <button type="submit">calcular</button>
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Convertir strings en arrays de enteros
    $A = array_map('intval', explode(',', $_POST['A']));
    $B = array_map('intval', explode(',', $_POST['B']));

    echo "<div class='resultado'>";
    echo "<p><strong>A:</strong> {" . implode(', ', $A) . "}</p>";
    echo "<p><strong>B:</strong> {" . implode(', ', $B) . "}</p>";
    echo "<p><strong>Unión:</strong> {" . implode(', ', array_unique(array_merge($A, $B))) . "}</p>";
    echo "<p><strong>Intersección:</strong> {" . implode(', ', array_intersect($A, $B)) . "}</p>";
    echo "<p><strong>A - B:</strong> {" . implode(', ', array_diff($A, $B)) . "}</p>";
    echo "<p><strong>B - A:</strong> {" . implode(', ', array_diff($B, $A)) . "}</p>";
    echo "</div>";
}
?>

</body>
</html>
