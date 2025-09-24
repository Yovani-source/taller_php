<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Convertidor en binario</title>
    <link rel="stylesheet" href="binario.css">
</head>
<body>
    <div class="contenedor">
        <h1>Convertidor de decimal a binario</h1>
        <form method="post">
            <label>Ingrese el numero</label>
            <br>
            <input type="text" name="numero" placeholder="Ejemplo: 10" required>
            <br>
            <button type="submit">Convertir </button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $entar = $_POST["numero"] ?? '';

            if (is_numeric($entar) && (int)$entar == $entar && (int)$entar >= 0) {
                $num = (int)$entar;
                $binario = decbin($num);
                echo "<h3> El numero en binario es: " . $binario . "</h3>";
            } else {
                echo "<p>Error: Por favor ingrese un número entero no negativo válido.</p>";
            }
        }
        ?>
    </div>
    
</body>
</html>